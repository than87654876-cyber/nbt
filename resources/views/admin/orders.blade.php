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
                                    @if($order->payment_status === 'pending')
                                        <span class="badge badge-secondary">Chưa thanh toán ({{ $paymentMethodText }})</span>
                                    @elseif($order->payment_status === 'paid')
                                        <span class="badge badge-success">Đã thanh toán ({{ $paymentMethodText }})</span>
                                    @elseif($order->payment_status === 'failed')
                                        <span class="badge badge-danger">Thất bại ({{ $paymentMethodText }})</span>
                                    @elseif($order->payment_status === 'refunded')
                                        <span class="badge badge-dark text-white">Đã hoàn tiền ({{ $paymentMethodText }})</span>
                                    @endif
                                </td>
                                <td>
                                    @if($order->order_status === 'pending')
                                        <span class="badge badge-secondary">Chờ xác nhận</span>
                                    @elseif($order->order_status === 'confirmed')
                                        <span class="badge badge-info text-white">Đã xác nhận</span>
                                    @elseif($order->order_status === 'preparing')
                                        <span class="badge badge-warning text-dark">Đang chuẩn bị</span>
                                    @elseif($order->order_status === 'delivering')
                                        <span class="badge badge-primary text-white">Đang giao hàng</span>
                                    @elseif($order->order_status === 'completed')
                                        <span class="badge badge-success">Đã hoàn thành</span>
                                    @elseif($order->order_status === 'cancelled')
                                        <span class="badge badge-danger text-white">Đã hủy</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('donhang_xem', $order->id) }}" class="btn btn-info btn-sm"
                                        title="Xem chi tiết"><i class="fas fa-eye"></i> Xem</a>
                                    <a href="{{ route('donhang_chinhsua', $order->id) }}"
                                        class="btn btn-warning btn-sm"
                                        title="Cập nhật trạng thái"><i class="fas fa-edit"></i> Sửa</a>
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