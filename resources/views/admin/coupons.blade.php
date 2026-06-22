<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cấu hình gửi mã nâng cao - FOODELICIOUS</title>

    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="logo.jpg" rel="icon">
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
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
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Khách hàng</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý khách hàng</h6>
                        <a class="collapse-item" href="{{ route('quanly_khachhang') }}">Danh sách</a>
                        <a class="collapse-item active" href="{{ route('quanly_guima') }}">Gửi mã khuyến mãi</a>
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
            <div id="content">

                <!-- Topbar -->
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
                        <!-- Logout Modal-->
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn đăng xuất?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Hủy</button>
                                        <a class="btn btn-primary" href="{{ route('dangnhap') }}">Đăng xuất</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Bộ lọc thông minh & Sinh mã tự động nâng cao</h1>
                            </div>

                            <form action="#" method="POST">

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 bg-light">
                                        <h6 class="m-0 font-weight-bold text-primary"><i
                                                class="fas fa-filter mr-2"></i>Bước 1:
                                            Thiết lập điều kiện lọc khách hàng chi tiết</h6>
                                    </div>
                                    <div class="card-body text-dark">
                                        <div class="row">

                                            <div class="col-xl-4 col-md-12 mb-4">
                                                <div class="card border-top-danger h-100 py-3 bg-white shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="font-weight-bold text-danger mb-3"><i
                                                                class="fas fa-crown mr-1"></i> 1. Theo hạng thành viên
                                                        </h6>
                                                        <div class="form-group">
                                                            <label class="small font-weight-bold text-muted">Chọn các
                                                                hạng áp
                                                                dụng:</label>
                                                            <div class="custom-control custom-checkbox mb-2">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="rank_diamond" name="ranks[]" value="diamond">
                                                                <label class="custom-control-label font-weight-bold"
                                                                    for="rank_diamond">Hạng Kim Cương (VIP 2)</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox mb-2">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="rank_gold" name="ranks[]" value="gold">
                                                                <label class="custom-control-label font-weight-bold"
                                                                    for="rank_gold">Hạng Vàng (VIP 1)</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox mb-2">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="rank_silver" name="ranks[]" value="silver">
                                                                <label class="custom-control-label"
                                                                    for="rank_silver">Hạng
                                                                    Bạc</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="rank_standard" name="ranks[]" value="standard">
                                                                <label class="custom-control-label"
                                                                    for="rank_standard">Hạng
                                                                    Đồng (Thành viên mới)</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-md-12 mb-4">
                                                <div class="card border-top-warning h-100 py-3 bg-white shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="font-weight-bold text-warning mb-3"><i
                                                                class="fas fa-history mr-1"></i> 2. Thời gian chưa mua
                                                            hàng</h6>
                                                        <div class="form-group">
                                                            <label for="inactive_period"
                                                                class="small font-weight-bold text-muted">Kể từ đơn hàng
                                                                cuối
                                                                cùng cách đây:</label>
                                                            <select class="form-control font-weight-bold"
                                                                id="inactive_period" name="inactive_period">
                                                                <option value="all">-- Không lọc theo tiêu chí này --
                                                                </option>
                                                                <option value="1_month">Từ 1 tháng trở lên (&gt; 30
                                                                    ngày)
                                                                </option>
                                                                <option value="6_months">Từ 6 tháng trở lên (&gt; 180
                                                                    ngày)
                                                                </option>
                                                                <option value="1_year">Từ 1 năm trở lên (&gt; 365 ngày)
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <small class="text-muted d-block mt-2">Hệ thống dựa vào lịch sử
                                                            đơn hàng
                                                            để quét tự động.</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-md-12 mb-4">
                                                <div class="card border-top-success h-100 py-3 bg-white shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="font-weight-bold text-success mb-3"><i
                                                                class="fas fa-user-plus mr-1"></i> 3. Định nghĩa Khách
                                                            hàng mới
                                                        </h6>
                                                        <div class="form-group">
                                                            <label for="new_customer_range"
                                                                class="small font-weight-bold text-muted">Thời gian đăng
                                                                ký tài
                                                                khoản:</label>
                                                            <select class="form-control font-weight-bold text-success"
                                                                id="new_customer_range" name="new_customer_range">
                                                                <option value="all">-- Không lọc theo tiêu chí này --
                                                                </option>
                                                                <option value="7_days" selected>Mới đăng ký trong vòng 7
                                                                    ngày
                                                                    qua</option>
                                                                <option value="15_days">Mới đăng ký trong vòng 15 ngày
                                                                    qua
                                                                </option>
                                                                <option value="30_days">Mới đăng ký trong vòng 30 ngày
                                                                    qua
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <small class="text-muted d-block mt-2">Phù hợp kích thích khách
                                                            vừa tạo
                                                            tài khoản thực hiện đơn đầu tiên.</small>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 bg-light">
                                        <h6 class="m-0 font-weight-bold text-primary"><i
                                                class="fas fa-cog mr-2"></i>Bước 2: Cấu
                                            hình quy tắc sinh mã tự động (Generator Settings)</h6>
                                    </div>
                                    <div class="card-body text-dark">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="code_prefix" class="font-weight-bold">Tiền tố mã
                                                    (Prefix)</label>
                                                <input type="text" class="form-control font-weight-bold text-uppercase"
                                                    id="code_prefix" name="code_prefix"
                                                    placeholder="Ví dụ: VIP7D, BACK6M">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="code_length" class="font-weight-bold">Độ dài chuỗi ngẫu
                                                    nhiên</label>
                                                <select class="form-control" id="code_length" name="code_length">
                                                    <option value="6" selected>6 ký tự (Ví dụ: AX89E1)</option>
                                                    <option value="8">8 ký tự (Ví dụ: K4M2P7Q9)</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="discount_type" class="font-weight-bold">Loại giảm
                                                    giá</label>
                                                <select class="form-control" id="discount_type" name="discount_type">
                                                    <option value="percentage">Giảm theo phần trăm (%)</option>
                                                    <option value="fixed" selected>Giảm tiền cố định (đ)</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="discount_value" class="font-weight-bold">Mức giảm giá cụ thể
                                                    <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control font-weight-bold text-danger"
                                                    id="discount_value" name="discount_value" value="20000" min="1"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="expiry_days" class="font-weight-bold">Số ngày hết
                                                    hạn</label>
                                                <input type="number" class="form-control" id="expiry_days"
                                                    name="expiry_days" value="5" min="1">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="min_order" class="font-weight-bold">Đơn hàng tối thiểu áp
                                                    dụng</label>
                                                <input type="number" class="form-control" id="min_order"
                                                    name="min_order" value="0">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="send_channel" class="font-weight-bold">Kênh thông
                                                    báo</label>
                                                <select class="form-control" id="send_channel" name="send_channel">
                                                    <option value="email">Hệ thống gửi Email</option>
                                                    <option value="sms">Gửi SMS Brandname</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 bg-light">
                                        <h6 class="m-0 font-weight-bold text-primary"><i
                                                class="fas fa-envelope mr-2"></i>Bước
                                            3: Nội dung tin nhắn gửi đi</h6>
                                    </div>
                                    <div class="card-body text-dark">
                                        <div class="form-group">
                                            <label for="email_subject" class="font-weight-bold">Tiêu đề tin nhắn /
                                                Email</label>
                                            <input type="text" class="form-control" id="email_subject"
                                                name="email_subject"
                                                value="Món quà bất ngờ dành tặng riêng bạn từ FOODELICIOUS!" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="message_body" class="font-weight-bold">Nội dung chi tiết</label>
                                            <textarea class="form-control" id="message_body" name="message_body"
                                                rows="4"
                                                required>Chào bạn thân mến, FOODELICIOUS gửi tặng riêng bạn mã ưu đãi giảm giá độc quyền tự sinh: [MÃ_TỰ_SINH]. Mã áp dụng cho mọi đơn hàng trong vòng [SỐ_NGÀY] ngày tới. Đừng bỏ lỡ nhé!</textarea>
                                        </div>

                                        <hr>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted small"><i class="fas fa-database mr-1"></i>Hệ thống
                                                tự động
                                                loại trùng nếu khách hàng thuộc nhiều nhóm lọc chéo cùng lúc.</span>
                                            <div>
                                                <button type="button" class="btn btn-secondary shadow-sm mr-1">Quét số
                                                    lượng
                                                    thực tế</button>
                                                <button type="submit" class="btn btn-primary shadow-sm px-4">Bắt đầu tạo
                                                    mã &
                                                    Gửi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Cà phê 2026</span>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

            <script src="admin/vendor/jquery/jquery.min.js"></script>
            <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="admin/js/sb-admin-2.min.js"></script>
</body>

</html>