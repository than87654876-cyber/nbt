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

        .menu-item {
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .menu-item:hover {
            transform: scale(1.02);
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
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ asset('logo.jpg') }}" alt="">
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
                        <span class="fw-bold text-dark d-none d-md-inline">Dương Bá Tùng</span>
                        <i class="bi bi-chevron-down small text-muted"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="userMenu">
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
                            <a class="dropdown-item py-2 text-danger" href="{{ route('trangchu') }}">
                                <i class="bi bi-box-arrow-right me-2"></i>Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
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

                <form action="#" method="POST">
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
                            <label class="form-label fw-bold d-block">Phương thức thanh toán trả trước gói dịch
                                vụ</label>
                            <div class="form-check form-check-inline me-4">
                                <input class="form-check-input" type="radio" name="sub_payment_method" id="sub_pay_momo"
                                    value="momo" checked>
                                <label class="form-check-label" for="sub_pay_momo"><i
                                        class="bi bi-wallet2 text-primary me-1"></i> Tiền mặt (COD)</label>
                            </div>
                            <div class="form-check form-check-inline me-4">
                                <input class="form-check-input" type="radio" name="sub_payment_method" id="sub_pay_momo"
                                    value="momo" checked>
                                <label class="form-check-label" for="sub_pay_momo"><i
                                        class="bi bi-wallet2 text-primary me-1"></i> Chuyển khoản</label>
                            </div>
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
                            <h4 class="fw-bold text-dark mb-1">Dương Bá Tùng</h4>
                            <span class="badge badge-diamond px-3 py-2 fw-bold"><i class="bi bi-crown-fill me-1"></i>Hội
                                viên
                                Kim Cương</span>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="text-muted py-2" style="width: 40%;">Số điện thoại:</td>
                                        <td class="fw-bold py-2">0901234567</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted py-2">Địa chỉ Email:</td>
                                        <td class="fw-bold py-2">tung.db@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted py-2">Địa chỉ:</td>
                                        <td class="fw-bold py-2">123 Đường ABC, Quận XYZ, TP. HCM</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted py-2">Ngày đăng ký:</td>
                                        <td class="fw-bold py-2 text-secondary">24/09/2025</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted py-2">Điểm tích lũy:</td>
                                        <td class="fw-bold py-2 text-success">2.450 Điểm</td>
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
                    <form action="#" method="POST">
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
                    <form action="#" method="POST">
                        <div class="modal-body text-start" style="font-family: 'Roboto', sans-serif;">
                            <h6 class="fw-bold border-bottom pb-2 text-danger"><i class="bi bi-list-stars"></i> 1. Danh
                                sách món
                                ăn trong giỏ</h6>
                            <div class="p-2 mb-3 bg-light rounded">
                                <div class="d-flex justify-content-between small py-1 px-2 border-bottom">
                                    <span>Magnam Tiste (Món ăn đơn) x1</span>
                                    <span class="fw-bold text-danger">$5.95</span>
                                </div>
                                <div class="d-flex justify-content-between small pt-2 px-2">
                                    <span class="fw-bold">Tổng tiền hàng tạm tính:</span>
                                    <span class="fw-bold text-danger fs-5">$5.95</span>
                                </div>
                            </div>

                            <h6 class="fw-bold border-bottom pb-2 text-danger mt-4"><i class="bi bi-geo-alt-fill"></i>
                                2. Thông
                                tin giao nhận hàng</h6>
                            <div class="row">
                                <div class="form-group col-md-4 mb-3">
                                    <label for="cart_phone" class="form-label small fw-bold">Số điện thoại <span
                                            class="text-danger">*</span></label>
                                    <input type="tel" class="form-control form-control-sm" id="cart_phone"
                                        value="0901234567" required>
                                </div>
                                <div class="form-group col-md-8 mb-3">
                                    <label for="cart_time" class="form-label small fw-bold">Thời gian nhận hàng <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select form-select-sm" id="cart_time" required>
                                        <option value="now" selected>Ngay bây giờ (Giao hàng hỏa tốc)</option>
                                        <option value="tomorrow_morning">Ngày mai - Buổi sáng (07:00 - 11:00)</option>
                                        <option value="tomorrow_afternoon">Ngày mai - Buổi chiều (13:00 - 18:00)
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="cart_address" class="form-label small fw-bold">Địa chỉ nhận hàng cụ thể
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="cart_address"
                                    value="Trường Cao đẳng Công nghệ Thông tin TP.HCM (ITC), Quận Tân Phú" required>
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
                                    <input class="form-check-input" type="radio" name="cart_payment" id="cart_pay_momo"
                                        value="momo">
                                    <label class="form-check-label small" for="cart_pay_momo"><i
                                            class="bi bi-wallet2 text-primary"></i> Ví điện tử MoMo</label>
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
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div>
                    <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                        <div class="content ps-0 ps-lg-5">
                            <p class="fst-italic">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</span></li>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Duis aute irure dolor in reprehenderit
                                        in voluptate velit.</span></li>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                        storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                            </ul>
                            <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident</p>
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
                        <form action="#" class="d-flex gap-2">
                            <input type="text" class="form-control" placeholder="Tìm kiếm món ăn...">
                            <button type="button" class="btn"><i class="bi bi-search"></i> Tìm</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container">
                <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                            <h4>Ăn sáng</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link show" data-bs-toggle="tab" data-bs-target="#menu-desserts">
                            <h4>Tráng miệng</h4>
                        </a>
                    </li>
                </ul>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                    <div class="tab-pane fade active show" id="menu-starters">
                        <div class="tab-header text-center">
                            <p>Thực đơn</p>
                            <h3>Ăn sáng</h3>
                        </div>

                        <div class="row gy-5">
                            <div class="col-lg-4 menu-item" data-bs-toggle="modal" data-bs-target="#quickBuyModal"
                                data-product-name="Magnam Tiste" data-product-price="5.95">
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('client/assets/img/menu/menu-item-1.png') }}"
                                        class="menu-img img-fluid" alt=""></a>
                                <h4>Magnam Tiste</h4>
                                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
                                <p class="price">$5.95</p>
                            </div>

                            <div class="col-lg-4 menu-item" data-bs-toggle="modal" data-bs-target="#quickBuyModal"
                                data-product-name="Aut Luia" data-product-price="14.95">
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('client/assets/img/menu/menu-item-2.png') }}"
                                        class="menu-img img-fluid" alt=""></a>
                                <h4>Aut Luia</h4>
                                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
                                <p class="price">$14.95</p>
                            </div>

                            <div class="col-lg-4 menu-item" data-bs-toggle="modal" data-bs-target="#quickBuyModal"
                                data-product-name="Est Eligendi" data-product-price="8.95">
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('client/assets/img/menu/menu-item-3.png') }}"
                                        class="menu-img img-fluid" alt=""></a>
                                <h4>Est Eligendi</h4>
                                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
                                <p class="price">$8.95</p>
                            </div>

                            <div class="col-lg-4 menu-item" data-bs-toggle="modal" data-bs-target="#quickBuyModal"
                                data-product-name="Eos Luibusdam" data-product-price="12.95">
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('client/assets/img/menu/menu-item-4.png') }}"
                                        class="menu-img img-fluid" alt=""></a>
                                <h4>Eos Luibusdam</h4>
                                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
                                <p class="price">$12.95</p>
                            </div>

                            <div class="col-lg-4 menu-item" data-bs-toggle="modal" data-bs-target="#quickBuyModal"
                                data-product-name="Eos Luibusdam II" data-product-price="12.95">
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('client/assets/img/menu/menu-item-5.png') }}"
                                        class="menu-img img-fluid" alt=""></a>
                                <h4>Eos Luibusdam II</h4>
                                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
                                <p class="price">$12.95</p>
                            </div>

                            <div class="col-lg-4 menu-item" data-bs-toggle="modal" data-bs-target="#quickBuyModal"
                                data-product-name="Laboriosam Direva" data-product-price="9.95">
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('client/assets/img/menu/menu-item-6.png') }}"
                                        class="menu-img img-fluid" alt=""></a>
                                <h4>Laboriosam Direva</h4>
                                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
                                <p class="price">$9.95</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                    <div class="tab-pane fade active show" id="menu-dessert">
                        <div class="tab-header text-center">
                            <p>Thực đơn</p>
                            <h3>Tráng miệng</h3>
                        </div>

                        <div class="row gy-5">
                            <div class="col-lg-4 menu-item" data-bs-toggle="modal" data-bs-target="#quickBuyModal"
                                data-product-name="Magnam Tiste" data-product-price="5.95">
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('client/assets/img/menu/menu-item-1.png') }}"
                                        class="menu-img img-fluid" alt=""></a>
                                <h4>Magnam Tiste</h4>
                                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
                                <p class="price">$5.95</p>
                            </div>

                            <div class="col-lg-4 menu-item" data-bs-toggle="modal" data-bs-target="#quickBuyModal"
                                data-product-name="Aut Luia" data-product-price="14.95">
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('client/assets/img/menu/menu-item-2.png') }}"
                                        class="menu-img img-fluid" alt=""></a>
                                <h4>Aut Luia</h4>
                                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
                                <p class="price">$14.95</p>
                            </div>

                            <div class="col-lg-4 menu-item" data-bs-toggle="modal" data-bs-target="#quickBuyModal"
                                data-product-name="Est Eligendi" data-product-price="8.95">
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('client/assets/img/menu/menu-item-3.png') }}"
                                        class="menu-img img-fluid" alt=""></a>
                                <h4>Est Eligendi</h4>
                                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
                                <p class="price">$8.95</p>
                            </div>

                            <div class="col-lg-4 menu-item" data-bs-toggle="modal" data-bs-target="#quickBuyModal"
                                data-product-name="Eos Luibusdam" data-product-price="12.95">
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('client/assets/img/menu/menu-item-4.png') }}"
                                        class="menu-img img-fluid" alt=""></a>
                                <h4>Eos Luibusdam</h4>
                                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
                                <p class="price">$12.95</p>
                            </div>

                            <div class="col-lg-4 menu-item" data-bs-toggle="modal" data-bs-target="#quickBuyModal"
                                data-product-name="Eos Luibusdam II" data-product-price="12.95">
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('client/assets/img/menu/menu-item-5.png') }}"
                                        class="menu-img img-fluid" alt=""></a>
                                <h4>Eos Luibusdam II</h4>
                                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
                                <p class="price">$12.95</p>
                            </div>

                            <div class="col-lg-4 menu-item" data-bs-toggle="modal" data-bs-target="#quickBuyModal"
                                data-product-name="Laboriosam Direva" data-product-price="9.95">
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('client/assets/img/menu/menu-item-6.png') }}"
                                        class="menu-img img-fluid" alt=""></a>
                                <h4>Laboriosam Direva</h4>
                                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
                                <p class="price">$9.95</p>
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="mb-5">
                    <iframe style="width: 100%; height: 400px;"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                        frameborder="0" allowfullscreen=""></iframe>
                </div>

                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                            <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Địa chỉ</h3>
                                <p>Tầng 12, Tòa nhà Saigon Innovation Tower, 154 Nguyễn Thị Minh Khai, Phường Võ Thị
                                    Sáu, Quận 3, TP. Hồ Chí Minh.</p>
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
        document.addEventListener("DOMContentLoaded", function () {
            // 1. Xử lý nạp dữ liệu cho Modal Đặt Mua Nhanh Món Đơn
            const menuItems = document.querySelectorAll(".menu-item");
            menuItems.forEach(item => {
                item.addEventListener("click", function () {
                    const productName = this.getAttribute("data-product-name") || "Món ăn";
                    const productPrice = this.getAttribute("data-product-price") || "0";
                    document.getElementById("modal-product-name").innerText = productName;
                    document.getElementById("modal-product-price").innerText = "$" + productPrice;
                });
            });

            // 2. Xử lý Modal & Swipe - Cho phép Swiper hoạt động, click riêng biệt sẽ mở modal
            const packageSelectElement = document.getElementById("package_type");
            const myModal = new bootstrap.Modal(document.getElementById('subscribePackageModal'));
            const swiperWrapper = document.querySelector(".events .swiper-wrapper");

            if (swiperWrapper) {
                const SWIPE_THRESHOLD = 30; // Ngưỡng swipe nhỏ hơn
                let startX = 0;
                let startY = 0;
                let isSwiping = false;
                let currentItem = null;

                swiperWrapper.addEventListener("pointerdown", (e) => {
                    if (!e.target.closest(".event-item")) return;
                    startX = e.clientX;
                    startY = e.clientY;
                    isSwiping = false;
                    currentItem = e.target.closest(".event-item");
                }, true);

                document.addEventListener("pointermove", (e) => {
                    if (!currentItem) return;
                    const moveX = Math.abs(e.clientX - startX);
                    const moveY = Math.abs(e.clientY - startY);

                    if (moveX > SWIPE_THRESHOLD || moveY > SWIPE_THRESHOLD) {
                        isSwiping = true;
                    }
                });

                document.addEventListener("pointerup", () => {
                    if (!currentItem || isSwiping) {
                        currentItem = null;
                        return;
                    }

                    // Chỉ mở modal nếu là click
                    const packageValue = currentItem.getAttribute("data-package-select");
                    if (packageSelectElement && packageValue) {
                        packageSelectElement.value = packageValue;
                    }
                    myModal.show();
                    currentItem = null;
                });
            }
        });
    </script>
</body>

</html>