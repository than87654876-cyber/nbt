<?php

use App\Http\Controllers\SinhVienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
Route::get('/quanly', function () {
    return view('admin.revenue_report');
})->name('quanly');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sinh_vien', [SinhVienController::class, 'index'])->name('sinh_vien.index');
Route::get('/trangchu', function () {
    return view('client.shop');
})->name('trangchu');

Route::get('/giohang', function () {
    $orders = [
        (object) [
            'id' => 1,
            'created_at' => now(),
            'status' => 'Chờ xử lý',
            'items' => [
                ['product_name' => 'Phở Bò', 'quantity' => 2, 'price' => 45000],
                ['product_name' => 'Bánh Mì Thịt', 'quantity' => 1, 'price' => 32000]
            ],
            'payment_method' => 'Thanh toán khi nhận hàng',
            'total' => 122000
        ]
    ];
    return view('client.cart', ['orders' => $orders]);
})->name('giohang');

// Routes cho giỏ hàng
Route::get('/giohang', function () {
    return view('client.cart');
})->name('giohang');

Route::get('/thanhtoan_momo', function () {
    return view('client.momo_method');
})->name('thanhtoan_momo');

Route::get('/thanhtoan_ATM', function () {
    return view('client.ATM_method');
})->name('thanhtoan_ATM');

Route::get('/muahang', function () {
    return view('client.buy');
})->name('muahang');

Route::get('/nhanvien/donhang', function () {
    return view('staff.staff_orders');
})->name('nhanvien.donhang');

Route::get('/nhanvien/donhang_xacnhan', function () {
    return view('staff.staff_orders_confirm');
})->name('nhanvien.donhang_xacnhan');

Route::get('/nhanvien/goidichvu', function () {
    return view('staff.staff_subpackages');
})->name('nhanvien.goidichvu');

Route::get('/nhanvien/goidichvu_chinhsua', function () {
    return view('staff.staff_subpackages_edit');
})->name('nhanvien.goidichvu_chinhsua');

Route::get('/nhanvien/goidichvu_hoatdong', function () {
    return view('staff.staff_subpackages_active');
})->name('nhanvien.goidichvu_hoatdong');

Route::get('/nhanvien/goidichvu_hethan', function () {
    return view('staff.staff_subpackages_expired');
})->name('nhanvien.goidichvu_hethan');

Route::get('/nhanvien/donhang_xem', function () {
    return view('staff.staff_orders_detail');
})->name('nhanvien.donhang_xem');

Route::get('/nhanvien/donhang_giao', function () {
    return view('staff.staff_orders_deliver');
})->name('nhanvien.donhang_giao');

Route::get('/quanly_monandon', function () {
    return view('admin.single_dishes');
})->name('quanly_monandon');

Route::get('/quanly_goidichvu', function () {
    return view('admin.packages');
})->name('quanly_goidichvu');


Route::get('/quanly_khuyenmai', function () {
    return view('admin.promotion');
})->name('quanly_khuyenmai');

Route::get('/thanhtoan_chuyenkhoan', function () {
    return view('client.transfer_payment');
})->name('thanhtoan_chuyenkhoan');

Route::get('/khuyenmai_xem', function () {
    return view('admin.promotion_detail');
})->name('khuyenmai_xem');

Route::get('/nhanvien_them', function () {
    return view('admin.employees_add');
})->name('nhanvien_them');

Route::get('/quanly_trangchu', function () {
    return view('admin.mainpage');
})->name('quanly_trangchu');

Route::get('/quanly_danhmuc', function () {
    return view('admin.category');
})->name('quanly_danhmuc');

Route::get('/danhmuc_xem', function () {
    return view('admin.category_detail');
})->name('danhmuc_xem');

Route::get('/danhmuc_them', function () {
    return view('admin.category_add');
})->name('danhmuc_them');

Route::get('/danhmuc_chinhsua', function () {
    return view('admin.category_edit');
})->name('danhmuc_chinhsua');


