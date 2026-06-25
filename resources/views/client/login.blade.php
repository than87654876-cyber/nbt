<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Đăng nhập - FOODELICIOUS</title>
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
            padding-bottom: 20px;
        }

        .auth-logo {
            height: 60px;
            margin-bottom: 15px;
        }

        .btn-auth {
            background-color: #ce1126;
            color: white;
            font-weight: 600;
            padding: 10px;
            transition: background-color 0.3s;
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
                <img src="{{ asset('logo.jpg') }}" alt="FOODELICIOUS" class="auth-logo rounded-circle shadow-sm">
                <h3 class="fw-bold mb-1" style="color: #ce1126;">FOODELICIOUS</h3>
                <p class="text-muted small mb-0">Đăng nhập tài khoản để đặt món ăn ngay</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger py-2 small">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success py-2 small">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('trangchu/dangnhap.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="phone" class="form-label small fw-bold">Số điện thoại <span
                            class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-telephone"></i></span>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                            placeholder="Nhập số điện thoại của bạn" required>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <label for="password" class="form-label small fw-bold mb-0">Mật khẩu <span
                                class="text-danger">*</span></label>
                        <a href="{{ route('trangchu/quenmatkhau') }}" class="small auth-link">Quên mật khẩu?</a>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Nhập mật khẩu" required>
                        <button class="btn btn-outline-secondary bg-light text-muted border-start-0" type="button"
                            id="togglePassword">
                            <i class="bi bi-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label small text-secondary" for="remember">Ghi nhớ đăng nhập trên thiết bị
                        này</label>
                </div>

                <button type="submit" class="btn btn-auth w-100 rounded shadow-sm mb-3">ĐĂNG NHẬP</button>

                <div class="text-center small mt-2">
                    <span class="text-muted">Bạn chưa có tài khoản?</span>
                    <a href="{{ route('trangchu/dangky') }}" class="auth-link ms-1">Đăng ký thành viên mới</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        });
    </script>
    <script src="{{ asset('client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('client/assets/js/main.js') }}"></script>

</body>

</html>