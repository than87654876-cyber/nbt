<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Hiển thị danh sách lịch sử đơn hàng của User
    public function index(Request $request)
    {
        $search = $request->input('search');
        $user = Auth::user();

        $query = Order::where('user_id', $user->id)
            ->with(['orderItems.dish'])
            ->orderBy('created_at', 'desc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', '%'.$search.'%')
                    ->orWhere('payment_method', 'like', '%'.$search.'%')
                    ->orWhere('order_status', 'like', '%'.$search.'%')
                    ->orWhereHas('orderItems.dish', function ($subQuery) use ($search) {
                        $subQuery->where('dish_name', 'like', '%'.$search.'%');
                    });
            });
        }

        $orders = $query->get();

        return view('client.cart', compact('orders', 'search'));
    }

    // Xử lý gửi đơn đặt hàng từ giỏ hàng (localStorage gửi lên)
    public function processCheckout(Request $request)
    {
        $request->validate([
            'cart_phone' => 'required|string',
            'cart_address' => 'required|string',
            'cart_time' => 'required|string',
            'cart_payment' => 'required|string',
            'cart_items' => 'required|string', // Chuỗi JSON chứa danh sách sản phẩm
        ]);

        $items = json_decode($request->cart_items, true);
        if (empty($items)) {
            return back()->withErrors(['cart_items' => 'Giỏ hàng của bạn đang trống.']);
        }

        DB::beginTransaction();
        try {
            // Tính tổng giá trị đơn hàng
            $totalAmount = 0;
            $orderItemsData = [];

            foreach ($items as $item) {
                $dish = Dish::find($item['id']);
                if ($dish) {
                    $qty = max(1, intval($item['quantity']));
                    $price = $dish->price;
                    $totalAmount += $price * $qty;

                    $orderItemsData[] = [
                        'dish_id' => $dish->id,
                        'quantity' => $qty,
                        'price' => $price,
                    ];
                }
            }

            // Kiểm tra xem có sản phẩm hợp lệ nào không
            if (empty($orderItemsData)) {
                return back()->withErrors(['cart_items' => 'Không có món ăn hợp lệ nào trong giỏ hàng.']);
            }

            // Tạo đơn hàng mới
            $order = new Order;
            $order->user_id = Auth::id();
            $order->order_type = 'single';
            $order->total_amount = $totalAmount;
            $order->final_amount = $totalAmount; // Chưa tính giảm giá coupon

            // Map payment methods: cod -> cash, atm -> bank_transfer, momo -> momo
            $paymentMethod = 'cash';
            if ($request->cart_payment === 'atm') {
                $paymentMethod = 'bank_transfer';
            } elseif ($request->cart_payment === 'momo') {
                $paymentMethod = 'momo';
            }
            $order->payment_method = $paymentMethod;
            $order->payment_status = 'pending';
            $order->order_status = 'pending';
            $order->health_notes = 'Giao hàng: '.$request->cart_time.'. SĐT: '.$request->cart_phone.'. Địa chỉ: '.$request->cart_address;
            $order->save();

            // Lưu danh sách sản phẩm của đơn hàng
            foreach ($orderItemsData as $itemData) {
                $orderItem = new OrderItem;
                $orderItem->order_id = $order->id;
                $orderItem->dish_id = $itemData['dish_id'];
                $orderItem->quantity = $itemData['quantity'];
                $orderItem->price = $itemData['price'];
                $orderItem->save();
            }

            DB::commit();

            // Điều hướng dựa trên phương thức thanh toán
            if ($request->cart_payment === 'momo') {
                return redirect()->route('thanhtoan_momo', ['order_id' => $order->id, 'amount' => $totalAmount]);
            } elseif ($request->cart_payment === 'atm') {
                return redirect()->route('thanhtoan_ATM', ['order_id' => $order->id, 'amount' => $totalAmount]);
            }

            // Nếu COD thì về luôn trang lịch sử đơn hàng với thông báo thành công
            return redirect()->route('giohang')->with('success', 'Đơn hàng FDL-'.$order->id.' đã được đặt thành công!');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors(['error' => 'Đã xảy ra lỗi trong quá trình đặt hàng: '.$e->getMessage()]);
        }
    }

    // Trang hiển thị mua hàng/giỏ hàng
    public function checkoutPage()
    {
        return view('client.buy');
    }

    // Xử lý khách hàng hủy đơn hàng
    public function cancelOrder(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'cancel_reason' => 'required|string',
            'cancel_detail' => 'nullable|string',
        ]);

        $order = Order::where('id', $request->order_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($order->order_status !== 'pending') {
            return back()->withErrors(['error' => 'Chỉ có thể hủy đơn hàng ở trạng thái chờ xác nhận.']);
        }

        $order->order_status = 'cancelled';
        $order->health_notes = ($order->health_notes ? $order->health_notes."\n" : '').
            '[Hủy đơn - Lý do: '.$request->cancel_reason.($request->cancel_detail ? ' (Chi tiết: '.$request->cancel_detail.')' : '').']';
        $order->save();

        return back()->with('success', 'Đơn hàng FDL-'.$order->id.' đã được hủy thành công.');
    }

    // Xử lý gửi đánh giá chất lượng đơn hàng
    public function reviewOrder(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'rating_stars' => 'required|integer|between:1,5',
            'review_comment' => 'required|string',
        ]);

        $order = Order::where('id', $request->order_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Kiểm tra xem đã đánh giá chưa
        $exists = Review::where('order_id', $order->id)->exists();
        if ($exists) {
            return back()->withErrors(['error' => 'Đơn hàng này đã được đánh giá trước đó.']);
        }

        Review::create([
            'user_id' => Auth::id(),
            'order_id' => $order->id,
            'rating' => $request->rating_stars,
            'comment' => $request->review_comment,
        ]);

        return back()->with('success', 'Cảm ơn bạn đã gửi đánh giá cho đơn hàng FDL-'.$order->id.'!');
    }

    // Xử lý yêu cầu hoàn trả tiền
    public function refundOrder(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'refund_reason' => 'required|string',
            'refund_method' => 'required|string|in:bank,momo',
            'bank_name' => 'required_if:refund_method,bank|nullable|string',
            'bank_account' => 'required_if:refund_method,bank|nullable|string',
            'bank_user' => 'required_if:refund_method,bank|nullable|string',
            'momo_phone' => 'required_if:refund_method,momo|nullable|string',
            'momo_user' => 'required_if:refund_method,momo|nullable|string',
            'refund_detail' => 'required|string',
        ]);

        $order = Order::where('id', $request->order_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($order->order_status !== 'completed') {
            return back()->withErrors(['error' => 'Chỉ có thể yêu cầu hoàn tiền cho đơn hàng đã hoàn thành.']);
        }

        $refundInfo = '[Yêu cầu hoàn tiền - Lý do: '.$request->refund_reason.', Phương thức: '.$request->refund_method;
        if ($request->refund_method === 'bank') {
            $refundInfo .= ' (Ngân hàng: '.$request->bank_name.', STK: '.$request->bank_account.', Chủ tài khoản: '.$request->bank_user.')';
        } else {
            $refundInfo .= ' (SĐT MoMo: '.$request->momo_phone.', Chủ tài khoản MoMo: '.$request->momo_user.')';
        }
        $refundInfo .= ', Chi tiết: '.$request->refund_detail.']';

        $order->health_notes = ($order->health_notes ? $order->health_notes."\n" : '').$refundInfo;
        $order->save();

        return back()->with('success', 'Yêu cầu hoàn tiền cho đơn hàng FDL-'.$order->id.' đã được gửi thành công. Ban quản lý sẽ thẩm định và phản hồi sớm nhất.');
    }

    // Trang giả lập thanh toán MoMo
    public function momoMethod(Request $request)
    {
        $order_id = $request->input('order_id');
        $amount = $request->input('amount');
        $payment_type = 'momo';

        return view('client.transfer_payment', compact('order_id', 'amount', 'payment_type'));
    }

    // Trang giả lập thanh toán ATM
    public function atmMethod(Request $request)
    {
        $order_id = $request->input('order_id');
        $amount = $request->input('amount');
        $payment_type = 'bank';

        return view('client.transfer_payment', compact('order_id', 'amount', 'payment_type'));
    }

    // Danh sách yêu cầu hoàn tiền của khách hàng
    public function refundsList()
    {
        $orders = Order::where('user_id', Auth::id())
            ->where('health_notes', 'like', '%[Yêu cầu hoàn tiền%')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('client.refunds', compact('orders'));
    }

    // Trang giả lập Chuyển khoản (nếu cần)
    public function transferPayment(Request $request)
    {
        $order_id = $request->input('order_id');
        $amount = $request->input('amount');

        return view('client.transfer_payment', compact('order_id', 'amount'));
    }

    // Hoàn tất thanh toán và chuyển hướng với thông báo thành công
    public function completePayment($id)
    {
        $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $order->payment_status = 'paid';
        $order->save();

        return redirect()->route('giohang')->with('success', 'Thanh toán đơn hàng FDL-'.$order->id.' thành công! Đơn hàng đang được nhà hàng chuẩn bị.');
    }
}
