<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chỉnh sửa món ăn - FOODELICIOUS</title>

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
                        <a class="collapse-item active" href="{{ route('quanly_monandon') }}">Món ăn đơn</a>
                        <a class="collapse-item" href="{{ route('quanly_goidichvu') }}">Gói dịch vụ</a>
                        <a class="collapse-item" href="{{ route('quanly_khuyenmai') }}">Chương trình khuyến mãi</a>
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
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Dương Chí Bá</span>
                                <img class="img-profile rounded-circle" src="logo.jpg">
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin món</h1>
                        <a href="{{ route('quanly_monandon') }}" class="btn btn-sm btn-secondary shadow-sm">
                            <i class="fas fa-undo fa-sm"></i> Hủy và Quay lại
                        </a>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Biểu mẫu thay đổi dữ liệu món ăn</h6>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name" class="font-weight-bold text-dark">Tên món ăn <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="Cà phê sữa đá" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="category" class="font-weight-bold text-dark">Phân loại thực
                                            đơn</label>
                                        <select class="form-control" id="category" name="category">
                                            <option value="Món đơn (Sáng)" selected>Món đơn (Sáng)</option>
                                            <option value="Gói dịch vụ">Gói dịch vụ</option>
                                            <option value="Món đơn (Tráng miệng)">Món đơn (Tráng miệng)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="price" class="font-weight-bold text-dark">Giá bán (vnđ) <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="price" name="price" value="29000"
                                            required min="0">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="status" class="font-weight-bold text-dark">Trạng thái phục
                                            vụ</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="available" selected>Còn món (Available)</option>
                                            <option value="unavailable">Hết món (Unavailable)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="image" class="font-weight-bold text-dark">Thay đổi hình ảnh
                                            mới</label>
                                        <input type="file" class="form-control-file mb-2" id="image" name="image"
                                            accept="image/*">
                                        <small class="text-muted">Ảnh đang dùng hiện tại:</small>
                                        <div class="mt-1">
                                            <img src="logo.jpg" class="img-thumbnail" style="max-height: 80px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="font-weight-bold text-dark">Mô tả món ăn</label>
                                    <textarea class="form-control" id="description" name="description"
                                        rows="4">Hạt cà phê Robusta nguyên chất pha phin truyền thống kết hợp với sữa đặc đặc sánh mang lại hương vị đậm đà khó quên.</textarea>
                                </div>

                                <hr>
                                <button type="submit" class="btn btn-primary shadow-sm px-4">
                                    <i class="fas fa-save fa-sm"></i> Lưu thay đổi
                                </button>
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