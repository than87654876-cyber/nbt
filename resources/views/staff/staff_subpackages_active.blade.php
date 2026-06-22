<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nhân viên - Quản lý Gói dịch vụ</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('logo.jpg') }}" rel="icon">
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3 fs-1">STAFF PORTAL</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('nhanvien.goidichvu') }}">
                    <i class="fas fa-fw fa-box-open"></i>
                    <span>Điều phối gói dịch vụ</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Bộ lọc chu kỳ
            </div>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('nhanvien.goidichvu_hoatdong') }}">
                    <i class="fas fa-fw fa-toggle-on text-success"></i>
                    <span>Gói đang kích hoạt</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('nhanvien.goidichvu_hethan') }}">
                    <i class="fas fa-fw fa-calendar-times text-danger"></i>
                    <span>Gói hết hạn</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <span class="navbar-text text-dark font-weight-bold d-none d-sm-inline-block"><i
                            class="fas fa-user-shield text-info mr-1"></i> Phân hệ điều phối: Lịch trình chia món ăn dài
                        hạn</span>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Nhân viên trực ban</span>
                                <img class="img-profile rounded-circle" src="{{ asset('logo.jpg') }}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('dangnhap') }}" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất ca trực
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Giám sát chu kỳ Gói dịch vụ</h1>
                        <button onclick="window.location.reload();"
                            class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-sync-alt fa-sm text-white-50"></i> Đồng bộ lịch trình bếp</button>
                    </div>

                    <!-- THAY ĐỔI: Thẻ trạng thái tổng hợp phân bổ gói dài ngày -->
                    <div class="row">
                        <!-- Đang chạy -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Gói
                                                đang chạy (Active)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">14 Tài khoản</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-play-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tạm dừng -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Đang
                                                tạm ngưng nhận món</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">03 Khách</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pause-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cần tạo vận đơn hôm nay -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Đơn
                                                cần giao (Hôm nay)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">11 Điểm giao</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shipping-fast fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Đã kết thúc chu kỳ -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Gói
                                                đã kết thúc/Hủy</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">08 Gói</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- THAY ĐỔI: Bảng theo dõi tiến độ phân phối chi tiết -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-history mr-1"></i>Nhật ký
                                theo dõi phân bổ món ăn theo chu kỳ gói</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-dark" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Gói dịch vụ đăng ký</th>
                                            <th>Mã đơn mua</th>
                                            <th>Thời gian đăng ký</th>
                                            <th>Khách hàng / SĐT</th>
                                            <th>Dòng tiền</th>
                                            <th>Tiến độ dịch vụ</th>
                                            <th>Vận đơn hôm nay</th>
                                            <th>Thao tác nhanh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold text-primary">Gói Gia Đình Hàng Ngày</td>
                                            <td><a href="#" class="font-weight-bold text-dark">#FDL-6102</a></td>
                                            <td>01/06/2026</td>
                                            <td>Dương Bá Tùng<br><small class="text-muted">0901234567</small></td>
                                            <td><span class="badge badge-success px-2 py-1">Đã tất toán</span></td>
                                            <td class="font-weight-bold text-dark">Ngày 18 / 30<br><small
                                                    class="text-success">(Còn 12 ngày)</small></td>
                                            <td><span
                                                    class="badge badge-warning text-dark font-weight-bold px-2 py-1"><i
                                                        class="fas fa-shipping-fast"></i> Đang giao hàng</span></td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-success btn-block mb-1"><i
                                                        class="fas fa-check"></i> Đã hoàn thành món</button>
                                                <button type="button" class="btn btn-sm btn-light btn-block border">Cấu
                                                    hình thực đơn</button>
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
                    <div class="copyright text-center my-auto"><span>Copyright &copy; FOODELICIOUS 2026</span></div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scroll to Top & Logout Modal giữ nguyên từ cấu trúc template của bạn -->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>

</body>

</html>