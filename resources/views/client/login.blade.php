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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" type="text/css">

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

            <form action="{{ route('dangnhap.post') }}" method="POST" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label for="login_input" class="form-label small fw-bold">Email hoặc Số điện thoại <span
                            class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="login_input" name="login_input" value="{{ old('login_input') }}"
                            placeholder="Nhập email hoặc số điện thoại" required autocomplete="off">
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
                            placeholder="Nhập mật khẩu" required autocomplete="new-password">
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

                <!-- Google Sign-In Integrations -->
                <div class="text-center my-3">
                    <div class="text-muted small mb-3">- HOẶC -</div>
                    <a href="{{ route('auth.google') }}" class="btn btn-outline-dark w-100 d-flex align-items-center justify-content-center gap-2 py-2 fw-semibold shadow-sm" style="border-color: #dadce0; border-radius: 6px; background-color: #fff; font-size: 14px; text-decoration: none; color: #3c4043; transition: all 0.2s ease-in-out;">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 48 48" class="me-1">
                            <g>
                                <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                                <path fill="#4285F4" d="M46.5 24c0-1.55-.15-3.24-.47-4.77H24v9.03h12.75c-.53 2.85-2.14 5.27-4.56 6.88l7.11 5.51C43.46 36.56 46.5 30.93 46.5 24z"></path>
                                <path fill="#FBBC05" d="M10.54 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24s.92 7.54 2.56 10.78l7.98-6.19z"></path>
                                <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.11-5.51c-1.97 1.32-4.5 2.12-8.78 2.12-6.26 0-11.57-4.22-13.46-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                            </g>
                        </svg>
                        Đăng nhập bằng Google
                    </a>
                </div>

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