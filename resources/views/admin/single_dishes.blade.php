<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản lý Món ăn đơn</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('logo.jpg') }}" rel="icon">
    <!-- Custom styles for this template -->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
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
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Thực đơn</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý thực đơn</h6>
                        <a class="collapse-item" href="{{ route('quanly_danhmuc') }}">Danh sách món ăn</a>
                        <a class="collapse-item active" href="{{ route('quanly_monandon') }}">Món ăn đơn</a>
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
                        <!-- End of Topbar -->

                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <div class="row justify-content-between px-2 py-3">
                                <h1 class="h3 mb-2 text-gray-800">Món ăn đơn</h1>
                                <a class="btn btn-primary me-auto" href="{{ route('monandon_them') }}">
                                    <i class="fas fa-plus"></i> Thêm món
                                </a>
                            </div>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Danh sách món ăn đơn</h6>
                                </div>
                                <div class="card-body align-items-center justify-content-center">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Số thứ tự</th>
                                                    <th>Tên món ăn</th>
                                                    <th>Miêu tả</th>
                                                    <th>Giá tiền</th>
                                                    <th>Số lượng bán</th>
                                                    <th>Loại</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Số thứ tự</th>
                                                    <th>Tên món ăn</th>
                                                    <th>Miêu tả</th>
                                                    <th>Giá tiền</th>
                                                    <th>Số lượng bán</th>
                                                    <th>Loại</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Phở Bò</td>
                                                    <td>Phở truyền thống với thịt bò mềm</td>
                                                    <td>45,000 đ</td>
                                                    <td>25</td>
                                                    <td>Phở</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Bánh Mì Thịt</td>
                                                    <td>Bánh mì crispy với thịt nạc và pâté</td>
                                                    <td>35,000 đ</td>
                                                    <td>30</td>
                                                    <td>Bánh Mì</td>
                                                    <td>
                                                        <a href="{{ route('monandon_xem') }}"
                                                            class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i>
                                                            Xem</a>
                                                        <a href="{{ route('monandon_chinhsua') }}"
                                                            class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Cơm Tấm</td>
                                                    <td>Cơm tấm với thịt nướng và trứng ốp la</td>
                                                    <td>50,000 đ</td>
                                                    <td>20</td>
                                                    <td>Cơm</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Bánh Cuốn</td>
                                                    <td>Bánh cuốn nóng với nhân thịt nạc</td>
                                                    <td>40,000 đ</td>
                                                    <td>35</td>
                                                    <td>Bánh</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Cháo Gà</td>
                                                    <td>Cháo gà trắng ngon lành, dễ tiêu</td>
                                                    <td>38,000 đ</td>
                                                    <td>28</td>
                                                    <td>Cháo</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Bánh Chưng</td>
                                                    <td>Bánh chưng truyền thống, nhân đậu xanh</td>
                                                    <td>32,000 đ</td>
                                                    <td>40</td>
                                                    <td>Bánh</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>Mì Kỵ</td>
                                                    <td>Mì kỵ với thịt gà xé, nước dùng thanh</td>
                                                    <td>42,000 đ</td>
                                                    <td>22</td>
                                                    <td>Mì</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Hủ Tiếu</td>
                                                    <td>Hủ tiếu nam vang thơm lừng</td>
                                                    <td>48,000 đ</td>
                                                    <td>18</td>
                                                    <td>Hủ Tiếu</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>Bánh Quai Vạc</td>
                                                    <td>Bánh quai vạc nóng, nhân tôm thịt</td>
                                                    <td>44,000 đ</td>
                                                    <td>26</td>
                                                    <td>Bánh</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>Cơm Gà Hainanese</td>
                                                    <td>Cơm gà Hainanese lạnh ngon chuẩn vị</td>
                                                    <td>52,000 đ</td>
                                                    <td>24</td>
                                                    <td>Cơm</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td>Bánh Dầy</td>
                                                    <td>Bánh dầy nóng ngát với nước mắm chua</td>
                                                    <td>36,000 đ</td>
                                                    <td>32</td>
                                                    <td>Bánh</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td>Cơm Chiên Dương Châu</td>
                                                    <td>Cơm chiên kiểu Trung Quốc với tôm thịt</td>
                                                    <td>55,000 đ</td>
                                                    <td>19</td>
                                                    <td>Cơm</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>13</td>
                                                    <td>Xôi Gà</td>
                                                    <td>Xôi nếp gà ngon, thơm lạc dễ ăn</td>
                                                    <td>39,000 đ</td>
                                                    <td>31</td>
                                                    <td>Xôi</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>14</td>
                                                    <td>Bánh Bao</td>
                                                    <td>Bánh bao nóng với nhân thịt nạc sốt</td>
                                                    <td>33,000 đ</td>
                                                    <td>38</td>
                                                    <td>Bánh</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>15</td>
                                                    <td>Mì Vằn Thắn</td>
                                                    <td>Mì vằn thắn nước dùng thơm ngon</td>
                                                    <td>46,000 đ</td>
                                                    <td>21</td>
                                                    <td>Mì</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>16</td>
                                                    <td>Cơm Lươn</td>
                                                    <td>Cơm lươn nướng thơm lừng</td>
                                                    <td>58,000 đ</td>
                                                    <td>15</td>
                                                    <td>Cơm</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>17</td>
                                                    <td>Bánh Mì Pâté</td>
                                                    <td>Bánh mì pâté sốt cay ngon lạ</td>
                                                    <td>37,000 đ</td>
                                                    <td>29</td>
                                                    <td>Bánh Mì</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>18</td>
                                                    <td>Cháo Thịt Bò</td>
                                                    <td>Cháo thịt bò mềm, nước dùng đậm</td>
                                                    <td>41,000 đ</td>
                                                    <td>27</td>
                                                    <td>Cháo</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>19</td>
                                                    <td>Bánh Sắc</td>
                                                    <td>Bánh sắc lá chuối truyền thống</td>
                                                    <td>34,000 đ</td>
                                                    <td>36</td>
                                                    <td>Bánh</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>20</td>
                                                    <td>Cơm Cà Chua Trứng</td>
                                                    <td>Cơm chiên cà chua trứng cà chua tươi</td>
                                                    <td>49,000 đ</td>
                                                    <td>23</td>
                                                    <td>Cơm</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                                                class="fas fa-eye"></i> Xem</a>
                                                        <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                                                class="fas fa-edit"></i> Sửa</a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                                                class="fas fa-trash"></i> Xóa</a>
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
                                <span>Copyright &copy; Your Website 2020</span>
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
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn đăng xuất?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                            <a class="btn btn-primary" href="{{ route('dangnhap') }}">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

            <!-- Core plugin JavaScript-->
            <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

            <!-- Custom scripts for all pages-->
            <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

            <!-- Page level plugins -->
            <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

            <!-- Page level custom scripts -->
            <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>

</body>

</html>