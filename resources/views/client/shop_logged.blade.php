<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Trang chủ</title>
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
        /* Tùy chỉnh con trỏ hiển thị dạng click cho danh sách món ăn */
        .search-box {
            margin-bottom: 30px;
        }

        .search-box input {
            border-radius: 5px;
            border: 2px solid #ce1126;
            padding: 10px 15px;
        }

        .search-box button {
            background-color: #ce1126;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-box button:hover {
            background-color: #a00d20;
        }

        .menu-item {
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .menu-item:hover {
            transform: scale(1.02);
        }

        /* Đồng bộ kích thước hình ảnh món ăn */
        .menu-item .menu-img {
            width: 100% !important;
            height: 250px !important;
            object-fit: cover !important;
            border-radius: 8px;
        }

        /* Thêm CSS cho giao diện người dùng ở Header */
        .profile-dropdown .dropdown-toggle::after {
            display: none;
        }

        .profile-dropdown .dropdown-menu {
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
        }

        .badge-diamond {
            background-color: #e6f7ff;
            color: #0050b3;
            border: 1px solid #91d5ff;
        }

        .badge-gold {
            background-color: #fffbe6;
            color: #d46b08;
            border: 1px solid #ffe58f;
        }

        .badge-silver {
            background-color: #f5f5f5;
            color: #595959;
            border: 1px solid #d9d9d9;
        }

        .badge-bronze {
            background-color: #f5f5f5;
            color: #613400;
            border: 1px solid #ffd8bf;
        }
    </style>
    @vite(['resources/js/app.js'])
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('trangchu') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ isset($settings['logo_url']) ? (Str::startsWith($settings['logo_url'], 'http') ? $settings['logo_url'] : asset($settings['logo_url'])) : asset('logo.jpg') }}" alt="" class="setting-logo-img">
                <h1 class="sitename">FOODELICIOUS</h1>
                <span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Trang chủ<br></a></li>
                    <li><a href="#about">Thông tin</a></li>
                    <li class="dropdown"><a href="#menu"><span>Thực đơn</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#menu">Ăn sáng</a></li>
                            <li><a href="#menu">Tráng miệng</a></li>
                        </ul>
                    </li>
                    <li><a href="#events">Chương trình</a></li>
                    <li><a href="#contact">Liên hệ</a></li>
                    <li><a href="{{ route('tracuu') }}">Tra cứu đơn hàng</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="d-flex align-items-center gap-3">
                <a class="btn-cart" title="Giỏ hàng" data-bs-toggle="modal" data-bs-target="#cartModal">
                    <i class="bi bi-cart-fill fs-5"></i>
                </a>
                <div class="dropdown profile-dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button"
                        id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-user-circle fs-4 text-dark"></i>
                        <span class="fw-bold text-dark d-none d-md-inline">{{ Auth::user()->fullname }}</span>
                        <i class="bi bi-chevron-down small text-muted"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="userMenu">
                        @if(in_array(Auth::user()->role, ['admin', 'staff']))
                        <li>
                            <a class="dropdown-item py-2 fw-bold text-primary" href="{{ Auth::user()->role === 'admin' ? route('quanly') : route('quanly_banlamviec') }}">
                                <i class="bi bi-shield-lock me-2"></i>Trang Quản Trị
                            </a>
                        </li>
                        @endif
                        <li>
                            <a class="dropdown-item py-2" href="#" data-bs-toggle="modal"
                                data-bs-target="#userProfileModal">
                                <i class="bi bi-person-badge me-2 text-primary"></i>Hồ sơ thông tin
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="{{ route('giohang') }}">
                                <i class="bi bi-clock-history me-2 text-success"></i>Lịch sử mua hàng
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="{{ route('goidichvu') }}">
                                <i class="bi bi-list me-2 text-success"></i>Gói dịch vụ
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="{{ route('yeucauhoan') }}">
                                <i class="bi bi-cash me-2 text-success"></i>Yêu cầu hoàn tiền
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item py-2 text-danger" href="{{ route('dangxuat') }}">
                                <i class="bi bi-box-arrow-right me-2"></i>Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </header>
    <div class="modal fade" id="subscribePackageModal" tabindex="-1" aria-labelledby="subscribePackageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header text-white"
                    style="background-color: #ce1126; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                    <h5 class="modal-title fw-bold" id="subscribePackageModalLabel">
                        <i class="bi bi-box-seam-fill me-2"></i>Đăng ký gói dịch vụ ăn uống dài hạn
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form action="{{ route('goidichvu.buy') }}" method="POST">
                    @csrf
                    <div class="modal-body text-dark text-start p-4" style="font-family: 'Roboto', sans-serif;">

                        <div class="alert alert-warning py-2 small border-0 mb-3">
                            <i class="bi bi-info-circle-fill me-1"></i> **Lưu ý:** Gói dịch vụ cho phép bạn thay đổi món
                            ăn linh hoạt hàng ngày trước 21h tối hôm trước thông qua mục quản lý tài khoản.
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="package_type" class="form-label fw-bold">1. Chọn gói dịch vụ phù hợp <span
                                        class="text-danger">*</span></label>
                                <select class="form-select font-weight-bold text-primary" id="package_type"
                                    name="package_type" required>
                                    <option value="" selected disabled>-- Chọn gói dịch vụ tích hợp --</option>
                                    <option value="family">Gói Gia Đình Hàng Ngày (Phở, Bánh mì, Cơm tấm...)</option>
                                    <option value="company">Gói Văn Phòng / Công Ty Tuần (Cơm gà, Hủ tiếu, Mì...)
                                    </option>
                                    <option value="dinner">Gói Ăn Chiều Tối Dinh Dưỡng (Cháo gà, Bánh bao, Cơm lươn...)
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label for="package_duration" class="form-label fw-bold">2. Thời gian đăng ký gói <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="package_duration" name="package_duration" required>
                                    <option value="7">Gói trải nghiệm ngắn hạn (7 ngày)</option>
                                    <option value="14">Gói bán thời gian tích hợp (14 ngày)</option>
                                    <option value="30" selected>Gói dài hạn tiết kiệm (30 ngày - Tối ưu nhất)</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="start_date" class="form-label fw-bold">Ngày bắt đầu kích hoạt nhận món <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control font-weight-bold text-secondary" id="start_date"
                                    name="start_date" value="2026-06-18" min="2026-06-17" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="delivery_slot" class="form-label fw-bold">Khung giờ giao hàng cố
                                    định</label>
                                <select class="form-select" id="delivery_slot" name="delivery_slot">
                                    <option value="morning">Buổi sáng giao sớm (07:00 - 08:30)</option>
                                    <option value="noon" selected>Buổi trưa văn phòng (11:00 - 12:30)</option>
                                    <option value="evening">Buổi chiều tối muộn (17:30 - 19:00)</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="sub_phone" class="form-label fw-bold">Số điện thoại nhận hàng <span
                                        class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="sub_phone" name="sub_phone"
                                    value="0901234567" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="sub_email" class="form-label fw-bold">Email nhận hóa đơn & lịch trình <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="sub_email" name="sub_email"
                                    value="tung.db@gmail.com" required>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="sub_address" class="form-label fw-bold">Địa chỉ giao hàng cố định toàn gói <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="sub_address" name="sub_address"
                                value="Trường Cao đẳng Công nghệ Thông tin TP.HCM (ITC), Quận Tân Phú, Ho Chi Minh City"
                                required>
                            <small class="text-muted">* Bạn có thể cập nhật tạm thời địa chỉ giao hàng của từng ngày
                                riêng biệt trong bảng quản trị lịch trình sau.</small>
                        </div>

                        <div class="form-group mb-2">
                            <label class="form-label fw-bold d-block">Phương thức thanh toán trả trước gói dịch vụ</label>
                            <div class="form-check form-check-inline me-4">
                                <input class="form-check-input" type="radio" name="sub_payment_method" id="sub_pay_cod"
                                    value="cash" required>
                                <label class="form-check-label" for="sub_pay_cod"><i
                                        class="bi bi-cash text-primary me-1"></i> Tiền mặt (COD)</label>
                            </div>
                            <div class="form-check form-check-inline me-4">
                                <input class="form-check-input" type="radio" name="sub_payment_method" id="sub_pay_transfer"
                                    value="bank_transfer">
                                <label class="form-check-label" for="sub_pay_transfer"><i
                                        class="bi bi-bank text-primary me-1"></i> Chuyển khoản (VietQR)</label>
                            </div>
                            <div class="form-text text-muted mt-2">Chọn <strong>Chuyển khoản</strong> nếu bạn muốn nhận mã QR để thanh toán ngay.</div>
                        </div>
                    </div>

                    <div class="modal-footer bg-light border-0">
                        <button type="button" class="btn btn-secondary shadow-sm" data-bs-dismiss="modal">Đóng cửa
                            sổ</button>
                        <button type="submit" class="btn text-white shadow-sm px-4"
                            style="background-color: #ce1126;">Xác nhận kích hoạt gói</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <main class="main">
        <div class="modal fade" id="userProfileModal" tabindex="-1" aria-labelledby="userProfileModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header text-white text-center d-block position-relative"
                        style="background-color: #ce1126; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                        <h5 class="modal-title fw-bold" id="userProfileModalLabel"><i
                                class="bi bi-person-circle me-2"></i>Hồ sơ
                            tài khoản thành viên</h5>
                        <button type="button" class="btn-close btn-close-white position-absolute end-0 top-0 m-3"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark p-4">
                        <div class="text-center mb-4">
                            <div class="display-5 text-muted mb-2"><i class="bi bi-user-circle"></i></div>
                            <h4 class="fw-bold text-dark mb-1">{{ Auth::user()->fullname }}</h4>
                            @if(in_array(Auth::user()->role, ['admin', 'staff']))
                                <span class="badge bg-danger text-white px-3 py-2 fw-bold"><i class="bi bi-shield-lock-fill me-1"></i>{{ strtoupper(Auth::user()->role) }}</span>
                            @else
                                <span class="badge badge-{{ Auth::user()->membership ?? 'bronze' }} px-3 py-2 fw-bold"><i class="bi bi-crown-fill me-1"></i>Thành viên {{ strtoupper(Auth::user()->membership ?? 'bronze') }}</span>
                            @endif
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="text-muted py-2" style="width: 40%;">Số điện thoại:</td>
                                        <td class="fw-bold py-2">{{ Auth::user()->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted py-2">Địa chỉ Email:</td>
                                        <td class="fw-bold py-2">{{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted py-2">Thông tin ghi chú:</td>
                                        <td class="fw-bold py-2">{{ Auth::user()->notes ?? 'Chưa cập nhật' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted py-2">Ngày đăng ký:</td>
                                        <td class="fw-bold py-2 text-secondary">{{ Auth::user()->created_at ? Auth::user()->created_at->format('d/m/Y') : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted py-2">Điểm tích lũy:</td>
                                        <td class="fw-bold py-2 text-success">{{ number_format(Auth::user()->points) }} Điểm</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0">
                        <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Đóng cửa
                            sổ</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL 2: MUA THỰC PHẨM NHANH (Giữ nguyên từ code cũ) -->
        <div class="modal fade" id="quickBuyModal" tabindex="-1" aria-labelledby="quickBuyModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-white" style="background-color: #ce1126;">
                        <h5 class="modal-title fw-bold" id="quickBuyModalLabel"><i
                                class="bi bi-bag-plus-fill me-2"></i>Thêm món ăn vào giỏ hàng</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form id="quickBuyModalForm" method="POST">
                        <input type="hidden" id="modal-product-id" name="product_id">
                        <div class="modal-body text-dark text-start" style="font-family: 'Roboto', sans-serif;">
                            <div
                                class="alert alert-secondary d-flex justify-content-between align-items-center py-2 mb-3">
                                <div>Món ăn chọn: <strong id="modal-product-name" class="text-danger">N/A</strong></div>
                                <div>Đơn giá: <strong id="modal-product-price" class="text-dark">0 đ</strong></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="quantity" class="form-label fw-bold">Số lượng phần đặt <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="1"
                                    min="1" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="order_notes" class="form-label fw-bold">Yêu cầu/Ghi chú món ăn</label>
                                <textarea class="form-control" id="order_notes" name="order_notes" rows="2"
                                    placeholder="Ví dụ: Ít cay, không lấy hành lá, thêm đá..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn text-white px-4" style="background-color: #ce1126;"><i
                                    class="bi bi-cart-plus"></i> Thêm vào giỏ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container mt-4 pt-2">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <section id="hero" class="hero section light-background">
            <div class="container">
                <div class="row gy-4 justify-content-center justify-content-lg-between">
                    <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Bạn đã sẵn sàng<br>Để tận hưởng những bữa sáng ngon lành </h1>
                        <p data-aos="fade-up" data-aos-delay="100">Đồng hành cùng bạn trên hành trình khám phá những ẩm
                            thực</p>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <img src="{{ asset('client/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content text-dark">
                    <div class="modal-header text-white" style="background-color: #ce1126;">
                        <h5 class="modal-title fw-bold" id="cartModalLabel"><i
                                class="bi bi-cart-check-fill me-2"></i>Giỏ hàng &
                            Xác nhận đặt hàng</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('muahang.process') }}" method="POST" id="cartForm">
                        @csrf
                        <input type="hidden" name="cart_items" id="cartItemsInput">
                        <div class="modal-body text-start" style="font-family: 'Roboto', sans-serif;">
                            <h6 class="fw-bold border-bottom pb-2 text-danger"><i class="bi bi-list-stars"></i> 1. Danh
                                sách món
                                ăn trong giỏ</h6>
                            <div class="p-2 mb-3 bg-light rounded text-dark">
                                <div id="cart-items-container">
                                    <!-- Sẽ được tải động bằng JS -->
                                </div>
                                <div class="pt-2 px-2 border-top">
                                    <div class="d-flex justify-content-between small mb-1">
                                        <span class="text-muted">Tổng tiền hàng tạm tính:</span>
                                        <span class="fw-bold text-dark" id="cart-subtotal-price">0 đ</span>
                                    </div>
                                    <div id="cart-discount-row" class="d-flex justify-content-between small mb-1 d-none text-success">
                                        <span>Khuyến mãi giảm giá:</span>
                                        <span class="fw-bold" id="cart-discount-price">-0 đ</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold">Tổng tiền thanh toán:</span>
                                        <span class="fw-bold text-danger fs-5" id="cart-total-price">0 đ</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Mã giảm giá (Coupon) Section -->
                            <h6 class="fw-bold border-bottom pb-2 text-danger mt-4"><i class="bi bi-tag-fill text-danger"></i> 3. Mã giảm giá (Coupon)</h6>
                            <div class="row align-items-center mb-2">
                                <div class="col-md-8 mb-2 mb-md-0">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control text-uppercase font-weight-bold text-danger" id="coupon_code" name="coupon_code" placeholder="Nhập mã giảm giá (ví dụ: FOODELICIOUS2026)...">
                                        <button class="btn btn-dark fw-bold px-3" type="button" onclick="applyCoupon()">Áp dụng</button>
                                    </div>
                                    <div id="coupon-message" class="small mt-1 d-none"></div>
                                </div>
                            </div>

                            <h6 class="fw-bold border-bottom pb-2 text-danger mt-4"><i class="bi bi-geo-alt-fill"></i>
                                2. Thông
                                tin giao nhận hàng</h6>
                            <div class="row">
                                <div class="form-group col-md-4 mb-3">
                                    <label for="cart_phone" class="form-label small fw-bold">Số điện thoại <span
                                            class="text-danger">*</span></label>
                                    <input type="tel" class="form-control form-control-sm" id="cart_phone" name="cart_phone"
                                        value="{{ Auth::user()->phone }}" required>
                                </div>
                                <div class="form-group col-md-8 mb-3">
                                    <label for="cart_time" class="form-label small fw-bold">Thời gian nhận hàng <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select form-select-sm" id="cart_time" name="cart_time" required>
                                        <option value="now" selected>Ngay bây giờ (Giao hàng hỏa tốc)</option>
                                        <option value="tomorrow_morning">Ngày mai - Buổi sáng (07:00 - 11:00)</option>
                                        <option value="tomorrow_afternoon">Ngày mai - Buổi chiều (13:00 - 18:00)
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- Vietnam Provinces & Geocoding -->
                            <div class="row g-2 mb-2">
                                <div class="form-group col-md-4">
                                    <label for="province" class="form-label small fw-bold">Tỉnh/Thành phố <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-sm" id="province" required>
                                        <option value="">Chọn Tỉnh/Thành</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="district" class="form-label small fw-bold">Quận/Huyện <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-sm" id="district" required disabled>
                                        <option value="">Chọn Quận/Huyện</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ward" class="form-label small fw-bold">Phường/Xã <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-sm" id="ward" required disabled>
                                        <option value="">Chọn Phường/Xã</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="cart_address_detail" class="form-label small fw-bold">Địa chỉ chi tiết (Số nhà, tên đường, khu vực...) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="cart_address_detail"
                                    placeholder="Ví dụ: 12 Bàu Cát 2" required>
                                <input type="hidden" id="cart_address" name="cart_address" required>
                            </div>

                            <!-- Map and Directions UI -->
                            <div id="osm-map-section" class="mb-3" style="display:none;">
                                <label class="form-label small fw-bold text-success"><i class="bi bi-map"></i> Bản đồ số giao hàng & Chỉ đường</label>
                                <div style="width: 100%; height: 200px; border-radius: 8px; overflow: hidden; border: 1px solid #ddd;">
                                    <iframe id="osm-map-iframe" width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                                <div class="mt-2 text-end">
                                    <a id="directions-link" href="#" target="_blank" class="btn btn-sm btn-outline-danger fw-bold"><i class="bi bi-cursor"></i> Chỉ đường từ cửa hàng gần nhất</a>
                                </div>
                            </div>

                            <h6 class="fw-bold border-bottom pb-2 text-danger mt-4"><i
                                    class="bi bi-credit-card-2-front-fill"></i> 3. Chọn phương thức thanh toán</h6>
                            <div class="form-group mb-2 py-1">
                                <div class="form-check form-check-inline me-4">
                                    <input class="form-check-input" type="radio" name="cart_payment" id="cart_pay_cod"
                                        value="cod" checked>
                                    <label class="form-check-label small" for="cart_pay_cod"><i
                                            class="bi bi-cash-stack text-success"></i> Tiền mặt khi nhận (COD)</label>
                                </div>
                                <div class="form-check form-check-inline me-4">
                                    <!-- MoMo payment option removed -->
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="cart_payment" id="cart_pay_atm"
                                        value="atm">
                                    <label class="form-check-label small" for="cart_pay_atm"><i
                                            class="bi bi-credit-card"></i>
                                        Chuyển khoản ATM nội địa</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-secondary shadow-sm" data-bs-dismiss="modal">Tiếp tục
                                mua</button>
                            <button type="submit" class="btn text-white px-4 shadow-sm"
                                style="background-color: #ce1126;"><i class="bi bi-bag-check"></i> Xác nhận gửi đơn
                                hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <section id="about" class="about section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Về chúng tôi<br></h2>
                <p><span>Tìm hiểu thêm</span> <span class="description-title">Về chúng tôi</span></p>
            </div>

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('client/assets/img/about.jpg') }}" class="img-fluid mb-4" alt="">
                        <div class="book-a-table">
                            <h3>Số điện thoại tư vấn:</h3>
                            <p class="setting-contact-phone">{{ $settings['contact_phone'] ?? '+1 5589 55488 55' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                        <div class="content ps-0 ps-lg-5">
                            <p class="fst-italic">Chào mừng bạn đến với Foodelicious – nơi kết hợp hoàn hảo giữa hương vị ẩm thực tinh tế và không gian ấm cúng.</p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Nguyên liệu tươi sạch 100% – Tuyển chọn nghiêm ngặt từ các trang trại hữu cơ mỗi ngày.</span></li>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Đầu bếp chuyên nghiệp – Đội ngũ nghệ nhân ẩm thực giàu kinh nghiệm, gửi gắm tâm huyết vào từng món ăn.</span></li>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Đặt món dễ dàng, giao hàng nhanh chóng – Giải pháp hoàn hảo cho những bữa tiệc gia đình ấm cúng hay buổi hẹn hò xem phim tại gia đầy lãng mạn.</span></li>
                            </ul>
                            <p>Dù bạn đang bận rộn với công việc tại văn phòng, muốn quây quần bên người thân, hay đơn giản là tự thưởng cho mình một bữa tối lười biếng, chúng tôi luôn sẵn sàng phục vụ. Không cần đi xa, chỉ cần một cú click, món ngon đã sẵn sàng trên bàn ăn của bạn!</p>
                            <div class="position-relative mt-4">
                                <img src="{{ asset('client/assets/img/about-2.jpg') }}" class="img-fluid" alt="">
                                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                    class="glightbox pulsating-play-btn"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="why-us" class="why-us section light-background">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="why-box">
                            <h3>Tại sao lại chọn Foodelicious?</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit Asperiores
                                dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad
                                corporis.</p>
                            <div class="text-center">
                                <a href="#" class="more-btn"><span>Learn More</span> <i
                                        class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="col-xl-4">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-gem"></i>
                                    <h4>Chất lượng cao</h4>
                                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut
                                        aliquip</p>
                                </div>
                            </div>
                            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-heart"></i>
                                    <h4>An toàn</h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt</p>
                                </div>
                            </div>
                            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-inboxes"></i>
                                    <h4>Giao hàng tận nơi</h4>
                                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="stats" class="stats section dark-background">
            <img src="{{ asset('client/assets/img/stats-bg.jpg') }}" alt="" data-aos="fade-in">
            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Clients</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Hours Of Support</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Workers</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="menu" class="menu section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Thực đơn</h2>
                <p><span>Thực đơn</span> <span class="description-title">của chúng tôi</span></p>
            </div>
            <div class="row mb-4 d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="search-box">
                        <form action="" method="GET" class="d-flex gap-2">
                            <input type="text" name="search" class="form-control" value="{{ $query ?? '' }}" placeholder="Tìm kiếm món ăn...">
                            <button type="submit" class="btn"><i class="bi bi-search"></i> Tìm</button>
                            @if($query)
                                <a href="{{ route('trangchu_dangnhap') }}" class="btn btn-secondary d-flex align-items-center justify-content-center" style="border-radius: 5px; color: #fff; background-color: #6c757d; padding: 10px 15px; border: none; text-decoration: none;"><i class="bi bi-x-lg"></i></a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="container">
                @if($categories->isEmpty() || $categories->pluck('dishes')->flatten()->isEmpty())
                    <div class="text-center py-5">
                        <p class="text-muted fs-4">Không tìm thấy món ăn nào phù hợp với từ khóa "{{ $query }}".</p>
                        <a href="{{ route('trangchu_dangnhap') }}" class="btn text-white px-4 py-2 mt-3" style="background-color: #ce1126; border-radius: 5px; text-decoration: none;">Quay lại thực đơn</a>
                    </div>
                @else
                    @php $firstActive = true; @endphp
                    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        @foreach($categories as $category)
                            @if($category->dishes->isNotEmpty())
                                <li class="nav-item">
                                    <a class="nav-link {{ $firstActive ? 'active show' : '' }}" data-bs-toggle="tab" data-bs-target="#menu-{{ $category->id }}">
                                        <h4>{{ $category->category_name }}</h4>
                                    </a>
                                </li>
                                @php $firstActive = false; @endphp
                            @endif
                        @endforeach
                    </ul>

                    @php $firstActive = true; @endphp
                    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                        @foreach($categories as $category)
                            @if($category->dishes->isNotEmpty())
                                <div class="tab-pane fade {{ $firstActive ? 'active show' : '' }}" id="menu-{{ $category->id }}">
                                    <div class="tab-header text-center">
                                        <p>Thực đơn</p>
                                        <h3>{{ $category->category_name }}</h3>
                                    </div>

                                    <div class="row gy-5">
                                        @foreach($category->dishes as $dish)
                                            <div class="col-lg-4 menu-item" data-bs-toggle="modal" data-bs-target="#quickBuyModal"
                                                data-product-id="{{ $dish->id }}" data-product-name="{{ $dish->dish_name }}" data-product-price="{{ $dish->price }}">
                                                <a href="javascript:void(0)">
                                                    <img src="{{ $dish->image_url ? (Str::startsWith($dish->image_url, 'http') ? $dish->image_url : asset($dish->image_url)) : asset('client/assets/img/menu/menu-item-1.png') }}"
                                                        class="menu-img img-fluid" alt="{{ $dish->dish_name }}">
                                                </a>
                                                <h4>{{ $dish->dish_name }}</h4>
                                                <p class="ingredients">{{ $dish->description }}</p>
                                                <p class="price">{{ number_format($dish->price, 0, ',', '.') }} đ</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @php $firstActive = false; @endphp
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
        <!-- Events Section -->
        <section id="events" class="events section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Chương trình gói dịch vụ</h2>
                <p><span>Đăng ký nhận món theo chu kỳ</span> <span class="description-title">Tiết kiệm & Tiện lợi</span>
                </p>
            </div>

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                            {
                              "loop": true,
                              "speed": 600,
                              "autoplay": {
                                "delay": 5000
                              },
                              "slidesPerView": "auto",
                              "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                              },
                              "breakpoints": {
                                "320": {
                                  "slidesPerView": 1,
                                  "spaceBetween": 40
                                },
                                "1200": {
                                  "slidesPerView": 3,
                                  "spaceBetween": 20
                                }
                              }
                            }
                            </script>
                    <div class="swiper-wrapper">
                        <!-- Gói 1 -->
                        <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                            style="background-image: url({{ asset('client/assets/img/events-1.jpg') }});"
                            data-package-select="family">
                            <h3>Gói Gia Đình Hàng Ngày</h3>
                            <div class="price align-self-start">1.500.000 đ / tháng</div>
                            <p class="description">Thực đơn xoay vòng phong phú hàng ngày gồm Phở Bò, Bánh Mì, Cơm Tấm
                                chuẩn vị.
                            </p>
                        </div>
                        <!-- Gói 2 -->
                        <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                            style="background-image: url({{ asset('client/assets/img/events-2.jpg') }});"
                            data-package-select="company">
                            <h3>Gói Văn Phòng / Công Ty</h3>
                            <div class="price align-self-start">420.000 đ / tuần</div>
                            <p class="description">Giải pháp ăn trưa công sở tiện lợi, giao tận nơi đúng giờ với các món
                                ăn dinh
                                dưỡng.</p>
                        </div>
                        <!-- Gói 3 -->
                        <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                            style="background-image: url({{ asset('client/assets/img/events-3.jpg') }});"
                            data-package-select="dinner">
                            <h3>Gói Ăn Chiều Tối Dinh Dưỡng</h3>
                            <div class="price align-self-start">600.000 đ / 10 ngày</div>
                            <p class="description">Thực đơn nhẹ nhàng, dễ tiêu hóa cho buổi tối ấm cúng sau giờ làm việc
                                căng
                                thẳng.</p>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <section id="contact" class="contact section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Liên hệ</h2>
                <p><span>Bạn có thắc mắc?</span> <span class="description-title">Hãy liên hệ chúng tôi</span></p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                @php
                    $mapUrl = $settings['map_embed_url'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1415053648486!2d106.6917926!3d10.8004543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528c2576b92dd%3A0x6e9ca9bc8926958b!2zMTIzIEzDqiBI4buTbmcgUGjDuW5nLCBRdeG6rW4gMywgVFAuSENN!5e0!3m2!1svi!2s!4v1539943755621';
                    $mapSrc = $mapUrl;
                    if (preg_match('/src="([^"]+)"/', $mapUrl, $match)) {
                        $mapSrc = $match[1];
                    } elseif ($mapUrl && !str_contains($mapUrl, 'output=embed')) {
                        $mapSrc = "https://maps.google.com/maps?q=" . urlencode($mapUrl) . "&output=embed";
                    }
                @endphp
                <div class="mb-5">
                    <iframe style="width: 100%; height: 400px;"
                        src="{{ $mapSrc }}"
                        frameborder="0" allowfullscreen="" class="setting-map-iframe"></iframe>
                </div>

                <div class="row gy-4 mb-4">
                    <div class="col-md-4">
                        <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200" style="height: 100%;">
                            <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Địa chỉ</h3>
                                <p class="setting-contact-address">{{ $settings['contact_address'] ?? 'Tầng 12, Tòa nhà Saigon Innovation Tower, 154 Nguyễn Thị Minh Khai, Phường Võ Thị Sáu, Quận 3, TP. Hồ Chí Minh.' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300" style="height: 100%;">
                            <i class="icon bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Điện thoại</h3>
                                <p class="setting-contact-phone">{{ $settings['contact_phone'] ?? '+1 5589 55488 55' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400" style="height: 100%;">
                            <i class="icon bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email</h3>
                                <p class="setting-contact-email">{{ $settings['contact_email'] ?? 'contact@example.com' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                    data-aos-delay="600">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Tên của bạn" required="">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Email của bạn"
                                required="">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Nội dung"
                                required=""></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="loading">Đang tải</div>
                            <button type="submit">Gửi phiếu</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>


    <footer id="footer" class="footer dark-background">
        <div class="container copyright text-center mt-4">
            <p>© <span>2026</span> <strong class="px-1">FOODELICIOUS</strong>. Tất cả quyền được bảo lưu.</p>
        </div>
    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <script src="{{ asset('client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('client/assets/js/main.js') }}"></script>

    <script>
        // Phân hệ giỏ hàng dùng localStorage
        const isLoggedIn = true;

        function getCart() {
            const cart = localStorage.getItem('fdl_cart');
            return cart ? JSON.parse(cart) : [];
        }

        function saveCart(cart) {
            localStorage.setItem('fdl_cart', JSON.stringify(cart));
            updateCartCount();
        }

        function updateCartCount() {
            const cart = getCart();
            const count = cart.reduce((total, item) => total + item.quantity, 0);
            const cartBadges = document.querySelectorAll('.btn-cart .badge-count');
            cartBadges.forEach(badge => {
                badge.innerText = count;
                badge.style.display = count > 0 ? 'inline-block' : 'none';
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            // Thêm badge đếm số lượng giỏ hàng vào icon giỏ hàng
            const cartBtns = document.querySelectorAll('.btn-cart');
            cartBtns.forEach(btn => {
                if (!btn.querySelector('.badge-count')) {
                    btn.style.position = 'relative';
                    const badge = document.createElement('span');
                    badge.className = 'badge-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger';
                    badge.style.fontSize = '0.65rem';
                    badge.style.padding = '0.25em 0.5em';
                    badge.style.display = 'none';
                    btn.appendChild(badge);
                }
            });
            updateCartCount();

            // --- Vietnam Provinces API & Geocoding / Maps ---
            let provinceData = [];
            const provinceSelect = document.getElementById('province');
            const districtSelect = document.getElementById('district');
            const wardSelect = document.getElementById('ward');
            const addressDetailInput = document.getElementById('cart_address_detail');
            const hiddenAddressInput = document.getElementById('cart_address');
            
            const mapSection = document.getElementById('osm-map-section');
            const mapIframe = document.getElementById('osm-map-iframe');
            const directionsLink = document.getElementById('directions-link');

            const provinceContainer = provinceSelect ? provinceSelect.closest('.form-group') : null;
            const districtContainer = districtSelect ? districtSelect.closest('.form-group') : null;
            const wardContainer = wardSelect ? wardSelect.closest('.form-group') : null;

            if (provinceSelect) {
                // Load Provinces v2 (sau sáp nhập)
                fetch('https://provinces.open-api.vn/api/v2/?depth=2')
                    .then(response => response.json())
                    .then(data => {
                        provinceData = data;
                        provinceSelect.innerHTML = '<option value="">Chọn Tỉnh/Thành</option>';
                        data.forEach(p => {
                            provinceSelect.innerHTML += `<option value="${p.code}">${p.name}</option>`;
                        });

                        // Kiểm tra nếu dữ liệu là dạng 2 cấp (không có districts nhưng có wards)
                        const isTwoLevel = data.length > 0 && !data[0].districts && data[0].wards;
                        if (isTwoLevel) {
                            if (districtContainer) {
                                districtContainer.classList.add('d-none');
                            }
                            if (districtSelect) {
                                districtSelect.required = false;
                                districtSelect.disabled = true;
                            }
                            if (provinceContainer) {
                                provinceContainer.className = 'form-group col-md-6';
                            }
                            if (wardContainer) {
                                wardContainer.className = 'form-group col-md-6';
                            }
                        }
                    })
                    .catch(err => console.error('Failed to load Vietnam provinces:', err));

                provinceSelect.addEventListener('change', function () {
                    const code = this.value;
                    if (districtSelect) districtSelect.innerHTML = '<option value="">Chọn Quận/Huyện</option>';
                    wardSelect.innerHTML = '<option value="">Chọn Phường/Xã</option>';
                    if (districtSelect) districtSelect.disabled = true;
                    wardSelect.disabled = true;

                    if (code) {
                        const province = provinceData.find(p => p.code == code);
                        if (province) {
                            if (province.districts) {
                                // Hỗ trợ 3 cấp (tương thích ngược)
                                province.districts.forEach(d => {
                                    districtSelect.innerHTML += `<option value="${d.code}">${d.name}</option>`;
                                });
                                districtSelect.disabled = false;
                            } else if (province.wards) {
                                // Hỗ trợ 2 cấp sau sáp nhập
                                province.wards.forEach(w => {
                                    wardSelect.innerHTML += `<option value="${w.code}">${w.name}</option>`;
                                });
                                wardSelect.disabled = false;
                            }
                        }
                    }
                    updateFullAddress();
                });

                if (districtSelect) {
                    districtSelect.addEventListener('change', function () {
                        const code = this.value;
                        wardSelect.innerHTML = '<option value="">Chọn Phường/Xã</option>';
                        wardSelect.disabled = true;

                        if (code) {
                            const provinceCode = provinceSelect.value;
                            const province = provinceData.find(p => p.code == provinceCode);
                            const district = province.districts.find(d => d.code == code);
                            if (district && district.wards) {
                                district.wards.forEach(w => {
                                    wardSelect.innerHTML += `<option value="${w.code}">${w.name}</option>`;
                                });
                                wardSelect.disabled = false;
                            }
                        }
                        updateFullAddress();
                    });
                }

                wardSelect.addEventListener('change', updateFullAddress);
                addressDetailInput.addEventListener('input', updateFullAddress);
            }

            function updateFullAddress() {
                const provName = provinceSelect.options[provinceSelect.selectedIndex]?.text || '';
                const distName = districtSelect && districtContainer && !districtContainer.classList.contains('d-none')
                    ? (districtSelect.options[districtSelect.selectedIndex]?.text || '')
                    : '';
                const wardName = wardSelect.options[wardSelect.selectedIndex]?.text || '';
                const detail = addressDetailInput.value.trim();

                const isDistrictHidden = !districtSelect || !districtContainer || districtContainer.classList.contains('d-none');
                
                const isFormValid = provinceSelect.value && 
                                    (isDistrictHidden || districtSelect.value) && 
                                    wardSelect.value && 
                                    detail;

                if (isFormValid) {
                    const addressParts = [detail, wardName];
                    if (distName) {
                        addressParts.push(distName);
                    }
                    addressParts.push(provName);
                    
                    const fullAddress = addressParts.join(', ');
                    hiddenAddressInput.value = fullAddress;
                    geocodeAddress(fullAddress);
                } else {
                    hiddenAddressInput.value = '';
                    mapSection.style.display = 'none';
                }
            }

            let geocodeTimeout;
            function geocodeAddress(address) {
                clearTimeout(geocodeTimeout);
                geocodeTimeout = setTimeout(() => {
                    const url = `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(address)}&format=json&limit=1`;
                    fetch(url, { headers: { 'User-Agent': 'FOODELICIOUS-App' } })
                        .then(res => res.json())
                        .then(results => {
                            if (results && results.length > 0) {
                                const lat = results[0].lat;
                                const lon = results[0].lon;
                                
                                mapIframe.src = `https://maps.google.com/maps?q=${lat},${lon}&t=&z=16&ie=UTF8&iwloc=&output=embed`;
                                mapSection.style.display = 'block';

                                const storeAddress = "{{ $settings['contact_address'] ?? 'Tầng 12, Tòa nhà Saigon Innovation Tower, 154 Nguyễn Thị Minh Khai, Phường Võ Thị Sáu, Quận 3, TP. Hồ Chí Minh.' }}";
                                directionsLink.href = `https://www.google.com/maps/dir/?api=1&origin=${lat},${lon}&destination=${encodeURIComponent(storeAddress)}`;
                            } else {
                                mapSection.style.display = 'none';
                            }
                        })
                        .catch(err => console.error('Geocoding error:', err));
                }, 800);
            }


            // 1. Xử lý nạp dữ liệu cho Modal Đặt Mua Nhanh Món Đơn
            const menuItems = document.querySelectorAll(".menu-item");
            menuItems.forEach(item => {
                item.addEventListener("click", function () {
                    const productId = this.getAttribute("data-product-id");
                    const productName = this.getAttribute("data-product-name") || "Món ăn";
                    const productPrice = this.getAttribute("data-product-price") || "0";
                    
                    document.getElementById("modal-product-id").value = productId;
                    document.getElementById("modal-product-name").innerText = productName;
                    document.getElementById("modal-product-price").innerText = new Intl.NumberFormat('vi-VN').format(productPrice) + " đ";
                    document.getElementById("quantity").value = 1;
                    document.getElementById("order_notes").value = "";
                });
            });

            // Form submission trong Quick Buy Modal
            const quickBuyForm = document.getElementById("quickBuyModalForm");
            if (quickBuyForm) {
                quickBuyForm.addEventListener("submit", function (e) {
                    e.preventDefault();
                    const productId = document.getElementById("modal-product-id").value;
                    const productName = document.getElementById("modal-product-name").innerText;
                    const productPrice = parseFloat(document.getElementById("modal-product-price").innerText.replace(/[^0-9]/g, ''));
                    const quantity = parseInt(document.getElementById("quantity").value) || 1;
                    const notes = document.getElementById("order_notes").value;

                    let cart = getCart();
                    const existingIndex = cart.findIndex(item => item.id == productId);
                    if (existingIndex > -1) {
                        cart[existingIndex].quantity += quantity;
                        if (notes) {
                            cart[existingIndex].notes = cart[existingIndex].notes ? (cart[existingIndex].notes + "; " + notes) : notes;
                        }
                    } else {
                        cart.push({
                            id: productId,
                            name: productName,
                            price: productPrice,
                            quantity: quantity,
                            notes: notes
                        });
                    }

                    saveCart(cart);

                    const modalEl = document.getElementById('quickBuyModal');
                    const modal = bootstrap.Modal.getInstance(modalEl);
                    if (modal) {
                        modal.hide();
                    }
                    alert("Đã thêm món ăn vào giỏ hàng thành công!");
                });
            }

            // Khi mở Modal giỏ hàng, hiển thị danh sách sản phẩm
            const cartModalEl = document.getElementById('cartModal');
            if (cartModalEl) {
                cartModalEl.addEventListener('show.bs.modal', function () {
                    renderCartItems();
                });
            }

            // Gửi biểu mẫu đặt hàng
            const cartForm = document.getElementById('cartForm');
            if (cartForm) {
                cartForm.addEventListener('submit', function (e) {
                    const cart = getCart();
                    if (cart.length === 0) {
                        e.preventDefault();
                        alert("Giỏ hàng của bạn đang trống!");
                        return;
                    }

                    if (!isLoggedIn) {
                        e.preventDefault();
                        alert("Bạn cần đăng nhập để đặt hàng. Hệ thống sẽ chuyển hướng bạn đến trang đăng nhập.");
                        window.location.href = "{{ route('trangchu/dangnhap') }}";
                        return;
                    }

                    // Populate the hidden input with JSON cart items
                    document.getElementById('cartItemsInput').value = JSON.stringify(cart);
                    
                    // Xóa giỏ hàng khi submit thành công
                    setTimeout(() => {
                        localStorage.removeItem('fdl_cart');
                    }, 100);
                });
            }

            // 2. Xử lý Modal & Click - Gói dịch vụ
            const packageSelectElement = document.getElementById("package_type");
            const myModal = new bootstrap.Modal(document.getElementById('subscribePackageModal'));

            const eventItems = document.querySelectorAll(".events .event-item");
            eventItems.forEach(item => {
                item.addEventListener("click", function () {
                    const packageValue = this.getAttribute("data-package-select");
                    if (packageSelectElement && packageValue) {
                        packageSelectElement.value = packageValue;
                    }
                    myModal.show();
                });
                item.style.cursor = "pointer";
            });

            // --- Realtime Order Update Listener (Disabled in favor of Polling) ---
            /*
            const userId = "{{ Auth::id() }}";
            if (window.Echo && userId) {
                window.Echo.private(`App.Models.User.${userId}`)
                    .listen('OrderUpdated', (e) => {
                        console.log('Realtime User Order status updated:', e);
                        const statusLabels = {
                            'pending': 'Chờ xác nhận',
                            'confirmed': 'Đã xác nhận',
                            'preparing': 'Đang chuẩn bị',
                            'delivering': 'Đang giao hàng',
                            'completed': 'Đã giao hàng thành công',
                            'cancelled': 'Đã hủy'
                        };
                        const statusLabel = statusLabels[e.order.order_status] ?? e.order.order_status;
                        
                        alert(`🔔 [Cập nhật Đơn hàng FDL-${e.order.id}]: Trạng thái đơn của bạn hiện là: ${statusLabel}!`);
                        if (window.location.href.indexOf('giohang') > -1) {
                            window.location.reload();
                        }
                    });
            }
            */

            // --- Realtime Order Update Polling & Settings Polling ---
            const userId = "{{ Auth::id() }}";
            if (userId) {
                let lastCheckedTime = null;

                // Initialize Order Polling
                fetch("{{ route('api.orders.poll') }}")
                    .then(response => response.json())
                    .then(data => {
                        lastCheckedTime = data.timestamp;
                        console.log('Shop Logged Order Polling initialized at:', lastCheckedTime);
                        setInterval(pollOrderUpdates, 2000);
                    })
                    .catch(err => console.error('Error initializing shop logged order polling:', err));

                function pollOrderUpdates() {
                    if (!lastCheckedTime) return;

                    fetch(`{{ route('api.orders.poll') }}?since=${encodeURIComponent(lastCheckedTime)}`)
                        .then(response => response.json())
                        .then(data => {
                            lastCheckedTime = data.timestamp;
                            if (data.updates && data.updates.length > 0) {
                                data.updates.forEach(e => {
                                    console.log('Polling User Order status updated:', e);
                                    const statusLabels = {
                                        'pending': 'Chờ xác nhận',
                                        'confirmed': 'Đã xác nhận',
                                        'preparing': 'Đang chuẩn bị',
                                        'delivering': 'Đang giao hàng',
                                        'completed': 'Đã giao hàng thành công',
                                        'cancelled': 'Đã hủy'
                                    };
                                    const statusLabel = statusLabels[e.order.order_status] ?? e.order.order_status;
                                    
                                    alert(`🔔 [Cập nhật Đơn hàng FDL-${e.order.id}]: Trạng thái đơn của bạn hiện là: ${statusLabel}!`);
                                    if (window.location.href.indexOf('giohang') > -1) {
                                        window.location.reload();
                                    }
                                });
                            }
                        })
                        .catch(err => console.error('Error during shop logged order polling:', err));
                }

                // Initialize Settings Polling
                let currentFingerprint = null;
                let currentTimestamps = null;
                
                function pollSettings() {
                    fetch("{{ route('api.settings.poll') }}")
                        .then(response => response.json())
                        .then(data => {
                            if (!currentFingerprint) {
                                currentFingerprint = data.fingerprint;
                                currentTimestamps = data.timestamps;
                                console.log('Shop Logged Settings polling initialized with fingerprint:', currentFingerprint);
                                return;
                            }
                            
                            if (data.fingerprint !== currentFingerprint) {
                                console.log('Data change detected! Fingerprint:', data.fingerprint);
                                
                                // Check if structural tables changed (Dishes, Categories, Coupons, ServicePackages)
                                let structuralChanged = false;
                                if (currentTimestamps) {
                                    for (let key in data.timestamps) {
                                        if (data.timestamps[key] !== currentTimestamps[key]) {
                                            structuralChanged = true;
                                            break;
                                        }
                                    }
                                }
                                
                                if (structuralChanged) {
                                    console.log('Structural data change detected. Reloading page...');
                                    window.location.reload();
                                    return;
                                }
                                
                                // Otherwise, update settings in-place:
                                currentFingerprint = data.fingerprint;
                                currentTimestamps = data.timestamps;
                                const s = data.settings;
                                
                                // 1. Logo
                                if (s.logo_url) {
                                    document.querySelectorAll('.setting-logo-img').forEach(img => {
                                        if (img.src !== s.logo_url) img.src = s.logo_url;
                                    });
                                }
                                
                                // 2. Contact Phone
                                if (s.contact_phone) {
                                    document.querySelectorAll('.setting-contact-phone').forEach(el => {
                                        if (el.innerText !== s.contact_phone) el.innerText = s.contact_phone;
                                    });
                                }
                                
                                // 3. Contact Address
                                if (s.contact_address) {
                                    document.querySelectorAll('.setting-contact-address').forEach(el => {
                                        if (el.innerText !== s.contact_address) el.innerText = s.contact_address;
                                    });
                                    // Update the inline variable
                                    storeAddress = s.contact_address;
                                }
                                
                                // 4. Contact Email
                                if (s.contact_email) {
                                    document.querySelectorAll('.setting-contact-email').forEach(el => {
                                        if (el.innerText !== s.contact_email) el.innerText = s.contact_email;
                                    });
                                }
                                
                                // 5. Map
                                if (s.map_embed_url) {
                                    const mapIframe = document.querySelector('.setting-map-iframe');
                                    if (mapIframe) {
                                        let newSrc = s.map_embed_url;
                                        const match = s.map_embed_url.match(/src="([^"]+)"/);
                                        if (match) {
                                            newSrc = match[1];
                                        } else if (s.map_embed_url && !s.map_embed_url.includes('output=embed')) {
                                            newSrc = "https://maps.google.com/maps?q=" + encodeURIComponent(s.map_embed_url) + "&output=embed";
                                        }
                                        if (mapIframe.src !== newSrc) {
                                            mapIframe.src = newSrc;
                                        }
                                    }
                                }
                            }
                        })
                        .catch(err => console.error('Error during settings polling:', err));
                }
                
                setInterval(pollSettings, 2000);
            }
        });

        let appliedCouponCode = null;
        let discountValue = 0;

        function applyCoupon() {
            const codeInput = document.getElementById('coupon_code');
            if (!codeInput) return;
            const code = codeInput.value.trim().toUpperCase();
            if (!code) {
                alert('Vui lòng nhập mã giảm giá!');
                return;
            }

            const cart = getCart();
            let total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            if (total === 0) {
                alert('Giỏ hàng của bạn đang trống.');
                return;
            }

            fetch("{{ route('api.coupon.validate') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ code: code, total_amount: total })
            })
            .then(res => res.json())
            .then(data => {
                const msgEl = document.getElementById('coupon-message');
                if (!msgEl) return;
                msgEl.classList.remove('d-none', 'text-success', 'text-danger');
                if (data.success) {
                    appliedCouponCode = code;
                    discountValue = data.discount_amount;
                    msgEl.classList.add('text-success');
                    msgEl.innerText = data.message;
                    renderCartItems();
                } else {
                    appliedCouponCode = null;
                    discountValue = 0;
                    msgEl.classList.add('text-danger');
                    msgEl.innerText = data.message;
                    renderCartItems();
                }
            })
            .catch(err => {
                console.error(err);
                alert('Có lỗi xảy ra khi áp dụng mã giảm giá.');
            });
        }

        function revalidateCoupon() {
            if (!appliedCouponCode) return;
            const cart = getCart();
            let total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

            fetch("{{ route('api.coupon.validate') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ code: appliedCouponCode, total_amount: total })
            })
            .then(res => res.json())
            .then(data => {
                const msgEl = document.getElementById('coupon-message');
                if (data.success) {
                    discountValue = data.discount_amount;
                } else {
                    appliedCouponCode = null;
                    discountValue = 0;
                    if (msgEl) {
                        msgEl.classList.remove('d-none', 'text-success');
                        msgEl.classList.add('text-danger');
                        msgEl.innerText = data.message + ' (Đã hủy áp dụng mã)';
                    }
                    const inputEl = document.getElementById('coupon_code');
                    if (inputEl) inputEl.value = '';
                }
                renderCartItems();
            })
            .catch(err => console.error(err));
        }

        function renderCartItems() {
            const container = document.getElementById('cart-items-container');
            if (!container) return;

            const cart = getCart();
            if (cart.length === 0) {
                container.innerHTML = `<div class="p-3 text-center text-muted">Giỏ hàng trống. Hãy chọn món ăn ngon từ thực đơn!</div>`;
                document.getElementById('cart-total-price').innerText = "0 đ";
                document.getElementById('cart-subtotal-price').innerText = "0 đ";
                const discountRow = document.getElementById('cart-discount-row');
                if (discountRow) discountRow.classList.add('d-none');
                appliedCouponCode = null;
                discountValue = 0;
                return;
            }

            let html = '';
            let total = 0;

            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;

                html += `
                <div class="cart-item-row d-flex justify-content-between align-items-center py-2 px-2 border-bottom text-dark">
                    <div style="flex: 1;">
                        <div class="fw-bold">${item.name}</div>
                        <small class="text-muted">${item.notes ? 'Ghi chú: ' + item.notes : ''}</small>
                        <div class="small text-secondary">${new Intl.NumberFormat('vi-VN').format(item.price)} đ x ${item.quantity}</div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary py-0 px-2" onclick="changeQty(${index}, -1)">-</button>
                        <span class="fw-bold px-1">${item.quantity}</span>
                        <button type="button" class="btn btn-sm btn-outline-secondary py-0 px-2" onclick="changeQty(${index}, 1)">+</button>
                        <button type="button" class="btn btn-sm btn-danger ms-2 py-0 px-2" onclick="removeCartItem(${index})"><i class="bi bi-trash"></i></button>
                    </div>
                    <div class="text-end fw-bold text-danger ms-3" style="min-width: 70px;">
                        ${new Intl.NumberFormat('vi-VN').format(itemTotal)} đ
                    </div>
                </div>
                `;
            });

            container.innerHTML = html;
            
            const subtotalEl = document.getElementById('cart-subtotal-price');
            if (subtotalEl) {
                subtotalEl.innerText = new Intl.NumberFormat('vi-VN').format(total) + " đ";
            }
            
            const discountRow = document.getElementById('cart-discount-row');
            const discountEl = document.getElementById('cart-discount-price');
            
            if (appliedCouponCode && discountValue > 0) {
                if (discountRow) discountRow.classList.remove('d-none');
                if (discountEl) discountEl.innerText = "-" + new Intl.NumberFormat('vi-VN').format(discountValue) + " đ";
            } else {
                if (discountRow) discountRow.classList.add('d-none');
            }

            const finalTotal = Math.max(0, total - discountValue);
            document.getElementById('cart-total-price').innerText = new Intl.NumberFormat('vi-VN').format(finalTotal) + " đ";
        }

        function changeQty(index, delta) {
            let cart = getCart();
            if (cart[index]) {
                cart[index].quantity += delta;
                if (cart[index].quantity <= 0) {
                    cart.splice(index, 1);
                }
                saveCart(cart);
                if (appliedCouponCode) {
                    revalidateCoupon();
                } else {
                    renderCartItems();
                }
            }
        }

        function removeCartItem(index) {
            let cart = getCart();
            if (cart[index]) {
                cart.splice(index, 1);
                saveCart(cart);
                if (appliedCouponCode) {
                    revalidateCoupon();
                } else {
                    renderCartItems();
                }
            }
        }
    </script>
    @include('client.chatbot')
</body>
</html>