<?php

namespace App\Http\Controllers;

use App\Models\DailySchedule;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    // Danh sách đơn hàng (hỗ trợ lọc trạng thái)
    public function index(Request $request)
    {
        $status = $request->input('status');
        $query = Order::with(['user', 'orderItems.dish'])->orderBy('created_at', 'desc');

        if ($status) {
            $query->where('order_status', $status);
        }

        $orders = $query->get();

        return view('admin.orders', compact('orders', 'status'));
    }

    // Bảng chuẩn bị món ăn hôm nay của nhà bếp
    public function kitchenReport()
    {
        // 1. Lấy món ăn từ đơn hàng lẻ ở trạng thái đã xác nhận hoặc đang chuẩn bị
        $singleDishes = OrderItem::whereHas('order', function ($q) {
            $q->whereIn('order_status', ['confirmed', 'preparing']);
        })
            ->select('dish_id', \DB::raw('SUM(quantity) as total_qty'))
            ->groupBy('dish_id')
            ->with('dish')
            ->get();

        // 2. Lấy món ăn từ gói dịch vụ cần giao ngày hôm nay (delivery_date = hôm nay, status = pending)
        $todayStr = Carbon::today()->format('Y-m-d');
        $subscriptionDishes = DailySchedule::where('delivery_date', $todayStr)
            ->where('delivery_status', 'pending')
            ->select('dish_id', \DB::raw('COUNT(*) as total_qty'))
            ->groupBy('dish_id')
            ->with('dish')
            ->get();

        return view('admin.kitchen_report', compact('singleDishes', 'subscriptionDishes', 'todayStr'));
    }

    // Xem chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with(['user', 'orderItems.dish'])->findOrFail($id);

        return view('admin.orders_detail', compact('order'));
    }

    // Form chỉnh sửa/cập nhật trạng thái đơn hàng
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders_edit', compact('order'));
    }

    // Cập nhật trạng thái đơn hàng
    public function update(Request $request, $id)
    {
        $request->validate([
            'order_status' => 'required|string|in:pending,confirmed,preparing,delivering,completed,cancelled',
            'payment_status' => 'required|string|in:pending,paid,failed,refunded',
            'admin_notes' => 'nullable|string',
        ]);

        $order = Order::findOrFail($id);
        $order->order_status = $request->order_status;
        $order->payment_status = $request->payment_status;
        if ($request->admin_notes) {
            $order->health_notes = ($order->health_notes ? $order->health_notes."\n" : '').'[Điều phối: '.$request->admin_notes.']';
        }
        $order->save();

        return redirect()->route('quanly_donhang')->with('success', 'Cập nhật trạng thái đơn hàng FDL-'.$id.' thành công!');
    }

    // Danh sách yêu cầu hoàn tiền
    public function refundsList()
    {
        // Lấy các đơn hàng có yêu cầu hoàn tiền trong health_notes
        $orders = Order::with(['user'])
            ->where('health_notes', 'like', '%[Yêu cầu hoàn tiền%')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('admin.refunds', compact('orders'));
    }

    // Xem chi tiết yêu cầu hoàn tiền
    public function refundShow($id)
    {
        $order = Order::with(['user', 'orderItems.dish'])->findOrFail($id);

        return view('admin.refunds_detail', compact('order'));
    }

    // Phê duyệt hoặc Từ chối yêu cầu hoàn tiền
    public function refundApprove(Request $request, $id)
    {
        $request->validate([
            'action' => 'required|string|in:approve,reject',
            'admin_response' => 'required|string',
        ]);

        $order = Order::findOrFail($id);

        if ($request->action === 'approve') {
            $order->payment_status = 'refunded';
            $order->order_status = 'cancelled';
        }

        $order->health_notes = ($order->health_notes ? $order->health_notes."\n" : '').
            '[Admin Phản hồi: '.$request->admin_response.' ('.($request->action === 'approve' ? 'Đã duyệt hoàn tiền' : 'Từ chối hoàn tiền').')]';
        $order->save();

        return redirect()->route('quanly_yeucauhoan')->with('success', 'Xử lý yêu cầu hoàn tiền cho đơn hàng FDL-'.$id.' thành công!');
    }

    // Xóa đơn hàng
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Xóa gói đăng ký liên kết (nếu có) và các bảng con của nó để tránh lỗi khóa ngoại
        $subscription = Subscription::where('order_id', $order->id)->first();
        if ($subscription) {
            $subscription->dailySchedules()->delete();
            $subscription->pauses()->delete();
            $subscription->delete();
        }

        $order->orderItems()->delete();
        $order->delete();

        return redirect()->route('quanly_donhang')->with('success', 'Đã xóa đơn hàng FDL-'.$id.' thành công.');
    }
}
