<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chỉnh sửa gói món ăn - FOODELICIOUS</title>

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
                            <a class="nav-link dropdown-toggle" href="#">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Dương Chí Bá</span>
                                <img class="img-profile rounded-circle" src="logo.jpg">
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin gói món ăn</h1>
                        <a href="{{ route('quanly_goidichvu') }}" class="btn btn-sm btn-secondary shadow-sm">
                            <i class="fas fa-undo fa-sm"></i> Hủy và Quay lại
                        </a>
                    </div>

                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Biểu mẫu thay đổi dữ liệu gói</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="font-weight-bold text-dark">Mã định danh gói (ID)</label>
                                                <input type="text" class="form-control bg-light" value="#PKG-2026"
                                                    readonly>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="combo_name" class="font-weight-bold text-dark">Tên gói món
                                                    ăn <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="combo_name"
                                                    name="combo_name" value="Combo Tiết Kiệm Sáng - Trưa" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="created_at" class="font-weight-bold text-dark">Ngày tạo
                                                    gói</label>
                                                <input type="date" class="form-control" id="created_at"
                                                    name="created_at" value="2026-06-15">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="combo_price" class="font-weight-bold text-dark">Giá gói tích
                                                    hợp (vnđ) <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control text-danger font-weight-bold"
                                                    id="combo_price" name="combo_price" value="89000" required min="0">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="status" class="font-weight-bold text-dark">Trạng thái áp
                                                    dụng</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="active" selected>Đang kích hoạt (Active)</option>
                                                    <option value="inactive">Tạm ngưng (Inactive)</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="combo_image" class="font-weight-bold text-dark">Hình ảnh gói
                                                    món ăn</label>
                                                <input type="file" class="form-control-file mb-1" id="combo_image"
                                                    name="combo_image" accept="image/*">
                                                <small class="text-muted">Ảnh hiện tại: <img src="logo.jpg"
                                                        class="img-thumbnail ml-1" style="max-height: 40px;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary"><i
                                                class="fas fa-tasks mr-2"></i>Cấu hình danh sách món ăn trong gói</h6>
                                    </div>
                                    <div class="input-group p-2 ">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted small">* Tích chọn vào ô đầu dòng để thêm món ăn vào gói và
                                            cập nhật số lượng tương ứng.</p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover text-dark">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th style="width: 8%" class="text-center">Chọn</th>
                                                        <th style="width: 12%">Hình ảnh</th>
                                                        <th style="width: 40%">Tên món ăn đơn</th>
                                                        <th style="width: 20%">Giá gốc lẻ</th>
                                                        <th style="width: 20%">Số lượng trong gói</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">
                                                            <input type="checkbox" name="dishes[]" value="1"
                                                                style="width: 18px; height: 18px;" checked>
                                                        </td>
                                                        <td>
                                                            <img src="logo.jpg" alt="Món 1" class="img-thumbnail"
                                                                style="max-height: 45px;">
                                                        </td>
                                                        <td class="align-middle font-weight-bold">Cơm tấm sườn bì chả
                                                        </td>
                                                        <td class="align-middle text-secondary">45.000 vnđ</td>
                                                        <td>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="quantity[1]" value="1" min="1"
                                                                style="max-width: 100px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center align-middle">
                                                            <input type="checkbox" name="dishes[]" value="2"
                                                                style="width: 18px; height: 18px;" checked>
                                                        </td>
                                                        <td>
                                                            <img src="logo.jpg" alt="Món 2" class="img-thumbnail"
                                                                style="max-height: 45px;">
                                                        </td>
                                                        <td class="align-middle font-weight-bold">Cà phê sữa đá pha phin
                                                        </td>
                                                        <td class="align-middle text-secondary">29.000 vnđ</td>
                                                        <td>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="quantity[2]" value="1" min="1"
                                                                style="max-width: 100px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center align-middle">
                                                            <input type="checkbox" name="dishes[]" value="3"
                                                                style="width: 18px; height: 18px;" checked>
                                                        </td>
                                                        <td>
                                                            <img src="logo.jpg" alt="Món 3" class="img-thumbnail"
                                                                style="max-height: 45px;">
                                                        </td>
                                                        <td class="align-middle font-weight-bold">Canh khổ qua thác lác
                                                            đi kèm</td>
                                                        <td class="align-middle text-secondary">20.000 vnđ</td>
                                                        <td>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="quantity[3]" value="1" min="1"
                                                                style="max-width: 100px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center align-middle">
                                                            <input type="checkbox" name="dishes[]" value="4"
                                                                style="width: 18px; height: 18px;">
                                                        </td>
                                                        <td>
                                                            <img src="logo.jpg" alt="Món 4" class="img-thumbnail"
                                                                style="max-height: 45px;">
                                                        </td>
                                                        <td class="align-middle text-muted">Trà đào sả cam miếng lớn
                                                        </td>
                                                        <td class="align-middle text-secondary">35.000 vnđ</td>
                                                        <td>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="quantity[4]" value="0" min="0"
                                                                style="max-width: 100px;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <hr>
                                        <div class="d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary shadow-sm px-4 mr-2">
                                                <i class="fas fa-save fa-sm mr-1"></i>Thêm gói
                                            </button>
                                            <a href="{{ route('quanly_goidichvu') }}"
                                                class="btn btn-secondary shadow-sm px-3">Hủy bỏ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

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