<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chỉnh sửa phân bổ gói - FOODELICIOUS</title>

    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="logo.jpg" rel="icon">
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
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
            <li class="nav-item active">
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
                        <a class="collapse-item active" href="{{ route('quanly_goidangky') }}">Gói dịch vụ</a>
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

                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Điều chỉnh & Phân bổ gói dịch vụ</h1>
                                <a href="{{ route('quanly_goidangky') }}" class="btn btn-sm btn-secondary shadow-sm"><i
                                        class="fas fa-undo"></i>
                                    Hủy bỏ</a>
                            </div>

                            <form action="#" method="POST">
                                <!-- THÀNH PHẦN 1: ĐIỀU CHỈNH TRẠNG THÁI CHUNG -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary"><i
                                                class="fas fa-toggle-on me-1"></i>Trạng
                                            thái tổng thể gói dịch vụ</h6>
                                    </div>
                                    <div class="card-body text-dark">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="font-weight-bold">Trạng thái hoạt động</label>
                                                <select class="form-control" name="status">
                                                    <option value="active" selected>Đang chạy dịch vụ (Active)</option>
                                                    <option value="paused">Tạm dừng giao (Khách đi du lịch/vắng mặt)
                                                    </option>
                                                    <option value="cancelled">Hủy ngang gói dịch vụ (Cancelled)</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="font-weight-bold">Trạng thái tài chính đơn gốc</label>
                                                <select class="form-control" name="payment_status">
                                                    <option value="paid" selected>Đã tất toán toàn bộ hóa đơn</option>
                                                    <option value="refunded">Đã tất toán & hoàn trả một phần tiền
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 d-flex align-items-end">
                                                <!-- Tính năng tạo tự động đơn hàng vận chuyển cho ngày tiếp theo -->
                                                <button type="button" class="btn btn-success w-100 shadow-sm"><i
                                                        class="fas fa-shipping-fast me-1"></i> Tạo đơn vận hôm
                                                    nay</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- THÀNH PHẦN 2: THAY ĐỔI THỰC ĐƠN TỪNG NGÀY THEO YÊU CẦU CỦA KHÁCH -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 bg-light">
                                        <h6 class="m-0 font-weight-bold text-primary"><i
                                                class="fas fa-utensils me-1"></i>Thay
                                            đổi chi tiết món ăn theo lịch trình (Các ngày chưa giao)</h6>
                                    </div>
                                    <div class="card-body text-dark">
                                        <p class="text-muted small">* Chỉ những ngày có trạng thái "Chưa đến ngày" mới
                                            cho phép
                                            thay đổi dữ liệu thực đơn món ăn.</p>

                                        <!-- Ngày 19 mẫu -->
                                        <div
                                            class="row align-items-center bg-light p-2 rounded mb-3 border-left-primary">
                                            <div class="col-md-2 font-weight-bold text-center">Ngày thứ 19<br><small
                                                    class="text-muted">(18/06/2026)</small></div>
                                            <div class="col-md-7">
                                                <label class="small font-weight-bold mb-1">Món ăn chỉ định giao:</label>
                                                <input type="text"
                                                    class="form-control form-control-sm font-weight-bold text-primary"
                                                    name="menu_day[19]"
                                                    value="Bún bò Huế giò gân + Trà đào sả cam miếng lớn">
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <span class="badge badge-secondary py-2 px-3">Cho phép sửa</span>
                                            </div>
                                        </div>

                                        <!-- Ngày 20 mẫu -->
                                        <div
                                            class="row align-items-center bg-light p-2 rounded mb-3 border-left-primary">
                                            <div class="col-md-2 font-weight-bold text-center">Ngày thứ 20<br><small
                                                    class="text-muted">(19/06/2026)</small></div>
                                            <div class="col-md-7">
                                                <label class="small font-weight-bold mb-1">Món ăn chỉ định giao:</label>
                                                <input type="text"
                                                    class="form-control form-control-sm font-weight-bold text-primary"
                                                    name="menu_day[20]"
                                                    value="Cơm chiên Dương Châu + Chén canh súp đi kèm">
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <span class="badge badge-secondary py-2 px-3">Cho phép sửa</span>
                                            </div>
                                        </div>

                                        <hr>
                                        <button type="submit" class="btn btn-primary shadow-sm px-4"><i
                                                class="fas fa-save fa-sm"></i> Lưu lại toàn bộ cấu hình mới</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto"><span>Copyright &copy; Cà phê 2026</span></div>
                        </div>
                    </footer>
                </div>
            </div>
            <script src="admin/vendor/jquery/jquery.min.js"></script>
            <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="admin/js/sb-admin-2.min.js"></script>
</body>

</html>