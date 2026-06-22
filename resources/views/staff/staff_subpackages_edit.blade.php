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
            <li class="nav-item active">
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

            <li class="nav-item">
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

                    <!-- THAY ĐỔI: Bảng theo dõi tiến độ phân phối chi tiết -->
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
                                    <div class="row align-items-center bg-light p-2 rounded mb-3 border-left-primary">
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
                                    <div class="row align-items-center bg-light p-2 rounded mb-3 border-left-primary">
                                        <div class="col-md-2 font-weight-bold text-center">Ngày thứ 20<br><small
                                                class="text-muted">(19/06/2026)</small></div>
                                        <div class="col-md-7">
                                            <label class="small font-weight-bold mb-1">Món ăn chỉ định giao:</label>
                                            <input type="text"
                                                class="form-control form-control-sm font-weight-bold text-primary"
                                                name="menu_day[20]" value="Cơm chiên Dương Châu + Chén canh súp đi kèm">
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <span class="badge badge-secondary py-2 px-3">Cho phép sửa</span>
                                        </div>
                                    </div>

                                    <hr>
                                    <button type="submit" class="btn btn-primary shadow-sm px-4"><i
                                            class="fas fa-save fa-sm"></i> Lưu lại
                                        toàn bộ cấu hình mới</button>
                                </div>
                            </div>
                        </form>

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