Route::get('/khuyenmai_chinhsua', function () {
    return view('admin.promotion_edit');
})->name('khuyenmai_chinhsua');

Route::get('/dangnhap', function () {
    return view('admin.login');
})->name('dangnhap');

Route::get('/dangky', function () {
    return view('admin.register');
})->name('dangky');

Route::get('/trangchu_dangnhap', function () {
    return view('client.shop_logged');
})->name('trangchu_dangnhap');

Route::get('/quanly_donhang', function () {
    return view('admin.orders');
})->name('quanly_donhang');

Route::get('/goidichvu', function () {
    return view('client.sub_packages');
})->name('goidichvu');

Route::get('/quanly_yeucauhoan', function () {
    return view('admin.refunds');
})->name('quanly_yeucauhoan');

Route::get('/yeucauhoan_xem', function () {
    return view('admin.refunds_detail');
})->name('yeucauhoan_xem');

Route::get('/yeucauhoan', function () {
    return view('client.refunds');
})->name('yeucauhoan');

Route::get('/trangchu/dangnhap', function () {
    return view('client.login');
})->name('trangchu/dangnhap');

Route::get('/trangchu/dangky', function () {
    return view('client.register');
})->name('trangchu/dangky');

Route::get('/doimatkhau', function () {
    return view('admin.password_reset');
})->name('doimatkhau');

Route::get('/monandon_them', function () {
    return view('admin.single_dishes_add');
})->name('monandon_them');

Route::get('/goidichvu_them', function () {
    return view('admin.packages_add');
})->name('goidichvu_them');

Route::get('/khuyenmai_them', function () {
    return view('admin.promotion_add');
})->name('khuyenmai_them');

Route::get('/trangchu/quenmatkhau', function () {
    return view('client.forget_password');
})->name('trangchu/quenmatkhau');

Route::get('/trangchu/doimatkhau', function () {
    return view('client.password_reset');
})->name('trangchu/doimatkhhau');

Route::get('/quanly_goidangky', function () {
    return view('admin.sub_packages');
})->name('quanly_goidangky');

Route::get('/goidangky_xem', function () {
    return view('admin.sub_packages_detail');
})->name('goidangky_xem');

Route::get('/goidangky_chinhsua', function () {
    return view('admin.sub_packages_edit');
})->name('goidangky_chinhsua');

Route::get('/donhang_xem', function () {
    return view('admin.orders_detail');
})->name('donhang_xem');

Route::get('/donhang_chinhsua', function () {
    return view('admin.orders_edit');
})->name('donhang_chinhsua');

Route::get('/quanly_nhanvien', function () {
    return view('admin.employees');
})->name('quanly_nhanvien');

Route::get('/nhanvien_xem', function () {
    return view('admin.employees_detail');
})->name('nhanvien_xem');

Route::get('/quanly_khachhang', function () {
    return view('admin.customers');
})->name('quanly_khachhang');

Route::get('/khachhang_xem', function () {
    return view('admin.customers_detail');
})->name('khachhang_xem');

Route::get('/khachhang_chinhsua', function () {
    return view('admin.customers_edit');
})->name('khachhang_chinhsua');

Route::get('/nhanvien_chinhsua', function () {
    return view('admin.employees_edit');
})->name('nhanvien_chinhsua');

Route::get('/quanly_guima', function () {
    return view('admin.coupons');
})->name('quanly_guima');

Route::get('/quenmatkhau', function () {
    return view('admin.forgot_password');
})->name('quenmatkhau');
Route::get('/monandon_chinhsua', function () {
    return view('admin.single_dishes_edit');
})->name('monandon_chinhsua');
Route::get('/monandon_xem', function () {
    return view('admin.single_dishes_detail');
})->name('monandon_xem');
Route::get('/goidichvu_xem', function () {
    return view('admin.packages_detail');
})->name('goidichvu_xem');
Route::get('/goidichvu_chinhsua', function () {
    return view('admin.packages_edit');
})->name('goidichvu_chinhsua');