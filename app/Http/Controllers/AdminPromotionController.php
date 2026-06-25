<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminPromotionController extends Controller
{
    // ==========================================
    // PROMOTIONS CRUD (CHƯƠNG TRÌNH KHUYẾN MÃI)
    // ==========================================

    // Danh sách khuyến mãi
    public function index()
    {
        $promotions = Coupon::orderBy('created_at', 'desc')->get();

        return view('admin.promotion', compact('promotions'));
    }

    // Xem chi tiết khuyến mãi
    public function show($id)
    {
        $promotion = Coupon::findOrFail($id);

        return view('admin.promotion_detail', compact('promotion'));
    }

    // Form thêm mới khuyến mãi
    public function create()
    {
        return view('admin.promotion_add');
    }

    // Lưu khuyến mãi mới
    public function store(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string|unique:coupons,coupon_code|max:100',
            'discount_type' => 'required|string|in:percent,fixed',
            'discount_value' => 'required|numeric|min:0',
            'min_order_value' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'usage_limit' => 'nullable|integer|min:1',
        ]);

        Coupon::create($request->only(
            'coupon_code', 'discount_type', 'discount_value', 'min_order_value', 'start_date', 'end_date', 'usage_limit'
        ));

        return redirect()->route('quanly_khuyenmai')->with('success', 'Thêm chương trình khuyến mãi thành công!');
    }

    // Form chỉnh sửa khuyến mãi
    public function edit($id)
    {
        $promotion = Coupon::findOrFail($id);

        return view('admin.promotion_edit', compact('promotion'));
    }

    // Cập nhật khuyến mãi
    public function update(Request $request, $id)
    {
        $promotion = Coupon::findOrFail($id);

        $request->validate([
            'coupon_code' => 'required|string|max:100|unique:coupons,coupon_code,'.$promotion->id,
            'discount_type' => 'required|string|in:percent,fixed',
            'discount_value' => 'required|numeric|min:0',
            'min_order_value' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'usage_limit' => 'nullable|integer|min:1',
        ]);

        $promotion->update($request->only(
            'coupon_code', 'discount_type', 'discount_value', 'min_order_value', 'start_date', 'end_date', 'usage_limit'
        ));

        return redirect()->route('quanly_khuyenmai')->with('success', 'Cập nhật chương trình khuyến mãi thành công!');
    }

    // Xóa khuyến mãi
    public function destroy($id)
    {
        $promotion = Coupon::findOrFail($id);

        // Kiểm tra xem coupon đã được dùng trong đơn hàng nào chưa
        if ($promotion->orders()->count() > 0) {
            return redirect()->route('quanly_khuyenmai')->with('error', 'Không thể xóa khuyến mãi này vì đã có đơn hàng sử dụng.');
        }

        $promotion->delete();

        return redirect()->route('quanly_khuyenmai')->with('success', 'Đã xóa chương trình khuyến mãi thành công!');
    }

    // ==========================================
    // CẤU HÌNH GỬI MÃ NÂNG CAO (ADVANCED GENERATOR)
    // ==========================================

    // Hiển thị giao diện bộ lọc & sinh mã
    public function showSendCoupon()
    {
        return view('admin.coupons');
    }

    // Xử lý lọc người dùng, sinh mã ngẫu nhiên và lưu/gửi
    public function sendCoupon(Request $request)
    {
        $request->validate([
            'discount_value' => 'required|numeric|min:1',
            'discount_type' => 'required|string|in:percentage,fixed',
            'code_length' => 'required|integer|in:6,8',
            'expiry_days' => 'required|integer|min:1',
            'min_order' => 'required|numeric|min:0',
            'email_subject' => 'required|string',
            'message_body' => 'required|string',
        ]);

        // 1. Thực hiện truy vấn lọc người dùng
        $query = User::where('role', 'customer')->where('status', 1);

        // Lọc theo hạng thành viên
        if ($request->has('ranks')) {
            $ranks = $request->ranks;
            // Map standard to bronze
            if (in_array('standard', $ranks)) {
                $ranks[] = 'bronze';
            }
            $query->whereIn('membership', $ranks);
        }

        // Lọc theo ngày đăng ký tài khoản (Khách hàng mới)
        if ($request->filled('new_customer_range') && $request->new_customer_range !== 'all') {
            $days = 7;
            if ($request->new_customer_range === '15_days') {
                $days = 15;
            } elseif ($request->new_customer_range === '30_days') {
                $days = 30;
            }
            $query->where('created_at', '>=', Carbon::now()->subDays($days));
        }

        // Lấy danh sách khách hàng ban đầu
        $customers = $query->get();

        // Lọc theo thời gian chưa mua hàng (inactive period)
        if ($request->filled('inactive_period') && $request->inactive_period !== 'all') {
            $months = 1;
            if ($request->inactive_period === '6_months') {
                $months = 6;
            } elseif ($request->inactive_period === '1_year') {
                $months = 12;
            }

            $cutoffDate = Carbon::now()->subMonths($months);

            $customers = $customers->filter(function ($customer) use ($cutoffDate) {
                $lastOrder = Order::where('user_id', $customer->id)
                    ->orderBy('created_at', 'desc')
                    ->first();

                // Nếu chưa từng đặt hàng hoặc đặt hàng lần cuối trước mốc cutoff
                return ! $lastOrder || Carbon::parse($lastOrder->created_at)->lt($cutoffDate);
            });
        }

        if ($customers->isEmpty()) {
            return back()->with('error', 'Không tìm thấy khách hàng nào thỏa mãn điều kiện lọc để gửi mã.');
        }

        // 2. Tạo mã và lưu vào bảng Coupons cho từng người dùng
        $prefix = strtoupper($request->code_prefix ?? 'CODE');
        $discountType = $request->discount_type === 'percentage' ? 'percent' : 'fixed';
        $sentCount = 0;
        $details = [];

        DB::beginTransaction();
        try {
            foreach ($customers as $customer) {
                // Tạo mã ngẫu nhiên độc nhất
                $randomString = strtoupper(Str::random($request->code_length));
                $couponCode = $prefix.'-'.$randomString;

                // Đảm bảo không trùng lặp mã coupon trong DB
                while (Coupon::where('coupon_code', $couponCode)->exists()) {
                    $randomString = strtoupper(Str::random($request->code_length));
                    $couponCode = $prefix.'-'.$randomString;
                }

                // Lưu coupon vào Database
                $coupon = Coupon::create([
                    'coupon_code' => $couponCode,
                    'discount_type' => $discountType,
                    'discount_value' => $request->discount_value,
                    'min_order_value' => $request->min_order,
                    'start_date' => Carbon::now()->format('Y-m-d'),
                    'end_date' => Carbon::now()->addDays($request->expiry_days)->format('Y-m-d'),
                    'usage_limit' => 1, // Mã cá nhân dùng 1 lần
                ]);

                // Xây dựng nội dung tin nhắn gửi đi
                $msgSubject = $request->email_subject;
                $msgBody = str_replace(
                    ['[MÃ_TỰ_SINH]', '[SỐ_NGÀY]'],
                    [$couponCode, $request->expiry_days],
                    $request->message_body
                );

                $details[] = [
                    'fullname' => $customer->fullname,
                    'email' => $customer->email,
                    'phone' => $customer->phone,
                    'code' => $couponCode,
                    'body' => $msgBody,
                ];

                $sentCount++;
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Đã xảy ra lỗi khi tạo mã khuyến mãi: '.$e->getMessage());
        }

        // Tạo chuỗi thông báo kết quả chi tiết
        $successMsg = 'Đã sinh mã và gửi thông báo thành công cho '.$sentCount.' khách hàng thành công!';

        return redirect()->route('quanly_guima')->with('success', $successMsg)->with('details', $details);
    }
}
