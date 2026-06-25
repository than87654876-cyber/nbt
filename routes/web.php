<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDishController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminPromotionController;
use App\Http\Controllers\AdminSubscriptionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StaffWorkspaceController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

// --- Giao diện khách vãng lai & Trang chủ ---
Route::get('/', function () {
    return redirect()->route('trangchu');
});
Route::get('/trangchu', [ShopController::class, 'index'])->name('trangchu');

// --- Phân hệ Xác thực (Authentication) ---
// Admin & Staff login
Route::get('/dangnhap', [AuthController::class, 'showAdminLogin'])->name('dangnhap');
Route::post('/dangnhap', [AuthController::class, 'adminLogin'])->name('dangnhap.post');
Route::get('/dangky', [AuthController::class, 'showAdminRegister'])->name('dangky');
Route::post('/dangky', [AuthController::class, 'adminRegister'])->name('dangky.post');
Route::any('/dangxuat', [AuthController::class, 'logout'])->name('dangxuat');

// Client login & register
Route::get('/trangchu/dangnhap', [AuthController::class, 'showClientLogin'])->name('trangchu/dangnhap');
Route::post('/trangchu/dangnhap', [AuthController::class, 'clientLogin'])->name('trangchu/dangnhap.post');
Route::get('/trangchu/dangky', [AuthController::class, 'showClientRegister'])->name('trangchu/dangky');
Route::post('/trangchu/dangky', [AuthController::class, 'clientRegister'])->name('trangchu/dangky.post');

Route::get('/quenmatkhau', function () {
    return view('admin.forgot_password');
})->name('quenmatkhau');

Route::get('/trangchu/quenmatkhau', function () {
    return view('client.forget_password');
})->name('trangchu/quenmatkhau');

Route::get('/trangchu/doimatkhau', function () {
    return view('client.password_reset');
})->name('trangchu/doimatkhau');

Route::get('/doimatkhau', function () {
    return view('admin.password_reset');
})->name('doimatkhau');

// --- Phân hệ Khách hàng Đăng nhập ---
Route::middleware(['auth'])->group(function () {
    Route::get('/trangchu_dangnhap', [ShopController::class, 'shopLogged'])->name('trangchu_dangnhap');

    // Giỏ hàng & Thanh toán
    Route::get('/giohang', [CartController::class, 'index'])->name('giohang');
    Route::post('/giohang/add', [CartController::class, 'add'])->name('giohang.add');
    Route::post('/giohang/update', [CartController::class, 'update'])->name('giohang.update');
    Route::post('/giohang/remove', [CartController::class, 'remove'])->name('giohang.remove');

    Route::get('/muahang', [CartController::class, 'checkoutPage'])->name('muahang');
    Route::post('/muahang/process', [CartController::class, 'processCheckout'])->name('muahang.process');
    Route::post('/order/cancel', [CartController::class, 'cancelOrder'])->name('order.cancel');
    Route::post('/order/review', [CartController::class, 'reviewOrder'])->name('order.review');
    Route::post('/order/refund', [CartController::class, 'refundOrder'])->name('order.refund');
    Route::get('/thanhtoan_momo', [CartController::class, 'momoMethod'])->name('thanhtoan_momo');
    Route::get('/thanhtoan_ATM', [CartController::class, 'atmMethod'])->name('thanhtoan_ATM');
    Route::get('/thanhtoan_chuyenkhoan', [CartController::class, 'transferPayment'])->name('thanhtoan_chuyenkhoan');
    Route::get('/thanhtoan_hoantat/{id}', [CartController::class, 'completePayment'])->name('thanhtoan_hoantat');

    Route::get('/yeucauhoan', [CartController::class, 'refundsList'])->name('yeucauhoan');

    Route::get('/goidichvu', [SubscriptionController::class, 'index'])->name('goidichvu');
    Route::post('/goidichvu/buy', [SubscriptionController::class, 'buyPackage'])->name('goidichvu.buy');
    Route::post('/goidichvu/change-menu', [SubscriptionController::class, 'changeMenu'])->name('goidichvu.change-menu');
    Route::post('/goidichvu/add-note', [SubscriptionController::class, 'addNote'])->name('goidichvu.add-note');
    Route::post('/goidichvu/pause', [SubscriptionController::class, 'pause'])->name('goidichvu.pause');
    Route::post('/goidichvu/cancel', [SubscriptionController::class, 'cancel'])->name('goidichvu.cancel');
    Route::post('/goidichvu/review', [SubscriptionController::class, 'review'])->name('goidichvu.review');
});

