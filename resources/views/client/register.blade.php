<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Đăng ký thành viên - FOODELICIOUS</title>

    <meta name="description" content="">
    <meta name="keywords" content="">

    <link href="{{ asset('logo.jpg') }}" rel="icon">
    <link href="{{ asset('client/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
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
            padding: 30px 20px;
        }

        .auth-card {
            max-width: 550px;
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

        .form-control:focus,
        .form-select:focus {
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
                <h3 class="fw-bold mb-1" style="color: #ce1126;">TẠO TÀI KHOẢN MỚI</h3>
                <p class="text-muted small mb-0">Trở thành thành viên hệ thống để nhận nhiều ưu đãi tích điểm</p>
            </div>

            <form action="#" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label small fw-bold">Họ và Tên <span
                            class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ví dụ: Dương Bá Tùng"
                            required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="phone" class="form-label small fw-bold">Số điện thoại <span
                                class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="09xxxxxxxx"
                            required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="email" class="form-label small fw-bold">Địa chỉ Email <span
                                class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                            required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label small fw-bold">Địa chỉ giao hàng mặc định <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" id="address" name="address" rows="2"
                        placeholder="Số nhà, tên đường, phường/xã, quận/huyện..." required></textarea>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="password" class="form-label small fw-bold">Mật khẩu khóa <span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Tối thiểu 6 ký tự" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label small fw-bold">Xác nhận mật khẩu <span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                    </div>
                </div>

                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                    <label class="form-check-label small text-secondary" for="terms">Tôi đồng ý với các điều khoản sử
                        dụng và chính sách bảo mật hệ thống</label>
                </div>

                <button type="submit" class="btn btn-auth w-100 rounded shadow-sm mb-3">ĐĂNG KÝ THÀNH VIÊN</button>

                <div class="text-center small mt-1">
                    <span class="text-muted">Bạn đã có tài khoản sẵn?</span>
                    <a href="login_client.html" class="auth-link ms-1">Quay lại Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>