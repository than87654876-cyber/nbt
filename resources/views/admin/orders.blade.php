@extends('layouts.admin')

@section('title', 'Quản lý Đơn hàng - FOODELICIOUS')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Quản lý đơn hàng</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-dark shadow-sm" role="alert">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    @if($errors->any())
        <div class="alert alert-danger py-2 small shadow-sm mb-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng hiện tại</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã đơn</th>
                            <th>Các món ăn đặt</th>
                            <th>Tài khoản / SĐT</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            @php
                                $paymentMethodText = 'COD';
                                if ($order->payment_method === 'bank_transfer') {
                                    $paymentMethodText = 'ATM';
                                } elseif ($order->payment_method === 'momo') {
                                    $paymentMethodText = 'MoMo';
                                } elseif ($order->payment_method === 'vnpay') {
                                    $paymentMethodText = 'VNPay';
                                } elseif ($order->payment_method === 'zalopay') {
                                    $paymentMethodText = 'ZaloPay';
                                }
                            @endphp
                            <tr>
                                <td>#FDL-{{ $order->id }}</td>
                                <td class="font-weight-bold">
                                    @foreach($order->orderItems as $item)
                                        {{ $item->dish->dish_name ?? 'Món ăn' }} x{{ $item->quantity }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                </td>
                                <td>{{ $order->user->fullname ?? 'Khách vãng lai' }}<br><small class="text-muted">{{ $order->user->phone ?? 'Không có SĐT' }}</small></td>
                                <td>
                                    <select class="form-control form-control-sm font-weight-bold payment-status-select shadow-sm" 
                                            data-order-id="{{ $order->id }}" 
                                            data-current-val="{{ $order->payment_status }}"
                                            style="width: auto; display: inline-block;">
                                        <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Chờ thanh toán</option>
                                        <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Đã thanh toán</option>
                                        <option value="failed" {{ $order->payment_status === 'failed' ? 'selected' : '' }}>Thất bại</option>
                                        <option value="refunded" {{ $order->payment_status === 'refunded' ? 'selected' : '' }}>Đã hoàn tiền</option>
                                    </select>
                                    <br><small class="text-muted font-weight-bold">Hình thức: {{ $paymentMethodText }}</small>
                                </td>
                                <td>
                                    <select class="form-control form-control-sm font-weight-bold order-status-select shadow-sm" 
                                            data-order-id="{{ $order->id }}" 
                                            data-current-val="{{ $order->order_status }}"
                                            style="width: auto; display: inline-block;">
                                        <option value="pending" {{ $order->order_status === 'pending' ? 'selected' : '' }}>Chờ xác nhận</option>
                                        <option value="confirmed" {{ $order->order_status === 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                                        <option value="preparing" {{ $order->order_status === 'preparing' ? 'selected' : '' }}>Đang chuẩn bị</option>
                                        <option value="delivering" {{ $order->order_status === 'delivering' ? 'selected' : '' }}>Đang giao hàng</option>
                                        <option value="completed" {{ $order->order_status === 'completed' ? 'selected' : '' }}>Đã hoàn thành</option>
                                        <option value="cancelled" {{ $order->order_status === 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="{{ route('donhang_xem', $order->id) }}" class="btn btn-info btn-sm"
                                        title="Xem chi tiết"><i class="fas fa-eye"></i> Xem</a>
                                    <a href="{{ route('donhang_chinhsua', $order->id) }}"
                                        class="btn btn-warning btn-sm"
                                        title="Cập nhật chi tiết"><i class="fas fa-edit"></i> Chi tiết</a>
                                    <form action="{{ route('donhang_xoa', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" title="Xóa đơn"><i class="fas fa-trash"></i> Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function updateSelectColor(select) {
            const val = select.value;
            select.classList.remove('border-left-success', 'border-left-danger', 'border-left-warning', 'border-left-primary', 'border-left-info', 'border-left-secondary', 'text-success', 'text-danger', 'text-warning', 'text-primary', 'text-info', 'text-secondary');
            
            if (val === 'pending') {
                select.classList.add('border-left-secondary', 'text-secondary');
            } else if (val === 'confirmed' || val === 'preparing') {
                select.classList.add('border-left-info', 'text-info');
            } else if (val === 'delivering') {
                select.classList.add('border-left-primary', 'text-primary');
            } else if (val === 'completed' || val === 'paid') {
                select.classList.add('border-left-success', 'text-success');
            } else if (val === 'cancelled' || val === 'failed') {
                select.classList.add('border-left-danger', 'text-danger');
            } else if (val === 'refunded') {
                select.classList.add('border-left-secondary', 'text-muted');
            }
        }

        // Initialize colors for all selects
        document.querySelectorAll('.order-status-select, .payment-status-select').forEach(select => {
            updateSelectColor(select);
            select.addEventListener('change', function() {
                updateSelectColor(this);
            });
        });

        // Handle AJAX change events
        $('.order-status-select, .payment-status-select').on('change', function() {
            const select = $(this);
            const orderId = select.data('order-id');
            const tr = select.closest('tr');
            
            const isPayment = select.hasClass('payment-status-select');
            const val = select.val();
            
            if (isPayment && val === 'refunded') {
                if (!confirm('Để hoàn tiền đầy đủ kèm tải ảnh biên lai giao dịch và nhập số tiền tùy chỉnh, vui lòng sử dụng nút "Chi tiết" để thao tác. Bạn vẫn muốn cập nhật trạng thái nhanh thành Đã hoàn tiền tại đây?')) {
                    select.val(select.data('current-val'));
                    updateSelectColor(select[0]);
                    return;
                }
            }
            
            const orderStatusSelect = tr.find('.order-status-select');
            const paymentStatusSelect = tr.find('.payment-status-select');
            
            const orderStatus = orderStatusSelect.val();
            const paymentStatus = paymentStatusSelect.val();
            
            orderStatusSelect.prop('disabled', true);
            paymentStatusSelect.prop('disabled', true);
            
            $.ajax({
                url: `/donhang_chinhsua/${orderId}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    order_status: orderStatus,
                    payment_status: paymentStatus
                },
                success: function(response) {
                    if (response.success) {
                        orderStatusSelect.data('current-val', orderStatus);
                        paymentStatusSelect.data('current-val', paymentStatus);
                        showToast('Thành công', response.message, 'success');
                    } else {
                        orderStatusSelect.val(orderStatusSelect.data('current-val'));
                        paymentStatusSelect.val(paymentStatusSelect.data('current-val'));
                        updateSelectColor(orderStatusSelect[0]);
                        updateSelectColor(paymentStatusSelect[0]);
                        showToast('Lỗi', 'Không thể cập nhật trạng thái đơn hàng.', 'error');
                    }
                },
                error: function(err) {
                    orderStatusSelect.val(orderStatusSelect.data('current-val'));
                    paymentStatusSelect.val(paymentStatusSelect.data('current-val'));
                    updateSelectColor(orderStatusSelect[0]);
                    updateSelectColor(paymentStatusSelect[0]);
                    showToast('Lỗi', 'Có lỗi xảy ra kết nối máy chủ.', 'error');
                },
                complete: function() {
                    orderStatusSelect.prop('disabled', false);
                    paymentStatusSelect.prop('disabled', false);
                }
            });
        });

        function showToast(title, message, type = 'success') {
            let toastContainer = document.getElementById('toast-container');
            if (!toastContainer) {
                toastContainer = document.createElement('div');
                toastContainer.id = 'toast-container';
                toastContainer.style.position = 'fixed';
                toastContainer.style.top = '80px';
                toastContainer.style.right = '20px';
                toastContainer.style.zIndex = '9999';
                document.body.appendChild(toastContainer);
            }
            
            const toast = document.createElement('div');
            toast.className = `alert alert-${type === 'success' ? 'success' : 'danger'} shadow-lg show animate__animated animate__fadeInRight text-white`;
            toast.style.minWidth = '300px';
            toast.style.marginBottom = '10px';
            toast.style.backgroundColor = type === 'success' ? '#1cc88a' : '#e74a3b';
            toast.style.borderColor = type === 'success' ? '#1cc88a' : '#e74a3b';
            toast.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} mr-2" style="font-size: 1.2rem;"></i>
                    <div style="flex: 1;">
                        <strong class="text-white">${title}</strong>
                        <div class="small text-white-50">${message}</div>
                    </div>
                    <button type="button" class="close ml-auto text-white" style="opacity: 0.8; outline: none; background: transparent; border: none;" onclick="this.parentElement.parentElement.remove()">
                        <span>&times;</span>
                    </button>
                </div>
            `;
            
            toastContainer.appendChild(toast);
            
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.5s ease';
                setTimeout(() => toast.remove(), 500);
            }, 4000);
        }
    });
</script>
@endsection