<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nhân viên - Quản lý đơn hàng</title>

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
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Xử lý đơn hàng nhanh</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Bộ lọc đơn
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('nhanvien.donhang_xacnhan') }}">
                    <i class="fas fa-fw fa-clock text-warning"></i>
                    <span>Đơn chờ xác nhận</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('nhanvien.donhang_giao') }}">
                    <i class="fas fa-fw fa-motorcycle text-info"></i>
                    <span>Đơn đang giao</span></a>
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
                            class="fas fa-user-shield text-success mr-1"></i> Ca trực: Kíp trưởng điều phối bàn giao
                        vận</span>

                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
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
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Bàn điều khiển vận đơn</h1>
                        <button onclick="window.location.reload();"
                            class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-sync-alt fa-sm text-white-50"></i> Làm mới dữ liệu</button>
                    </div>

                    <!-- THAY ĐỔI: Các hộp số liệu tập trung vào trạng thái ĐƠN HÀNG hiện tại -->
                    <div class="row">
                        <!-- Tổng đơn chờ duyệt -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Đơn
                                                chờ xác nhận</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">05 Đơn</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Đơn đang giao hàng -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Đang
                                                giao hỏa tốc</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">12 Đơn</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-motorcycle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Đơn đã hoàn thành trong ngày -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Đã
                                                hoàn thành (Hôm nay)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">48 Đơn</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Đơn bị hủy -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Đơn
                                                đã hủy</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">02 Đơn</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- THAY ĐỔI: Bảng dữ liệu tổng hợp danh sách trạng thái vận đơn trực quan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-table mr-1"></i>Bảng giám sát
                                luồng đơn hàng khách đặt</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-dark" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn</th>
                                            <th>Thời gian đặt</th>
                                            <th>Chi tiết món ăn</th>
                                            <th>Thông tin khách hàng</th>
                                            <th>Trạng thái thanh toán</th>
                                            <th>Trạng thái đơn hàng</th>
                                            <th>Thao tác nhanh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Hàng đơn hàng 1 -->
                                        <tr>
                                            <td class="font-weight-bold text-danger">#FDL-8892</td>
                                            <td>Hôm nay, 10:15</td>
                                            <td>
                                                <ul class="pl-3 mb-0 small">
                                                    <li>Cơm tấm sườn bì chả đặc biệt <strong>(x2)</strong></li>
                                                    <li>Cà phê sữa đá pha phin <strong>(x2)</strong></li>
                                                </ul>
                                            </td>
                                            <td>Dương Bá Tùng<br><small class="text-muted"><i
                                                        class="fas fa-phone-alt"></i> 0901234567</small></td>
                                            <td><span class="badge badge-success px-2 py-1"><i class="fas fa-check"></i>
                                                    Đã nhận tiền (MoMo)</span></td>
                                            <td><span
                                                    class="badge badge-warning text-dark font-weight-bold px-2 py-1"><i
                                                        class="fas fa-truck-moving"></i> Đang giao hàng</span></td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-success btn-sm font-weight-bold btn-block mb-1"><i
                                                        class="fas fa-check-double"></i> Giao thành công</button>
                                                <a type="button"
                                                    class="btn btn-light text-dark btn-sm border btn-block mb-0"
                                                    href="{{ route('nhanvien.donhang_xem') }}">Xem chi
                                                    tiết</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-danger">#FDL-8892</td>
                                            <td>Hôm nay, 10:15</td>
                                            <td>
                                                <ul class="pl-3 mb-0 small">
                                                    <li>Cơm tấm sườn bì chả đặc biệt <strong>(x2)</strong></li>
                                                    <li>Cà phê sữa đá pha phin <strong>(x2)</strong></li>
                                                </ul>
                                            </td>
                                            <td>Dương Bá Tùng<br><small class="text-muted"><i
                                                        class="fas fa-phone-alt"></i> 0901234567</small></td>
                                            <td><span class="badge badge-success px-2 py-1"><i class="fas fa-check"></i>
                                                    Đã nhận tiền (MoMo)</span></td>
                                            <td><span
                                                    class="badge badge-warning text-dark font-weight-bold px-2 py-1"><i
                                                        class="fas fa-truck-moving"></i> Đang
                                                    giao hàng</span></td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-success btn-sm font-weight-bold btn-block mb-1"><i
                                                        class="fas fa-check-double"></i> Giao thành công</button>
                                                <button type="button"
                                                    class="btn btn-light text-dark btn-sm border btn-block mb-0">Xem chi
                                                    tiết</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-danger">#FDL-8892</td>
                                            <td>Hôm nay, 10:15</td>
                                            <td>
                                                <ul class="pl-3 mb-0 small">
                                                    <li>Cơm tấm sườn bì chả đặc biệt <strong>(x2)</strong></li>
                                                    <li>Cà phê sữa đá pha phin <strong>(x2)</strong></li>
                                                </ul>
                                            </td>
                                            <td>Dương Bá Tùng<br><small class="text-muted"><i
                                                        class="fas fa-phone-alt"></i> 0901234567</small></td>
                                            <td><span class="badge badge-success px-2 py-1"><i class="fas fa-check"></i>
                                                    Đã nhận tiền (MoMo)</span></td>
                                            <td><span
                                                    class="badge badge-warning text-dark font-weight-bold px-2 py-1"><i
                                                        class="fas fa-truck-moving"></i> Đang
                                                    giao hàng</span></td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-success btn-sm font-weight-bold btn-block mb-1"><i
                                                        class="fas fa-check-double"></i> Giao thành công</button>
                                                <button type="button"
                                                    class="btn btn-light text-dark btn-sm border btn-block mb-0">Xem chi
                                                    tiết</button>
                                            </td>
                                        </tr>
                                        <!-- Hàng đơn hàng 2 -->
                                        <tr class="table-warning shadow-sm">
                                            <td class="font-weight-bold text-danger">#FDL-9901</td>
                                            <td class="font-weight-bold">Hôm nay, 11:45</td>
                                            <td>
                                                <ul class="pl-3 mb-0 small">
                                                    <li>Bún bò Huế giò gân chả lụa <strong>(x1)</strong></li>
                                                </ul>
                                            </td>
                                            <td>Khách vãng lai<br><small class="text-muted"><i
                                                        class="fas fa-phone-alt"></i> 0912345678</small></td>
                                            <td><span class="badge badge-secondary px-2 py-1">Chưa trả tiền (COD)</span>
                                            </td>
                                            <td><span
                                                    class="badge badge-danger font-weight-bold px-2 py-1 animate__animated animate__flash">Chờ
                                                    xác nhận đơn</span></td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-primary btn-sm font-weight-bold btn-block mb-1"><i
                                                        class="fas fa-thumbs-up"></i> Xác nhận & Chuẩn bị</button>
                                                <button type="button"
                                                    class="btn btn-outline-danger btn-sm btn-block mb-0">Hủy
                                                    đơn</button>
                                            </td>
                                        </tr>
                                        <tr class="table-warning shadow-sm">
                                            <td class="font-weight-bold text-danger">#FDL-9901</td>
                                            <td class="font-weight-bold">Hôm nay, 11:45</td>
                                            <td>
                                                <ul class="pl-3 mb-0 small">
                                                    <li>Bún bò Huế giò gân chả lụa <strong>(x1)</strong></li>
                                                </ul>
                                            </td>
                                            <td>Khách vãng lai<br><small class="text-muted"><i
                                                        class="fas fa-phone-alt"></i> 0912345678</small></td>
                                            <td><span class="badge badge-secondary px-2 py-1">Chưa trả tiền (COD)</span>
                                            </td>
                                            <td><span
                                                    class="badge badge-danger font-weight-bold px-2 py-1 animate__animated animate__flash">Chờ
                                                    xác nhận đơn</span></td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-primary btn-sm font-weight-bold btn-block mb-1"><i
                                                        class="fas fa-thumbs-up"></i> Xác nhận & Chuẩn bị</button>
                                                <button type="button"
                                                    class="btn btn-outline-danger btn-sm btn-block mb-0">Hủy
                                                    đơn</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; FOODELICIOUS 2026</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Xác nhận kết thúc ca trực?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Hệ thống sẽ ghi nhận thời gian đăng xuất và đóng quyền kiểm soát đơn hàng của
                    tài khoản này.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
                    <a class="btn btn-primary" href="#">Xác nhận đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>

</body>

</html>