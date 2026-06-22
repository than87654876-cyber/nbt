<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản lý Khách hàng - FOODELICIOUS</title>

    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('logo.jpg') }}" rel="icon">
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
                        <a class="collapse-item active" href="{{ route('quanly_khachhang') }}">Danh sách</a>
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
                                <h1 class="h3 mb-0 text-gray-800">Khách hàng</h1>
                            </div>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Danh sách tài khoản khách hàng (20
                                        thành viên)
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-dark" id="dataTable" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Mã KH</th>
                                                    <th>Họ và Tên</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Email</th>
                                                    <th>Hạng thành viên</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>KH-001</td>
                                                    <td class="font-weight-bold">Dương Bá Tùng</td>
                                                    <td>0901234567</td>
                                                    <td>tung.db@gmail.com</td>
                                                    <td><span class="badge badge-danger">Kim cương</span></td>
                                                    <td><a href="{{ route('khachhang_xem') }}"
                                                            class="btn btn-info btn-sm"><i class="fas fa-eye"></i>
                                                            Xem</a> <a href="{{ route('khachhang_chinhsua') }}"
                                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>
                                                            Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-002</td>
                                                    <td class="font-weight-bold">Nguyễn Minh Triết</td>
                                                    <td>0912345678</td>
                                                    <td>triet.nm@gmail.com</td>
                                                    <td><span class="badge badge-warning">Vàng</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-003</td>
                                                    <td class="font-weight-bold">Phạm Hoàng Long</td>
                                                    <td>0923456789</td>
                                                    <td>long.ph@gmail.com</td>
                                                    <td><span class="badge badge-secondary">Bạc</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-004</td>
                                                    <td class="font-weight-bold">Trần Thu Hà</td>
                                                    <td>0934567890</td>
                                                    <td>ha.tt@gmail.com</td>
                                                    <td><span class="badge badge-light text-dark">Đồng</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-005</td>
                                                    <td class="font-weight-bold">Lê Thành Nam</td>
                                                    <td>0945678901</td>
                                                    <td>nam.lt@gmail.com</td>
                                                    <td><span class="badge badge-warning">Vàng</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-006</td>
                                                    <td class="font-weight-bold">Vũ Hoàng Yến</td>
                                                    <td>0956789012</td>
                                                    <td>yen.vh@gmail.com</td>
                                                    <td><span class="badge badge-danger">Kim cương</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-007</td>
                                                    <td class="font-weight-bold">Đặng Đình Quân</td>
                                                    <td>0967890123</td>
                                                    <td>quan.dd@gmail.com</td>
                                                    <td><span class="badge badge-secondary">Bạc</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-008</td>
                                                    <td class="font-weight-bold">Bùi Thị Mai</td>
                                                    <td>0978901234</td>
                                                    <td>mai.bt@gmail.com</td>
                                                    <td><span class="badge badge-light text-dark">Đồng</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-009</td>
                                                    <td class="font-weight-bold">Đỗ Tuấn Tú</td>
                                                    <td>0989012345</td>
                                                    <td>tu.dt@gmail.com</td>
                                                    <td><span class="badge badge-warning">Vàng</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-010</td>
                                                    <td class="font-weight-bold">Ngô Quốc Bảo</td>
                                                    <td>0990123456</td>
                                                    <td>bao.nq@gmail.com</td>
                                                    <td><span class="badge badge-danger">Kim cương</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-011</td>
                                                    <td class="font-weight-bold">Hoàng Trung Kiên</td>
                                                    <td>0812345678</td>
                                                    <td>kien.ht@gmail.com</td>
                                                    <td><span class="badge badge-secondary">Bạc</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-012</td>
                                                    <td class="font-weight-bold">Vũ Thùy Linh</td>
                                                    <td>0823456789</td>
                                                    <td>linh.v@gmail.com</td>
                                                    <td><span class="badge badge-light text-dark">Đồng</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-013</td>
                                                    <td class="font-weight-bold">Đinh Gia Bảo</td>
                                                    <td>0834567890</td>
                                                    <td>bao.dg@gmail.com</td>
                                                    <td><span class="badge badge-warning">Vàng</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-014</td>
                                                    <td class="font-weight-bold">Phan Thị Ngọc</td>
                                                    <td>0845678901</td>
                                                    <td>ngoc.pt@gmail.com</td>
                                                    <td><span class="badge badge-secondary">Bạc</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-015</td>
                                                    <td class="font-weight-bold">Lý Minh Khôi</td>
                                                    <td>0856789012</td>
                                                    <td>khoi.lm@gmail.com</td>
                                                    <td><span class="badge badge-danger">Kim cương</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-016</td>
                                                    <td class="font-weight-bold">Hồ Xuân Hương</td>
                                                    <td>0867890123</td>
                                                    <td>huong.hx@gmail.com</td>
                                                    <td><span class="badge badge-light text-dark">Đồng</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-017</td>
                                                    <td class="font-weight-bold">Tạ Văn Đại</td>
                                                    <td>0878901234</td>
                                                    <td>dai.tv@gmail.com</td>
                                                    <td><span class="badge badge-warning">Vàng</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-018</td>
                                                    <td class="font-weight-bold">Cao Minh Tú</td>
                                                    <td>0889012345</td>
                                                    <td>tu.cm@gmail.com</td>
                                                    <td><span class="badge badge-secondary">Bạc</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-019</td>
                                                    <td class="font-weight-bold">Diệp Bảo Ngọc</td>
                                                    <td>0890123456</td>
                                                    <td>ngoc.db@gmail.com</td>
                                                    <td><span class="badge badge-danger">Kim cương</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KH-020</td>
                                                    <td class="font-weight-bold">Phùng Tiến Phát</td>
                                                    <td>0701234567</td>
                                                    <td>phat.pt@gmail.com</td>
                                                    <td><span class="badge badge-light text-dark">Đồng</span></td>
                                                    <td><a href="#" class="btn btn-info btn-sm"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a> <a href="#" class="btn btn-warning btn-sm"
                                                            title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Mở xóa tài khoản"><i class="fas fa-trash"></i>
                                                            Xóa</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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

            <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
            <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
            <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
</body>

</html>