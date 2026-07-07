<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Tra cứu đơn hàng - FOODELICIOUS</title>
    <meta name="description" content="Tra cứu trạng thái đơn hàng của bạn tại FOODELICIOUS">

    <link href="{{ asset('logo.jpg') }}" rel="icon">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('client/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/css/main.css') }}" rel="stylesheet">

    <style>
        .track-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
            background: #fff;
        }
        .btn-track {
            background-color: #ce1126;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 25px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-track:hover {
            background-color: #a00d20;
            color: white;
        }
        .timeline-step {
            position: relative;
            text-align: center;
            flex: 1;
        }
        .timeline-step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 20px;
            left: 50%;
            width: 100%;
            height: 4px;
            background-color: #e9ecef;
            z-index: 1;
        }
        .timeline-step.active:not(:last-child)::after {
            background-color: #28a745;
        }
        .step-icon {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background-color: #e9ecef;
            color: #6c757d;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 2;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        .timeline-step.active .step-icon {
            background-color: #28a745;
            color: white;
            box-shadow: 0 0 0 4px rgba(40, 167, 69, 0.25);
        }
        .timeline-step.current .step-icon {
            background-color: #007bff;
            color: white;
            box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.25);
        }
        .timeline-step.cancelled .step-icon {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('trangchu') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ isset($settings['logo_url']) ? (\Illuminate\Support\Str::startsWith($settings['logo_url'], 'http') ? $settings['logo_url'] : asset($settings['logo_url'])) : asset('logo.jpg') }}" alt="" class="setting-logo-img">
                <h1 class="sitename">FOODELICIOUS</h1>
                <span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('trangchu') }}">Trang chủ</a></li>
                    <li><a href="{{ route('tracuu') }}" class="active">Tra cứu đơn hàng</a></li>
                </ul>
            </nav>

            <div class="d-flex align-items-center gap-3">
                @if(Auth::check())
                    <a href="{{ route('giohang') }}" class="btn-get-started">Giỏ hàng & Lịch sử</a>
                @else
                    <a href="{{ route('trangchu/dangnhap') }}" class="btn-get-started">Đăng nhập</a>
                @endif
            </div>
        </div>
    </header>

    <main class="main my-5">
        <div class="container text-dark" style="font-family: 'Roboto', sans-serif;">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card track-card p-4 mb-4">
                        <h3 class="fw-bold text-danger border-bottom pb-3 mb-4"><i class="bi bi-search"></i> Tra cứu đơn hàng dành cho khách vãng lai</h3>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Thành công!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($error)
                            <div class="alert alert-danger" role="alert">
                                <i class="bi bi-exclamation-triangle-fill mr-1"></i> {{ $error }}
                            </div>
                        @endif

                        <form action="{{ route('tracuu') }}" method="GET" class="row g-3">
                            <div class="col-md-4">
                                <label for="order_id" class="form-label small fw-bold">Mã đơn hàng <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="order_id" name="order_id" placeholder="VD: FDL-123" value="{{ $orderIdInput }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="phone" class="form-label small fw-bold">Số điện thoại giao hàng</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="VD: 0901234567" value="{{ $phone }}">
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label small fw-bold">Địa chỉ Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="VD: name@example.com" value="{{ $email }}">
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-track shadow-sm"><i class="bi bi-search"></i> Tra cứu trạng thái</button>
                            </div>
                        </form>
                    </div>

                    @if($searched && $order)
                        <!-- Order Status Timeline -->
                        <div class="card track-card p-4 mb-4">
                            <h5 class="fw-bold text-primary mb-4"><i class="bi bi-truck"></i> Tiến độ đơn hàng FDL-{{ $order->id }}</h5>
                            
                            @php
                                $status = $order->order_status;
                            @endphp

                            <div class="d-flex justify-content-between mb-4">
                                @if($status === 'cancelled')
                                    <div class="timeline-step cancelled">
                                        <div class="step-icon"><i class="fas fa-times"></i></div>
                                        <div class="small fw-bold mt-2 text-danger">Đã hủy đơn</div>
                                    </div>
                                @else
                                    <div class="timeline-step {{ in_array($status, ['pending', 'preparing', 'cooked', 'shipping', 'completed']) ? 'active' : '' }} {{ $status === 'pending' ? 'current' : '' }}">
                                        <div class="step-icon"><i class="fas fa-file-invoice"></i></div>
                                        <div class="small fw-bold mt-2">Chờ duyệt</div>
                                    </div>
                                    <div class="timeline-step {{ in_array($status, ['preparing', 'cooked', 'shipping', 'completed']) ? 'active' : '' }} {{ in_array($status, ['preparing', 'cooked']) ? 'current' : '' }}">
                                        <div class="step-icon"><i class="fas fa-utensils"></i></div>
                                        <div class="small fw-bold mt-2">Đang chế biến</div>
                                    </div>
                                    <div class="timeline-step {{ in_array($status, ['shipping', 'completed']) ? 'active' : '' }} {{ $status === 'shipping' ? 'current' : '' }}">
                                        <div class="step-icon"><i class="fas fa-motorcycle"></i></div>
                                        <div class="small fw-bold mt-2">Đang giao hàng</div>
                                    </div>
                                    <div class="timeline-step {{ $status === 'completed' ? 'active current' : '' }}">
                                        <div class="step-icon"><i class="fas fa-check"></i></div>
                                        <div class="small fw-bold mt-2">Đã nhận hàng</div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Order Details -->
                        <div class="card track-card p-4">
                            <div class="row border-bottom pb-3 mb-3">
                                <div class="col-md-6">
                                    <h5 class="fw-bold mb-1">Thông tin nhận hàng</h5>
                                    <p class="mb-1"><strong>Khách hàng:</strong> {{ $order->user ? $order->user->fullname : 'Khách vãng lai' }}</p>
                                    <p class="mb-1"><strong>Chi tiết:</strong> {{ $order->health_notes }}</p>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <h5 class="fw-bold mb-1">Thanh toán</h5>
                                    <p class="mb-1"><strong>Phương thức:</strong> 
                                        @if($order->payment_method === 'cash')
                                            Tiền mặt (COD)
                                        @elseif($order->payment_method === 'bank_transfer')
                                            Chuyển khoản ATM/VietQR
                                        @else
                                            Ví điện tử MoMo
                                        @endif
                                    </p>
                                    <p class="mb-1"><strong>Trạng thái:</strong> 
                                        @if($order->payment_status === 'paid')
                                            <span class="badge bg-success">Đã thanh toán</span>
                                        @elseif($order->payment_status === 'refunded')
                                            <span class="badge bg-danger">Đã hoàn tiền</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Chờ thanh toán</span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <h5 class="fw-bold mb-3">Sản phẩm đã đặt</h5>
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th>Món ăn</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-end">Đơn giá</th>
                                            <th class="text-end">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->orderItems as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($item->dish && $item->dish->image_url)
                                                        <img src="{{ $item->dish->image_url }}" class="rounded me-2" width="50" height="50" style="object-fit: cover;">
                                                    @endif
                                                    <div>
                                                        <span class="fw-bold">{{ $item->dish ? $item->dish->dish_name : 'Món ăn không tồn tại' }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-end">{{ number_format($item->price, 0, ',', '.') }}đ</td>
                                            <td class="text-end fw-bold">{{ number_format($item->price * $item->quantity, 0, ',', '.') }}đ</td>
                                        </tr>
                                        @endforeach
                                        <tr class="table-light">
                                            <td colspan="3" class="text-end fw-bold">Tổng thanh toán:</td>
                                            <td class="text-end fw-bold text-danger fs-5">{{ number_format($order->final_amount, 0, ',', '.') }}đ</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <footer class="footer bg-light py-4 border-top mt-auto">
        <div class="container text-center text-secondary small">
            <p class="mb-0">© 2026 FOODELICIOUS. Mọi quyền được bảo lưu.</p>
        </div>
    </footer>

    <script src="{{ asset('client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Real-time settings and order status polling -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // 1. Settings/Logo Polling
            let currentLogoUrl = "{{ isset($settings['logo_url']) ? (\Illuminate\Support\Str::startsWith($settings['logo_url'], 'http') ? $settings['logo_url'] : asset($settings['logo_url'])) : asset('logo.jpg') }}";
            
            function pollSettings() {
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
                    .catch(err => console.error('Error polling settings:', err));
            }
            setInterval(pollSettings, 2000);

            // 2. Tracked Order Polling (if order is loaded)
            @if(isset($order) && $order)
                const orderId = "{{ $order->id }}";
                const userEmail = "{{ $email ?? '' }}";
                const userPhone = "{{ $phone ?? '' }}";
                const lastStatus = "{{ $order->order_status }}";
                const lastPaymentStatus = "{{ $order->payment_status }}";

                function pollOrderStatus() {
                    const queryParams = new URLSearchParams({
                        order_id: orderId,
                        last_status: lastStatus,
                        last_payment_status: lastPaymentStatus
                    });
                    if (userEmail) queryParams.append('email', userEmail);
                    if (userPhone) queryParams.append('phone', userPhone);

                    fetch(`{{ route('api.orders.track.poll') }}?${queryParams.toString()}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.changed) {
                                console.log('Order status updated. Reloading page...');
                                window.location.reload();
                            }
                        })
                        .catch(err => console.error('Error polling order status:', err));
                }
                setInterval(pollOrderStatus, 2000);
            @endif
        });
    </script>
</body>
</html>
