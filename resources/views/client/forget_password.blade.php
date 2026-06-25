<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Khôi phục mật khẩu - FOODELICIOUS</title>

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
            max-width: 450px;
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
    </style>
</head>

<body>

    <div class="auth-container">
        <div class="card auth-card p-4 text-dark">
            <div class="auth-header mb-4">
                <div class="fs-1 mb-2" style="color: #ce1126;"><i class="bi bi-shield-lock-fill"></i></div>
                <h4 class="fw-bold mb-1" style="color: #ce1126;">QUÊN MẬT KHẨU?</h4>
                <p class="text-muted small mb-0">Nhập số điện thoại tài khoản của bạn để nhận mã xác thực OTP đặt lại
                    mật khẩu khóa</p>
            </div>

            <form action="#" method="POST">
                <div class="mb-4">
                    <label for="phone" class="form-label small fw-bold">Số điện thoại đăng ký tài khoản <span
                            class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-telephone"></i></span>
                        <input type="tel" class="form-control" id="phone" name="phone"
                            placeholder="Nhập số điện thoại xác minh" required>
                    </div>
                    <div class="form-text small text-muted mt-2">
                        <i class="bi bi-info-circle"></i> Hệ thống SMS Brandname của quán sẽ gửi một tin nhắn chứa mã
                        OTP xác minh gồm 6 chữ số đến thiết bị này.
                    </div>
                </div>

                <button type="submit" class="btn btn-auth w-100 rounded shadow-sm mb-3">TIẾP TỤC XÁC MINH</button>

                <div class="text-center small mt-2">
                    <a href="{{ route('trangchu/dangnhap') }}" class="auth-link"><i class="bi bi-arrow-left me-1"></i> Quay lại Đăng
                        nhập</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>