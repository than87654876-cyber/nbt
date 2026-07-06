<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Quản lý Hệ thống - FOODELICIOUS')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('logo.jpg') }}" rel="icon">
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @yield('styles')
    @vite(['resources/js/app.js'])
</head>

<body id="page-top">
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
            @if(Auth::user()->role === 'admin')
            <li class="nav-item {{ Route::is('quanly') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('quanly') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Báo cáo doanh thu</span>
                </a>
            </li>
            @endif

            <!-- Nav Item - Bàn làm việc Nhân viên -->
            <li class="nav-item {{ Route::is('quanly_banlamviec') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('quanly_banlamviec') }}">
                    <i class="fas fa-fw fa-desktop text-warning"></i>
                    <span>Bàn làm việc Nhân viên</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Dịch vụ
            </div>

            <!-- Nav Item - Cấu hình trang chủ -->
            @if(Auth::user()->role === 'admin')
            <li class="nav-item {{ Route::is('quanly_cauhinh') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('quanly_cauhinh') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Cấu hình trang chủ</span>
                </a>
            </li>
            @endif

            <!-- Nav Item - Thực đơn Collapse Menu -->
            @if(Auth::user()->role === 'admin')
            @php 
                $inMenu = Route::is('quanly_danhmuc') || Route::is('quanly_monandon') || Route::is('quanly_goidichvu') || Route::is('quanly_khuyenmai') || Route::is('danhmuc_xem') || Route::is('danhmuc_them') || Route::is('danhmuc_chinhsua') || Route::is('monandon_them') || Route::is('monandon_chinhsua') || Route::is('monandon_xem') || Route::is('goidichvu_them') || Route::is('goidichvu_xem') || Route::is('goidichvu_chinhsua') || Route::is('khuyenmai_them') || Route::is('khuyenmai_xem') || Route::is('khuyenmai_chinhsua');
            @endphp
            <li class="nav-item {{ $inMenu ? 'active' : '' }}">
                <a class="nav-link {{ $inMenu ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="{{ $inMenu ? 'true' : 'false' }}" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Thực đơn</span>
                </a>
                <div id="collapseTwo" class="collapse {{ $inMenu ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý thực đơn</h6>
                        <a class="collapse-item {{ Route::is('quanly_danhmuc') ? 'active' : '' }}" href="{{ route('quanly_danhmuc') }}">Danh mục món ăn</a>
                        <a class="collapse-item {{ Route::is('quanly_monandon') ? 'active' : '' }}" href="{{ route('quanly_monandon') }}">Món ăn đơn</a>
                        <a class="collapse-item {{ Route::is('quanly_goidichvu') ? 'active' : '' }}" href="{{ route('quanly_goidichvu') }}">Gói dịch vụ</a>
                        @if(Auth::user()->role === 'admin')
                        <a class="collapse-item {{ Route::is('quanly_khuyenmai') ? 'active' : '' }}" href="{{ route('quanly_khuyenmai') }}">Chương trình khuyến mãi</a>
                        @endif
                    </div>
                </div>
            </li>
            @endif

            <!-- Nav Item - Đơn hàng Collapse Menu -->
            @if(Auth::user()->role === 'admin')
            @php 
                $inOrders = Route::is('quanly_donhang') || Route::is('quanly_goidangky') || Route::is('quanly_yeucauhoan') || Route::is('donhang_xem') || Route::is('donhang_chinhsua') || Route::is('goidangky_xem') || Route::is('goidangky_chinhsua') || Route::is('yeucauhoan_xem');
            @endphp
            <li class="nav-item {{ $inOrders ? 'active' : '' }}">
                <a class="nav-link {{ $inOrders ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="{{ $inOrders ? 'true' : 'false' }}" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Đơn hàng</span>
                </a>
                <div id="collapseUtilities" class="collapse {{ $inOrders ? 'show' : '' }}" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý đơn hàng</h6>
                        <a class="collapse-item {{ Route::is('quanly_donhang') ? 'active' : '' }}" href="{{ route('quanly_donhang') }}">Đơn hàng</a>
                        <a class="collapse-item {{ Route::is('quanly_goidangky') ? 'active' : '' }}" href="{{ route('quanly_goidangky') }}">Gói dịch vụ</a>
                        <a class="collapse-item {{ Route::is('quanly_yeucauhoan') ? 'active' : '' }}" href="{{ route('quanly_yeucauhoan') }}">Yêu cầu hoàn tiền</a>
                    </div>
                </div>
            </li>
            @endif

            <!-- Nav Item - Bàn làm việc Nhân viên Collapse Menu -->
            @php 
                $inStaffTasks = Route::is('quanly_bep') || (Route::is('quanly_donhang') && request('status')) || Route::is('quanly_yeucauhoan');
            @endphp
            <li class="nav-item {{ $inStaffTasks ? 'active' : '' }}">
                <a class="nav-link {{ $inStaffTasks ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseStaff"
                    aria-expanded="{{ $inStaffTasks ? 'true' : 'false' }}" aria-controls="collapseStaff">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Nghiệp vụ Nhân viên</span>
                </a>
                <div id="collapseStaff" class="collapse {{ $inStaffTasks ? 'show' : '' }}" aria-labelledby="headingStaff" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Bếp chuẩn bị món</h6>
                        <a class="collapse-item {{ Route::is('quanly_bep') ? 'active' : '' }}" href="{{ route('quanly_bep') }}">Chuẩn bị món (Bếp)</a>
                        
                        <h6 class="collapse-header">Dịch vụ khách hàng (CSKH)</h6>
                        <a class="collapse-item {{ Route::is('quanly_donhang') && request('status') === 'pending' ? 'active' : '' }}" href="{{ route('quanly_donhang', ['status' => 'pending']) }}">Xác nhận đơn mới</a>
                        <a class="collapse-item {{ Route::is('quanly_yeucauhoan') ? 'active' : '' }}" href="{{ route('quanly_yeucauhoan') }}">Giải quyết hoàn tiền</a>
                        
                        <h6 class="collapse-header">Vận chuyển & Giao hàng</h6>
                        <a class="collapse-item {{ Route::is('quanly_donhang') && request('status') === 'delivering' ? 'active' : '' }}" href="{{ route('quanly_donhang', ['status' => 'delivering']) }}">Shipper đang giao lẻ</a>
                        <a class="collapse-item {{ Route::is('quanly_goidangky') ? 'active' : '' }}" href="{{ route('quanly_goidangky') }}">Điều phối gói ăn ngày</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            @if(Auth::user()->role === 'admin')
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tài khoản
            </div>

            <!-- Nav Item - Khách hàng Collapse Menu -->
            @php 
                $inCustomers = Route::is('quanly_khachhang') || Route::is('quanly_guima') || Route::is('khachhang_xem') || Route::is('khachhang_chinhsua') || Route::is('quanly_khachvanglai');
            @endphp
            <li class="nav-item {{ $inCustomers ? 'active' : '' }}">
                <a class="nav-link {{ $inCustomers ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="{{ $inCustomers ? 'true' : 'false' }}" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Khách hàng</span>
                </a>
                <div id="collapsePages" class="collapse {{ $inCustomers ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý khách hàng</h6>
                        <a class="collapse-item {{ Route::is('quanly_khachhang') ? 'active' : '' }}" href="{{ route('quanly_khachhang') }}">Danh sách thành viên</a>
                        <a class="collapse-item {{ Route::is('quanly_khachvanglai') ? 'active' : '' }}" href="{{ route('quanly_khachvanglai') }}">Khách vãng lai</a>
                        @if(Auth::user()->role === 'admin')
                        <a class="collapse-item {{ Route::is('quanly_guima') ? 'active' : '' }}" href="{{ route('quanly_guima') }}">Gửi mã khuyến mãi</a>
                        @endif
                    </div>
                </div>
            </li>
            @endif

            <!-- Nav Item - Nhân viên -->
            @if(Auth::user()->role === 'admin')
            @php 
                $inEmployees = Route::is('quanly_nhanvien') || Route::is('nhanvien_them') || Route::is('nhanvien_xem') || Route::is('nhanvien_chinhsua');
            @endphp
            <li class="nav-item {{ $inEmployees ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('quanly_nhanvien') }}">
                    <i class="fas fa-fw fa-address-book"></i>
                    <span>Nhân viên</span>
                </a>
            </li>
            @endif

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

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->fullname }}</span>
                                <img class="img-profile rounded-circle setting-logo-img" src="{{ isset($settings['logo_url']) ? (\Illuminate\Support\Str::startsWith($settings['logo_url'], 'http') ? $settings['logo_url'] : asset($settings['logo_url'])) : asset('logo.jpg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item py-2" href="#" data-toggle="modal"
                                    data-target="#userProfileModal">
                                    <i class="fas fa-user-badge fa-sm fa-fw mr-2 text-primary"></i>Hồ sơ thông tin
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
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
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white mt-auto">
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
    <!-- End of Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modals -->
    <!-- User Profile Modal -->
    <div class="modal fade" id="userProfileModal" tabindex="-1" role="dialog"
        aria-labelledby="userProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header text-white text-center d-block position-relative"
                    style="background-color: #ce1126; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title fw-bold" id="userProfileModalLabel">
                        <i class="fas fa-user-circle mr-2"></i>Hồ sơ tài khoản
                    </h5>
                </div>
                <div class="modal-body text-dark p-4">
                    <div class="text-center mb-4">
                        <div class="display-5 text-muted mb-2"><i class="fas fa-user-circle"></i></div>
                        <h4 class="fw-bold text-dark mb-1">{{ Auth::user()->fullname }}</h4>
                        <span class="badge badge-danger px-3 py-2 fw-bold"><i class="fas fa-crown mr-1"></i>{{ ucfirst(Auth::user()->role) }}</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td class="text-muted py-2">Chức vụ</td>
                                    <td class="fw-bold py-2">{{ Auth::user()->role === 'admin' ? 'Quản trị viên' : 'Nhân viên' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-2" style="width: 40%;">Số điện thoại:</td>
                                    <td class="fw-bold py-2">{{ Auth::user()->phone ?? 'Chưa cập nhật' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-2">Địa chỉ Email:</td>
                                    <td class="fw-bold py-2">{{ Auth::user()->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0">
                    <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Đóng cửa sổ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
        aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Bạn có muốn đăng xuất?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn đã sẵn sàng kết thúc phiên làm việc của mình.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary" href="{{ route('dangxuat') }}">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
    @yield('scripts')
    <!-- Realtime Echo Listener for Kitchen / Admin (Disabled in favor of AJAX Polling) -->
    <!--
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (window.Echo) {
                window.Echo.channel('kitchen-channel')
                    .listen('OrderUpdated', (e) => {
                        console.log('Realtime Order Event received:', e);
                        if (e.action === 'created') {
                            alert(`🔔 [Realtime] Có đơn hàng mới #${e.order.id}! Tổng tiền: ${new Intl.NumberFormat('vi-VN').format(e.order.total_amount)} đ. Vui lòng kiểm tra và chế biến!`);
                            if (window.location.href.indexOf('quanly_donhang') > -1 || window.location.href.indexOf('quanly_bep') > -1) {
                                window.location.reload();
                            }
                        }
                    });
            }
        });
    </script>
    -->
    <!-- Realtime AJAX Polling for Kitchen / Admin -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let lastCheckedTime = null;

            // Get initial server time
            fetch("{{ route('api.orders.poll') }}")
                .then(response => response.json())
                .then(data => {
                    lastCheckedTime = data.timestamp;
                    console.log('Admin Polling initialized at:', lastCheckedTime);
                    setInterval(pollUpdates, 2000);
                })
                .catch(err => console.error('Error initializing admin polling:', err));

            function pollUpdates() {
                if (!lastCheckedTime) return;

                fetch(`{{ route('api.orders.poll') }}?since=${encodeURIComponent(lastCheckedTime)}`)
                    .then(response => response.json())
                    .then(data => {
                        lastCheckedTime = data.timestamp;
                        if (data.updates && data.updates.length > 0) {
                            data.updates.forEach(e => {
                                console.log('Polling Order Event received:', e);
                                const path = window.location.pathname;
                                const isManagerPage = path.includes('quanly') || path.includes('donhang') || path.includes('yeucauhoan') || path.includes('goidangky') || path.includes('bep');
                                
                                if (e.action === 'created') {
                                    alert(`🔔 [Realtime] Có đơn hàng mới #${e.order.id}! Vui lòng kiểm tra!`);
                                    if (isManagerPage) {
                                        window.location.reload();
                                    }
                                } else if (isManagerPage) {
                                    window.location.reload();
                                }
                            });
                        }
                    })
                    .catch(err => console.error('Error during admin polling:', err));
            }

            // Real-time Settings/Logo polling for Admin panel
            let currentLogoUrl = "{{ isset($settings['logo_url']) ? (\Illuminate\Support\Str::startsWith($settings['logo_url'], 'http') ? $settings['logo_url'] : asset($settings['logo_url'])) : asset('logo.jpg') }}";
            
            function pollAdminSettings() {
                fetch("{{ route('api.settings.poll') }}")
                    .then(response => response.json())
                    .then(data => {
                        const newLogo = data.settings.logo_url;
                        if (newLogo && newLogo !== currentLogoUrl) {
                            currentLogoUrl = newLogo;
                            document.querySelectorAll('.setting-logo-img').forEach(img => {
                                img.src = newLogo;
                            });
                        }
                    })
                    .catch(err => console.error('Error polling settings in Admin layout:', err));
            }
            setInterval(pollAdminSettings, 2000);
        });
    </script>
</body>
</html>
