<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chỉnh sửa chương trình khuyến mãi - FOODELICIOUS</title>

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
            <li class="nav-item active">
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
                        <a class="collapse-item active" href="{{ route('quanly_khuyenmai') }}">Chương trình khuyến
                            mãi</a>
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
                                <h1 class="h3 mb-0 text-gray-800">Cập nhật chương trình khuyến mãi</h1>
                                <a href="{{ route('quanly_khuyenmai') }}" class="btn btn-sm btn-secondary shadow-sm">
                                    <i class="fas fa-undo fa-sm"></i> Hủy và Quay lại
                                </a>
                            </div>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Biểu mẫu chỉnh sửa thông tin khuyến
                                        mãi</h6>
                                </div>
                                <div class="card-body text-dark">
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="font-weight-bold">Số thứ tự / Mã ID</label>
                                                <input type="text" class="form-control bg-light" value="1" readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="promo_name" class="font-weight-bold">Tên chương trình <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="promo_name"
                                                    name="promo_name" value="Hè giải nhiệt" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="promo_code" class="font-weight-bold">Mã định danh ưu đãi
                                                    (Code)</label>
                                                <input type="text" class="form-control" id="promo_code"
                                                    name="promo_code" value="HE2026">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label align="left" for="condition" class="font-weight-bold">Điều kiện
                                                    áp dụng
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="condition" name="condition"
                                                    value="1 Phở Bò" required
                                                    placeholder="Ví dụ: Đơn hàng từ 150k, Mua 1 tặng 1...">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="reward" class="font-weight-bold">Khuyến mãi nhận được <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control text-success font-weight-bold"
                                                    id="reward" name="reward" value="1 Tiramisu" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="expiry_date" class="font-weight-bold">Thời hạn kết thúc
                                                    <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="expiry_date"
                                                    name="expiry_date" value="2026-06-30" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="status" class="font-weight-bold">Trạng thái chạy chiến
                                                    dịch</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="active" selected>Đang diễn ra (Active)</option>
                                                    <option value="expired">Đã kết thúc (Expired)</option>
                                                    <option value="disabled">Tạm hoãn (Disabled)</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="promo_image" class="font-weight-bold">Hình ảnh đại diện
                                                    chương
                                                    trình</label>
                                                <input type="file" class="form-control-file mb-1" id="promo_image"
                                                    name="promo_image" accept="image/*">
                                                <small class="text-muted">Xem trước: <img src="logo.jpg"
                                                        class="img-thumbnail ml-1" style="max-height: 35px;"></small>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="popup_status" class="font-weight-bold">Trạng thái hiển thị
                                                </label>
                                                <div class="form-check m-0 p-0">
                                                    <input type="checkbox" value="1" style="width: 18px; height: 18px;"
                                                        checked>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary shadow-sm px-4 mr-2">
                                                <i class="fas fa-save fa-sm mr-1"></i> Lưu cập nhật khuyến mãi
                                            </button>
                                            <a href="#" class="btn btn-secondary shadow-sm px-3">Hủy bỏ</a>
                                        </div>
                                    </form>
                                </div>
                            </div>

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