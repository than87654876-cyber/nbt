@extends('layouts.admin')

@section('title', 'Chi tiết đơn hàng - FOODELICIOUS')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800">Chi tiết hóa đơn #FDL-{{ $order->id }}</h1>
        <a href="{{ route('quanly_donhang') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Quay lại danh sách
        </a>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-truck mr-2"></i>Thông tin giao nhận & Thanh toán
                    </h6>
                </div>
                <div class="card-body text-dark">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th style="width: 35%">Khách hàng đặt:</th>
                                <td>{{ $order->user->fullname ?? 'Khách vãng lai' }} (Mã thành viên: KH-{{ $order->user_id ?? 'N/A' }})</td>
                            </tr>
                            <tr>
                                <th>Số điện thoại:</th>
                                <td class="font-weight-bold">{{ $order->user->phone ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Địa chỉ giao hàng & Ghi chú:</th>
                                <td style="white-space: pre-line;">{{ $order->health_notes }}</td>
                            </tr>
                            <tr>
                                <th>Phương thức thanh toán:</th>
                                <td>
                                    @php
                                        $paymentMethodText = 'COD (Tiền mặt)';
                                        if ($order->payment_method === 'bank_transfer') {
                                            $paymentMethodText = 'Chuyển khoản ATM';
                                        } elseif ($order->payment_method === 'momo') {
                                            $paymentMethodText = 'Ví điện tử MoMo';
                                        }
                                    @endphp
                                    <span class="badge badge-primary">{{ $paymentMethodText }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Ngày đặt hàng:</th>
                                <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-receipt mr-2"></i>Sản phẩm thực tế trong đơn
                    </h6>
                    <a href="{{ route('donhang_chinhsua', $order->id) }}" class="btn btn-sm btn-warning shadow-sm">
                        <i class="fas fa-edit fa-sm"></i> Sửa trạng thái
                    </a>
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
                            @foreach($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->dish->dish_name ?? 'Món ăn không tồn tại' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->price, 0, ',', '.') }} đ</td>
                                    <td class="font-weight-bold">{{ number_format($item->price * $item->quantity, 0, ',', '.') }} đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="p-3 bg-light rounded text-right">
                        <div class="mb-1">Trạng thái xử lý: 
                            @if($order->order_status === 'pending')
                                <span class="badge bg-secondary text-white font-weight-bold">Chờ xác nhận</span>
                            @elseif($order->order_status === 'confirmed')
                                <span class="badge bg-info text-white font-weight-bold">Đã xác nhận</span>
                            @elseif($order->order_status === 'preparing')
                                <span class="badge bg-warning text-dark font-weight-bold">Đang chuẩn bị</span>
                            @elseif($order->order_status === 'delivering')
                                <span class="badge bg-primary text-white font-weight-bold">Đang giao hàng</span>
                            @elseif($order->order_status === 'completed')
                                <span class="badge bg-success text-white font-weight-bold">Đã hoàn thành</span>
                            @elseif($order->order_status === 'cancelled')
                                <span class="badge bg-danger text-white font-weight-bold">Đã hủy</span>
                            @endif
                        </div>
                        <div class="mb-2">Trạng thái dòng tiền: 
                            @if($order->payment_status === 'pending')
                                <span class="badge bg-warning text-dark font-weight-bold">Chờ thanh toán</span>
                            @elseif($order->payment_status === 'paid')
                                <span class="badge bg-success text-white font-weight-bold">Đã nhận tiền</span>
                            @elseif($order->payment_status === 'failed')
                                <span class="badge bg-danger text-white font-weight-bold">Thất bại</span>
                            @elseif($order->payment_status === 'refunded')
                                <span class="badge bg-dark text-white font-weight-bold">Đã hoàn tiền</span>
                            @endif
                        </div>
                        <h4 class="font-weight-bold text-danger mb-0">Tổng cộng: {{ number_format($order->final_amount, 0, ',', '.') }} đ</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection