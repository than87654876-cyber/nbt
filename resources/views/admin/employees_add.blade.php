!
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chỉnh sửa & Phân quyền nhân viên - FOODELICIOUS</title>

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
                            <a class="nav-link dropdown-toggle" href="#">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Dương Chí Bá</span>
                                <img class="img-profile rounded-circle" src="logo.jpg">
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Cập nhật hồ sơ & Phân quyền nhân viên</h1>
                        <a href="#" class="btn btn-sm btn-secondary shadow-sm">
                            <i class="fas fa-undo fa-sm"></i> Hủy và Quay lại
                        </a>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Biểu mẫu xử lý thông tin tài khoản nội bộ</h6>
                        </div>
                        <div class="card-body text-dark">
                            <form action="#" method="POST">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="font-weight-bold">Mã nhân viên (ID cố định)</label>
                                        <input type="text" class="form-control bg-light" value="NV-001" readonly>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="fullname" class="font-weight-bold">Họ và Tên nhân viên <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="fullname" name="fullname"
                                            value="Nguyễn Văn Thắng" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="position" class="font-weight-bold">Chức vụ đảm nhiệm <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="position" name="position"
                                            value="Quản lý tổng phân hiệu" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email" class="font-weight-bold">Email hệ thống <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="thang.nv@foodelicious.com" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="role" class="font-weight-bold text-danger"><i
                                                class="fas fa-user-shield mr-1"></i>Cấp quyền truy cập hệ thống
                                            (Role)</label>
                                        <select class="form-control font-weight-bold" id="role" name="role">
                                            <option value="admin" selected class="text-danger">Administrator (Toàn quyền
                                                hệ thống)</option>
                                            <option value="staff" class="text-primary">Staff (Nhân viên vận hành thường)
                                            </option>
                                            <option value="technical" class="text-secondary">Technical (Nhân viên kỹ
                                                thuật chuyên trách)</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status" class="font-weight-bold">Trạng thái làm việc</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="working" selected>Đang làm việc (Active)</option>
                                            <option value="suspended">Tạm đình chỉ (Suspended)</option>
                                            <option value="retired">Đã nghỉ việc (Terminated)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="password" class="font-weight-bold">Đặt lại mật khẩu mới</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Bỏ trống nếu không muốn thay đổi mật khẩu cũ">
                                        <small class="text-muted">Mật khẩu phải có độ dài tối thiểu từ 6 ký tự trở
                                            lên.</small>
                                    </div>
                                </div>

                                <hr>
                                <div class="d-flex justify-content-start">
                                    <button type="submit" class="btn btn-primary shadow-sm px-4 mr-2">
                                        <i class="fas fa-save fa-sm mr-1"></i>Thêm nhân viên
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