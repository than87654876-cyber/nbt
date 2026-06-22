<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cấu hình Hệ thống - FOODELICIOUS</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('logo.jpg') }}" rel="icon">
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('quanly') }}">
                <div class="sidebar-brand-text mx-3 fs-1">FOODELICIOUS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('quanly') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Báo cáo doanh thu</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Dịch vụ
            </div>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('quanly_trangchu') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Cấu hình trang chủ</span>
                </a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Thực đơn</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý thực đơn</h6>
                        <a class="collapse-item" href="{{ route('quanly_danhmuc') }}">Danh sách món ăn</a>
                        <a class="collapse-item" href="{{ route('quanly_monandon') }}">Món ăn đơn</a>
                        <a class="collapse-item" href="{{ route('quanly_goidichvu') }}">Gói dịch vụ</a>
                        <a class="collapse-item" href="{{ route('quanly_khuyenmai') }}">Chương trình khuyến mãi</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Đơn hàng</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý đơn hàng</h6>
                        <a class="collapse-item" href="{{ route('quanly_donhang') }}">Đơn hàng</a>
                        <a class="collapse-item" href="{{ route('quanly_goidangky') }}">Gói dịch vụ</a>
                        <a class="collapse-item" href="{{ route('quanly_yeucauhoan') }}">Yêu cầu hoàn tiền</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tài khoản
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Khách hàng</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý khách hàng</h6>
                        <a class="collapse-item" href="{{ route('quanly_khachhang') }}">Danh sách</a>
                        <a class="collapse-item" href="{{ route('quanly_guima') }}">Gửi mã khuyến mãi</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('quanly_nhanvien') }}">
                    <i class="fas fa-fw fa-address-book"></i>
                    <span>Nhân viên</span></a>
            </li>

            <!-- Nav Item - Tables -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div class="modal fade" id="userProfileModal" tabindex="-1" role="dialog"
                aria-labelledby="userProfileModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 shadow">
                        <div class="modal-header text-white text-center d-block position-relative"
                            style="background-color: #ce1126; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title fw-bold" id="userProfileModalLabel"><i
                                    class="bi bi-person-circle me-2"></i>Hồ sơ
                                tài khoản</h5>
                        </div>
                        <div class="modal-body text-dark p-4">
                            <div class="text-center mb-4">
                                <div class="display-5 text-muted mb-2"><i class="bi bi-user-circle"></i></div>
                                <h4 class="fw-bold text-dark mb-1">Dương Chí Bá</h4>
                                <span class="badge badge-danger px-3 py-2 fw-bold"><i
                                        class="bi bi-crown-fill me-1"></i>Administrator</span>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-muted py-2">Chức vụ</td>
                                            <td class="fw-bold py-2">Quản lý tổng</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted py-2" style="width: 40%;">Số điện thoại:</td>
                                            <td class="fw-bold py-2">0901234567</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted py-2">Địa chỉ Email:</td>
                                            <td class="fw-bold py-2">tung.db@gmail.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer bg-light border-0">
                            <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Đóng cửa
                                sổ</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Dương Chí Bá</span>
                                <img class="img-profile rounded-circle" src="{{ asset('logo.jpg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userMenu">
                                <a class="dropdown-item py-2" href="#" data-toggle="modal"
                                    data-target="#userProfileModal">
                                    <i class="bi bi-person-badge me-2 text-primary"></i>Hồ sơ thông tin
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('dangnhap') }}" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Cấu hình thông tin giao diện & Doanh nghiệp</h1>
                    </div>

                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <!-- CỘT TRÁI: HÌNH ẢNH & THƯƠNG HIỆU -->
                            <div class="col-lg-4 mb-4">
                                <div class="card shadow mb-4 text-dark">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary"><i
                                                class="fas fa-image mr-1"></i>Hình ảnh & Logo</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <!-- Logo hiện tại -->
                                        <div class="form-group mb-4">
                                            <label class="font-weight-bold d-block mb-2">Logo hiển thị</label>
                                            <img src="{{ asset('logo.jpg') }}"
                                                class="img-thumbnail rounded-circle mb-3 shadow-sm"
                                                style="max-width: 120px; height: 120px; object-fit: cover;">
                                            <div class="custom-file text-left">
                                                <input type="file" class="custom-file-input" id="logoUpload"
                                                    name="logo">
                                                <label class="custom-file-label" for="logoUpload">Chọn ảnh logo
                                                    mới...</label>
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- Banner Hero hiện tại -->
                                        <div class="form-group mt-3 text-left">
                                            <label class="font-weight-bold d-block text-center mb-2">Hình ảnh Banner
                                                chính (Hero Section)</label>
                                            <img src="{{ asset('client/assets/img/hero-img.png') }}"
                                                class="img-fluid rounded mb-3 border bg-light p-2"
                                                style="max-height: 150px; width: 100%; object-fit: contain;">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="bannerUpload"
                                                    name="hero_banner">
                                                <label class="custom-file-label" for="bannerUpload">Thay đổi ảnh
                                                    banner...</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CỘT PHẢI: THÔNG TIN LIÊN HỆ, TIỂU SỬ & CHỈ SỐ DOANH SỐ -->
                            <div class="col-lg-8 mb-4">

                                <!-- PHÂN HỆ MỚI: BỔ SUNG TIỂU SỬ & CÁC CHỈ SỐ HIỂN THỊ -->
                                <div class="card shadow mb-4 text-dark border-left-primary">
                                    <div class="card-header py-3 bg-light">
                                        <h6 class="m-0 font-weight-bold text-primary"><i
                                                class="fas fa-chart-line mr-1"></i>Tiểu sử & Chỉ số doanh số hiển thị
                                            công khai</h6>
                                    </div>
                                    <div class="card-body">
                                        <!-- Tiểu sử doanh nghiệp (Hiển thị tại Section About Us) -->
                                        <div class="form-group mb-4">
                                            <label for="company_bio" class="font-weight-bold">Tiểu sử / Lời giới thiệu
                                                doanh nghiệp <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="company_bio" name="bio" rows="4"
                                                placeholder="Nhập lời giới thiệu tổng quan về nhà hàng..."
                                                required>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Hệ thống thực phẩm FOODELICIOUS cam kết mang đến những bữa ăn an toàn, nhanh chóng và giàu dinh dưỡng nhất cho quý khách hàng.</textarea>
                                        </div>

                                        <!-- Cấu hình các con số hiển thị (Section Stats - Counters) -->
                                        <label class="font-weight-bold small text-muted d-block mb-2">Cấu hình các số
                                            liệu thống kê (Hiển thị dạng bộ đếm ở trang chủ)</label>
                                        <div class="row">
                                            <!-- Số lượng khách hàng -->
                                            <div class="form-group col-md-3 col-6">
                                                <label for="stat_clients"
                                                    class="small font-weight-bold text-secondary">Số Khách hàng
                                                    (Clients)</label>
                                                <input type="number"
                                                    class="form-control form-control-sm font-weight-bold text-center"
                                                    id="stat_clients" name="stat_clients" value="232" min="0">
                                            </div>
                                            <!-- Số lượng dự án/đơn hàng lớn -->
                                            <div class="form-group col-md-3 col-6">
                                                <label for="stat_projects"
                                                    class="small font-weight-bold text-secondary">Số Dự án
                                                    (Projects)</label>
                                                <input type="number"
                                                    class="form-control form-control-sm font-weight-bold text-center"
                                                    id="stat_projects" name="stat_projects" value="521" min="0">
                                            </div>
                                            <!-- Tổng giờ hỗ trợ -->
                                            <div class="form-group col-md-3 col-6">
                                                <label for="stat_hours"
                                                    class="small font-weight-bold text-secondary">Giờ hỗ trợ
                                                    (Support)</label>
                                                <input type="number"
                                                    class="form-control form-control-sm font-weight-bold text-center"
                                                    id="stat_hours" name="stat_hours" value="1453" min="0">
                                            </div>
                                            <!-- Số nhân sự/đầu bếp -->
                                            <div class="form-group col-md-3 col-6">
                                                <label for="stat_workers"
                                                    class="small font-weight-bold text-secondary">Đầu bếp/Nhân sự
                                                    (Workers)</label>
                                                <input type="number"
                                                    class="form-control form-control-sm font-weight-bold text-center"
                                                    id="stat_workers" name="stat_workers" value="32" min="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- CARD THÔNG TIN LIÊN HỆ CÔNG KHAI -->
                                <div class="card shadow mb-4 text-dark">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary"><i
                                                class="fas fa-address-card mr-1"></i>Thông tin liên hệ công khai</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="company_phone" class="font-weight-bold">Số điện thoại tư vấn
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control font-weight-bold"
                                                    id="company_phone" name="phone" value="+1 5589 55488 55" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="company_email" class="font-weight-bold">Địa chỉ Email doanh
                                                    nghiệp <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="company_email" name="email"
                                                    value="info@example.com" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="company_address" class="font-weight-bold">Địa chỉ trụ sở chính
                                                <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="company_address" name="address"
                                                value="Tầng 12, Tòa nhà Saigon Innovation Tower, 154 Nguyễn Thị Minh Khai, Phường Võ Thị Sáu, Quận 3, TP. Hồ Chí Minh."
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <!-- CARD THÔNG TIN TÀI CHÍNH ẨN -->
                                <div class="card shadow mb-4 border-left-danger text-dark">
                                    <div class="card-header py-3 bg-light">
                                        <h6 class="m-0 font-weight-bold text-danger"><i
                                                class="bi bi-shield-lock-fill mr-1"></i>Thông tin cấu hình tài khoản (Ẩn
                                            nội bộ)</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="bank_name" class="font-weight-bold small text-secondary">Tên
                                                    Ngân hàng đối tác</label>
                                                <input type="text" class="form-control form-control-sm font-weight-bold"
                                                    id="bank_name" name="bank_name" value="Vietcombank (VCB)">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="bank_account"
                                                    class="font-weight-bold small text-secondary">Số tài khoản nhận
                                                    tiền</label>
                                                <input type="text" class="form-control form-control-sm font-weight-bold"
                                                    id="bank_account" name="bank_account" value="1029384756321">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="bank_user" class="font-weight-bold small text-secondary">Tên
                                                    đại diện thụ hưởng</label>
                                                <input type="text"
                                                    class="form-control form-control-sm text-uppercase font-weight-bold"
                                                    id="bank_user" name="bank_user" value="CONG TY TNHH FOODELICIOUS">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 mb-0">
                                                <label for="momo_merchant_id"
                                                    class="font-weight-bold small text-secondary">Momo Merchant ID (Cổng
                                                    API)</label>
                                                <input type="password"
                                                    class="form-control form-control-sm font-weight-bold"
                                                    id="momo_merchant_id" name="momo_id"
                                                    value="MOMO_MID_2026_SAMPLE_SECURE_KEY">
                                            </div>
                                            <div class="form-group col-md-6 mb-0">
                                                <label for="momo_phone_backup"
                                                    class="font-weight-bold small text-secondary">Số điện thoại MoMo
                                                    (Nhận thủ công)</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="momo_phone_backup" name="momo_phone" value="0901234567">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- HÀNH ĐỘNG FORM -->
                        <div class="row mb-5 px-3">
                            <button type="submit" class="btn btn-primary shadow-sm px-5 fw-bold py-2"><i
                                    class="fas fa-save mr-2"></i>Lưu cấu hình hệ thống</button>
                        </div>
                    </form>
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; FOODELICIOUS 2026</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Script đổi tên nhãn file upload khi chọn tệp -->
    <script>
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</body>

</html>