<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chi tiết gói món ăn - FOODELICIOUS</title>

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
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Thực đơn</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý thực đơn</h6>
                        <a class="collapse-item" href="{{ route('quanly_danhmuc') }}">Danh sách món ăn</a>
                        <a class="collapse-item" href="{{ route('quanly_monandon') }}">Món ăn đơn</a>
                        <a class="collapse-item active" href="{{ route('quanly_goidichvu') }}">Gói dịch vụ</a>
                        <a class="collapse-item" href="{{ route('quanly_khuyenmai') }}">Chương trình khuyến mãi</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Tài khoản</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true">
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
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
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
                        <h1 class="h3 mb-0 text-gray-800">Chi tiết gói món ăn</h1>
                        <a href="{{ route('quanly_goidichvu') }}" class="btn btn-sm btn-secondary shadow-sm">
                            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Quay lại danh sách gói
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Hình ảnh gói món ăn</h6>
                                </div>
                                <div class="card-body text-center">
                                    <img src="logo.jpg" alt="Hình ảnh gói món ăn" class="img-fluid rounded shadow-sm"
                                        style="max-height: 250px; width: 100%; object-fit: cover;">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 mb-4">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Thông tin tổng quan gói</h6>
                                    <a href="#" class="btn btn-sm btn-warning shadow-sm">
                                        <i class="fas fa-edit fa-sm"></i> Chỉnh sửa gói
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered text-dark mb-0">
                                        <tbody>
                                            <tr>
                                                <th style="width: 30%">Mã định danh gói (ID):</th>
                                                <td class="font-weight-bold">#PKG-2026</td>
                                            </tr>
                                            <tr>
                                                <th>Tên gói món ăn:</th>
                                                <td class="font-weight-bold text-primary">Combo Tiết Kiệm Sáng - Trưa
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Ngày tạo gói:</th>
                                                <td>15/06/2026</td>
                                            </tr>
                                            <tr>
                                                <th>Giá gói tích hợp:</th>
                                                <td class="text-danger font-weight-bold fs-5">89.000 vnđ</td>
                                            </tr>
                                            <tr>
                                                <th>Trạng thái áp dụng:</th>
                                                <td>
                                                    <span class="badge badge-success">Đang kích hoạt</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><i
                                            class="fas fa-utensils mr-2"></i>Các món ăn có trong gói này</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped text-dark">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th style="width: 10%">STT</th>
                                                    <th style="width: 15%">Hình ảnh</th>
                                                    <th style="width: 35%">Tên món ăn thành phần</th>
                                                    <th style="width: 20%">Số lượng trong gói</th>
                                                    <th style="width: 20%">Giá gốc (Bán đơn)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <img src="logo.jpg" alt="Món 1" class="img-thumbnail"
                                                            style="max-height: 50px;">
                                                    </td>
                                                    <td class="font-weight-bold text-secondary">Cơm tấm sườn bì chả</td>
                                                    <td>1 phần</td>
                                                    <td>45.000 vnđ</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>
                                                        <img src="logo.jpg" alt="Món 2" class="img-thumbnail"
                                                            style="max-height: 50px;">
                                                    </td>
                                                    <td class="font-weight-bold text-secondary">Cà phê sữa đá pha phin
                                                    </td>
                                                    <td>1 ly</td>
                                                    <td>29.000 vnđ</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>
                                                        <img src="logo.jpg" alt="Món 3" class="img-thumbnail"
                                                            style="max-height: 50px;">
                                                    </td>
                                                    <td class="font-weight-bold text-secondary">Canh khổ qua thác lác đi
                                                        kèm</td>
                                                    <td>1 chén</td>
                                                    <td>20.000 vnđ</td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="font-weight-bold bg-gray-100">
                                                <tr>
                                                    <td colspan="3" class="text-right">Tổng giá trị thực tế (Nếu mua
                                                        lẻ):</td>
                                                    <td colspan="2" class="text-danger">94.000 vnđ (Tiết kiệm được 5.000
                                                        vnđ)</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
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