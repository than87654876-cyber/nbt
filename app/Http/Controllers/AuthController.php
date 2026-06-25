<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Hiển thị trang đăng nhập admin/staff
    public function showAdminLogin()
    {
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'staff'])) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('quanly');
            }

            return redirect()->route('quanly_banlamviec');
        }

        return view('admin.login');
    }

    // Xử lý đăng nhập admin/staff (bằng email)
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $user = Auth::user();
            if (in_array($user->role, ['admin', 'staff'])) {
                if ($user->role === 'admin') {
                    return redirect()->route('quanly');
                }

                return redirect()->route('quanly_banlamviec');
            }
            Auth::logout();

            return back()->withErrors(['email' => 'Bạn không có quyền truy cập vào hệ thống này.']);
        }

        return back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác.']);
    }

    // Hiển thị trang đăng ký admin
    public function showAdminRegister()
    {
        return view('admin.register');
    }

    // Xử lý đăng ký admin
    public function adminRegister(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'status' => true,
        ]);

        return redirect()->route('dangnhap')->with('success', 'Đăng ký tài khoản Admin thành công. Vui lòng đăng nhập.');
    }

    // Hiển thị trang đăng nhập client (bằng sđt)
    public function showClientLogin()
    {
        if (Auth::check()) {
            return redirect()->route('trangchu_dangnhap');
        }

        return view('client.login');
    }

    // Xử lý đăng nhập client
    public function clientLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        // Tìm người dùng bằng số điện thoại
        $user = User::where('phone', $request->phone)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user, $request->has('remember'));

            return redirect()->route('trangchu_dangnhap');
        }

        return back()->withErrors(['phone' => 'Số điện thoại hoặc mật khẩu không chính xác.']);
    }

    // Hiển thị trang đăng ký client
    public function showClientRegister()
    {
        return view('client.register');
    }

    // Xử lý đăng ký client
    public function clientRegister(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20|unique:users',
            'address' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'customer',
            'status' => true,
            'notes' => 'Địa chỉ: '.$request->address,
        ]);

        return redirect()->route('trangchu/dangnhap')->with('success', 'Đăng ký thành viên thành công. Vui lòng đăng nhập.');
    }

    // Xử lý đăng xuất
    public function logout()
    {
        $isAdmin = false;
        if (Auth::check()) {
            $isAdmin = in_array(Auth::user()->role, ['admin', 'staff']);
        }
        Auth::logout();

        return $isAdmin ? redirect()->route('dangnhap') : redirect()->route('trangchu');
    }
}
