<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Xác nhận OTP - FOODELICIOUS</title>

    <meta name="description" content="">
    <meta name="keywords" content="">

    <link href="{{ asset('logo.jpg') }}" rel="icon">
    <link href="{{ asset('client/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('client/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="{{ asset('client/assets/css/main.css') }}" rel="stylesheet">

    <style>
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .auth-card {
            max-width: 480px;
            width: 100%;
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            background-color: #fff;
        }

        .auth-header {
            text-align: center;
            border-bottom: 1px solid #f4f4f4;
            padding-bottom: 15px;
        }

        .btn-auth {
            background-color: #ce1126;
            color: white;
            font-weight: 600;
            padding: 10px;
        }

        .btn-auth:hover {
            background-color: #a00d20;
            color: white;
        }

        .form-control:focus {
            border-color: #ce1126;
            box-shadow: 0 0 0 0.25rem rgba(206, 17, 38, 0.15);
        }

        .auth-link {
            color: #ce1126;
            text-decoration: none;
            font-weight: 500;
        }

        .auth-link:hover {
            color: #a00d20;
            text-decoration: underline;
        }

        .otp-input {
            letter-spacing: 0.5rem;
            font-size: 1.5rem;
            text-align: center;
            font-family: monospace;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="auth-container">
        <div class="card auth-card p-4 text-dark">
            <div class="auth-header mb-4">
                <div class="fs-1 mb-2" style="color: #ce1126;"><i class="bi bi-shield-lock-fill"></i></div>
                <h4 class="fw-bold mb-1" style="color: #ce1126;">XÁC THỰC MÃ OTP</h4>
                <p class="text-muted small mb-0">Nhập mã xác thực đã được gửi đến email của bạn và thiết lập mật khẩu mới</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show small" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                    {{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('trangchu/quenmatkhau/xacnhan.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label small fw-bold">Email khôi phục</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control bg-light" id="email" name="email"
                            value="{{ old('email', request('email')) }}" readonly required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="otp" class="form-label small fw-bold">Mã xác thực OTP (6 số) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control otp-input" id="otp" name="otp"
                        placeholder="••••••" maxlength="6" pattern="\d{6}" required autocomplete="one-time-code">
                    <div class="form-text small text-muted">
                        Mã OTP gồm 6 chữ số được gửi qua Gmail SMTP.
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label small fw-bold">Mật khẩu mới <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Tối thiểu 6 ký tự" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label small fw-bold">Nhập lại mật khẩu <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-auth w-100 rounded shadow-sm mb-3">XÁC NHẬN ĐỔI MẬT KHẨU</button>

                <div class="text-center small mt-2">
                    <a href="{{ route('trangchu/dangnhap') }}" class="auth-link"><i class="bi bi-arrow-left me-1"></i> Quay lại Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
