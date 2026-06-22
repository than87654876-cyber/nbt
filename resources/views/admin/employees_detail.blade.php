<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chi tiết nhân viên - FOODELICIOUS</title>

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3 fs-1">FOODELICIOUS</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Báo cáo doanh thu</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Dịch vụ</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Thực đơn</span>
                </a>
                <div id="collapseTwo" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý thực đơn</h6>
                        <a class="collapse-item" href="{{ route('quanly_danhmuc') }}">Danh sách món ăn</a>
                        <a class="collapse-item" href="{{ route('quanly_monandon') }}">Món ăn đơn</a>
                        <a class="collapse-item" href="{{ route('quanly_goidichvu') }}">Gói dịch vụ</a>
                        <a class="collapse-item" href="{{ route('quanly_khuyenmai') }}">Chương trình khuyến mãi</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Tài khoản</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Khách hàng</span>
                </a>
                <div id="collapsePages" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý khách hàng</h6>
                        <a class="collapse-item" href="{{ route('quanly_khachhang') }}">Danh sách</a>
                        <a class="collapse-item" href="{{ route('quanly_guima') }}">Gửi mã khuyến mãi</a>
                    </div>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-address-book"></i>
                    <span>Nhân viên</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Dương Chí Bá</span>
                                <img class="img-profile rounded-circle" src="logo.jpg">
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Thông tin nhân viên chi tiết</h1>
                        <a href="#" class="btn btn-sm btn-secondary shadow-sm">
                            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Quay lại danh sách
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Ảnh đại diện nhân viên</h6>
                                </div>
                                <div class="card-body text-center">
                                    <img src="logo.jpg" alt="Avatar"
                                        class="img-profile rounded-circle img-thumbnail mb-3"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                    <h5 class="font-weight-bold text-dark mb-1">Nguyễn Văn Thắng</h5>
                                    <p class="text-muted small mb-2">Mã số: <span class="font-weight-bold">NV-001</span>
                                    </p>
                                    <span class="badge badge-danger px-3 py-2">Administrator</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 mb-4">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Thông tin tài khoản và nhân sự</h6>
                                    <a href="#" class="btn btn-sm btn-warning shadow-sm">
                                        <i class="fas fa-edit fa-sm"></i> Chỉnh sửa & Cấp quyền
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered text-dark mb-0">
                                        <tbody>
                                            <tr>
                                                <th style="width: 30%"><i
                                                        class="fas fa-id-card mr-2 text-primary"></i>Họ và Tên:</th>
                                                <td class="font-weight-bold">Nguyễn Văn Thắng</td>
                                            </tr>
                                            <tr>
                                                <th><i class="fas fa-briefcase mr-2 text-primary"></i>Chức vụ công tác:
                                                </th>
                                                <td>Quản lý tổng phân hiệu</td>
                                            </tr>
                                            <tr>
                                                <th><i class="fas fa-envelope mr-2 text-primary"></i>Email liên hệ:</th>
                                                <td>thang.nv@foodelicious.com</td>
                                            </tr>
                                            <tr>
                                                <th><i class="fas fa-shield-alt mr-2 text-primary"></i>Nhóm quyền hạn:
                                                </th>
                                                <td><span class="badge badge-danger">Administrator</span> (Quyền quản
                                                    trị cấp cao nhất)</td>
                                            </tr>
                                            <tr>
                                                <th><i class="fas fa-toggle-on mr-2 text-primary"></i>Trạng thái hoạt
                                                    động:</th>
                                                <td><span class="badge badge-success">Đang làm việc</span></td>
                                            </tr>
                                            <tr>
                                                <th><i class="fas fa-calendar-alt mr-2 text-primary"></i>Ngày tham gia
                                                    hệ thống:</th>
                                                <td>12/08/2025</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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

    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="admin/js/sb-admin-2.min.js"></script>
</body>

</html>