// --- Phân hệ Quản trị (Admin) & Nhân viên (Staff) ---
Route::middleware(['admin'])->group(function () {

    // Các chức năng chỉ Admin (SuperAdmin) mới có quyền truy cập
    Route::middleware(['superadmin'])->group(function () {
        Route::get('/quanly', function () {
            return view('admin.revenue_report');
        })->name('quanly');

        Route::get('/quanly_trangchu', function () {
            return view('admin.mainpage');
        })->name('quanly_trangchu');

        // Quản lý Khuyến mãi
        Route::get('/quanly_khuyenmai', [AdminPromotionController::class, 'index'])->name('quanly_khuyenmai');
        Route::get('/khuyenmai_them', [AdminPromotionController::class, 'create'])->name('khuyenmai_them');
        Route::post('/khuyenmai_them', [AdminPromotionController::class, 'store'])->name('khuyenmai_them.post');
        Route::get('/khuyenmai_xem/{id}', [AdminPromotionController::class, 'show'])->name('khuyenmai_xem');
        Route::get('/khuyenmai_chinhsua/{id}', [AdminPromotionController::class, 'edit'])->name('khuyenmai_chinhsua');
        Route::post('/khuyenmai_chinhsua/{id}', [AdminPromotionController::class, 'update'])->name('khuyenmai_chinhsua.post');
        Route::post('/khuyenmai_xoa/{id}', [AdminPromotionController::class, 'destroy'])->name('khuyenmai_xoa');

        // Quản lý Nhân viên
        Route::get('/quanly_nhanvien', [AdminUserController::class, 'employeesList'])->name('quanly_nhanvien');
        Route::get('/nhanvien_them', [AdminUserController::class, 'employeeCreate'])->name('nhanvien_them');
        Route::post('/nhanvien_them', [AdminUserController::class, 'employeeStore'])->name('nhanvien_them.post');
        Route::get('/nhanvien_xem/{id}', [AdminUserController::class, 'employeeShow'])->name('nhanvien_xem');
        Route::get('/nhanvien_chinhsua/{id}', [AdminUserController::class, 'employeeEdit'])->name('nhanvien_chinhsua');
        Route::post('/nhanvien_chinhsua/{id}', [AdminUserController::class, 'employeeUpdate'])->name('nhanvien_chinhsua.post');
        Route::post('/nhanvien_xoa/{id}', [AdminUserController::class, 'employeeDestroy'])->name('nhanvien_xoa');

        // Quản lý Gửi mã coupon
        Route::get('/quanly_guima', [AdminPromotionController::class, 'showSendCoupon'])->name('quanly_guima');
        Route::post('/quanly_guima', [AdminPromotionController::class, 'sendCoupon'])->name('quanly_guima.post');
    });

    // Các chức năng dùng chung cho cả Admin và Staff (Điều hành, đơn hàng, thực đơn)

    // Bàn làm việc nhân viên
    Route::get('/quanly_banlamviec', [StaffWorkspaceController::class, 'index'])->name('quanly_banlamviec');

    // Quản lý Danh mục
    Route::get('/quanly_danhmuc', [AdminCategoryController::class, 'index'])->name('quanly_danhmuc');
    Route::get('/danhmuc_xem/{id}', [AdminCategoryController::class, 'show'])->name('danhmuc_xem');
    Route::get('/danhmuc_them', [AdminCategoryController::class, 'create'])->name('danhmuc_them');
    Route::post('/danhmuc_them', [AdminCategoryController::class, 'store'])->name('danhmuc_them.post');
    Route::get('/danhmuc_chinhsua/{id}', [AdminCategoryController::class, 'edit'])->name('danhmuc_chinhsua');
    Route::post('/danhmuc_chinhsua/{id}', [AdminCategoryController::class, 'update'])->name('danhmuc_chinhsua.post');
    Route::post('/danhmuc_xoa/{id}', [AdminCategoryController::class, 'destroy'])->name('danhmuc_xoa');

    // Quản lý Món ăn đơn
    Route::get('/quanly_monandon', [AdminDishController::class, 'index'])->name('quanly_monandon');
    Route::get('/monandon_them', [AdminDishController::class, 'create'])->name('monandon_them');
    Route::post('/monandon_them', [AdminDishController::class, 'store'])->name('monandon_them.post');
    Route::get('/monandon_chinhsua/{id}', [AdminDishController::class, 'edit'])->name('monandon_chinhsua');
    Route::post('/monandon_chinhsua/{id}', [AdminDishController::class, 'update'])->name('monandon_chinhsua.post');
    Route::get('/monandon_xem/{id}', [AdminDishController::class, 'show'])->name('monandon_xem');
    Route::post('/monandon_xoa/{id}', [AdminDishController::class, 'destroy'])->name('monandon_xoa');

    // Quản lý Gói dịch vụ (Sản phẩm gói)
    Route::get('/quanly_goidichvu', function () {
        return view('admin.packages');
    })->name('quanly_goidichvu');
    Route::get('/goidichvu_them', function () {
        return view('admin.packages_add');
    })->name('goidichvu_them');
    Route::get('/goidichvu_xem', function () {
        return view('admin.packages_detail');
    })->name('goidichvu_xem');
    Route::get('/goidichvu_chinhsua', function () {
        return view('admin.packages_edit');
    })->name('goidichvu_chinhsua');

    // Quản lý Đơn hàng
    Route::get('/quanly_donhang', [AdminOrderController::class, 'index'])->name('quanly_donhang');
    Route::get('/donhang_xem/{id}', [AdminOrderController::class, 'show'])->name('donhang_xem');
    Route::get('/donhang_chinhsua/{id}', [AdminOrderController::class, 'edit'])->name('donhang_chinhsua');
    Route::post('/donhang_chinhsua/{id}', [AdminOrderController::class, 'update'])->name('donhang_chinhsua.post');
    Route::post('/donhang_xoa/{id}', [AdminOrderController::class, 'destroy'])->name('donhang_xoa');

    // Bếp chuẩn bị món
    Route::get('/quanly_bep', [AdminOrderController::class, 'kitchenReport'])->name('quanly_bep');

    // Quản lý Gói đăng ký
    Route::get('/quanly_goidangky', [AdminSubscriptionController::class, 'index'])->name('quanly_goidangky');
    Route::get('/goidangky_xem/{id}', [AdminSubscriptionController::class, 'show'])->name('goidangky_xem');
    Route::get('/goidangky_chinhsua/{id}', [AdminSubscriptionController::class, 'edit'])->name('goidangky_chinhsua');
    Route::post('/goidangky_chinhsua/{id}', [AdminSubscriptionController::class, 'update'])->name('goidangky_chinhsua.post');
    Route::post('/goidangky_xoa/{id}', [AdminSubscriptionController::class, 'destroy'])->name('goidangky_xoa');
    Route::post('/goidangky_tao_don/{id}', [AdminSubscriptionController::class, 'createDailyOrder'])->name('goidangky_tao_don');

    // Quản lý Hoàn tiền
    Route::get('/quanly_yeucauhoan', [AdminOrderController::class, 'refundsList'])->name('quanly_yeucauhoan');
    Route::get('/yeucauhoan_xem/{id}', [AdminOrderController::class, 'refundShow'])->name('yeucauhoan_xem');
    Route::post('/yeucauhoan_duyet/{id}', [AdminOrderController::class, 'refundApprove'])->name('yeucauhoan_duyet');

    // Quản lý Khách hàng
    Route::get('/quanly_khachhang', [AdminUserController::class, 'customersList'])->name('quanly_khachhang');
    Route::get('/khachhang_xem/{id}', [AdminUserController::class, 'customerShow'])->name('khachhang_xem');
    Route::get('/khachhang_chinhsua/{id}', [AdminUserController::class, 'customerEdit'])->name('khachhang_chinhsua');
    Route::post('/khachhang_chinhsua/{id}', [AdminUserController::class, 'customerUpdate'])->name('khachhang_chinhsua.post');
    Route::post('/khachhang_xoa/{id}', [AdminUserController::class, 'customerDestroy'])->name('khachhang_xoa');
});
