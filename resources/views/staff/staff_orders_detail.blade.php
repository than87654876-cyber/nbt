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

                        <!-- THAY ĐỔI: Bảng dữ liệu tổng hợp danh sách trạng thái vận đơn trực quan -->
                        <div class="container-fluid">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Chi tiết hóa đơn #FDL-8892</h1>
                                <a href="{{ route('quanly_donhang') }}" class="btn btn-sm btn-secondary shadow-sm">
                                    <i class="fas fa-arrow-left fa-sm text-white-50"></i> Quay lại danh sách
                                </a>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><i
                                                    class="fas fa-truck mr-2"></i>Thông
                                                tin giao nhận & Thanh toán</h6>
                                        </div>
                                        <div class="card-body text-dark">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th style="width: 35%">Khách hàng đặt:</th>
                                                        <td>Dương Bá Tùng (Mã thành viên: KH-001)</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Số điện thoại:</th>
                                                        <td class="font-weight-bold">0901234567</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Địa chỉ giao hàng:</th>
                                                        <td>Trường Cao đẳng Công nghệ Thông tin TP.HCM (ITC), Quận Tân
                                                            Phú, Ho
                                                            Chi Minh City</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Phương thức thanh toán:</th>
                                                        <td><span class="badge badge-primary">Ví điện tử MoMo</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Thời gian giao mong muốn:</th>
                                                        <td>Ngay bây giờ (Giao hàng hỏa tốc)</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Ghi chú món ăn:</th>
                                                        <td class="text-danger font-italic">"Ít ngọt, cay nhiều, không
                                                            lấy hành
                                                            lá..."</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <div class="card shadow mb-4">
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary"><i
                                                    class="fas fa-receipt mr-2"></i>Sản
                                                phẩm thực tế trong đơn</h6>
                                            <a href="edit_order.html" class="btn btn-sm btn-warning shadow-sm"><i
                                                    class="fas fa-edit fa-sm"></i>
                                                Sửa trạng thái</a>
                                        </div>
                                        <div class="card-body text-dark">
                                            <table class="table table-striped table-bordered mb-3">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>Tên món ăn</th>
                                                        <th>SL</th>
                                                        <th>Đơn giá lẻ</th>
                                                        <th>Thành tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Cơm tấm sườn bì chả đặc biệt</td>
                                                        <td>2</td>
                                                        <td>45.000 đ</td>
                                                        <td class="font-weight-bold">90.000 đ</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cà phê sữa đá pha phin</td>
                                                        <td>2</td>
                                                        <td>29.000 đ</td>
                                                        <td class="font-weight-bold">58.000 đ</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="p-3 bg-light rounded text-right">
                                                <div class="mb-1">Trạng thái xử lý: <span
                                                        class="badge bg-warning text-dark font-weight-bold">Đang giao
                                                        hàng</span></div>
                                                <div class="mb-2">Trạng thái dòng tiền: <span
                                                        class="badge bg-success text-white font-weight-bold">Đã nhận
                                                        tiền
                                                        (MoMo)</span></div>
                                                <h4 class="font-weight-bold text-danger mb-0">Tổng cộng: 148.000 đ</h4>
                                            </div>
                                        </div>
                                    </div>
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
                    <div class="modal-body">Hệ thống sẽ ghi nhận thời gian đăng xuất và đóng quyền kiểm soát đơn hàng
                        của
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