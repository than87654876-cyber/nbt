@extends('layouts.admin')

@section('title', 'Quản lý Khách hàng - FOODELICIOUS')

@section('styles')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Filters Row -->
    <div class="mb-4">
        <div class="btn-group shadow-sm" role="group" aria-label="Customer Filters">
            <a href="{{ route('quanly_khachhang') }}" class="btn btn-sm btn-{{ !isset($filter) || !$filter ? 'primary font-weight-bold' : 'light text-dark' }}">
                Tất cả khách hàng
            </a>
            <a href="{{ route('quanly_khachhang', ['filter' => 'first_order']) }}" class="btn btn-sm btn-{{ isset($filter) && $filter === 'first_order' ? 'primary font-weight-bold' : 'light text-dark' }}">
                Đã đặt hàng
            </a>
            <a href="{{ route('quanly_khachhang', ['filter' => 'active_package']) }}" class="btn btn-sm btn-{{ isset($filter) && $filter === 'active_package' ? 'primary font-weight-bold' : 'light text-dark' }}">
                Đang dùng gói
            </a>
            <a href="{{ route('quanly_khachhang', ['filter' => 'refunded']) }}" class="btn btn-sm btn-{{ isset($filter) && $filter === 'refunded' ? 'primary font-weight-bold' : 'light text-dark' }}">
                Đã hoàn tiền
            </a>
            <a href="{{ route('quanly_khachhang', ['filter' => 'inactive_3m']) }}" class="btn btn-sm btn-{{ isset($filter) && $filter === 'inactive_3m' ? 'primary font-weight-bold' : 'light text-dark' }}">
                Không hoạt động >3 tháng
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách tài khoản khách hàng hệ thống</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã KH</th>
                            <th>Họ và Tên</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Hạng thành viên</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>KH-{{ sprintf('%03d', $customer->id) }}</td>
                            <td class="font-weight-bold">{{ $customer->fullname }}</td>
                            <td>{{ $customer->phone ?? 'Chưa cập nhật' }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                @if($customer->membership === 'diamond')
                                <span class="badge badge-danger p-2 font-weight-bold">Kim cương</span>
                                @elseif($customer->membership === 'gold')
                                <span class="badge badge-warning p-2 text-dark font-weight-bold">Vàng</span>
                                @elseif($customer->membership === 'silver')
                                <span class="badge badge-secondary p-2 font-weight-bold">Bạc</span>
                                @else
                                <span class="badge badge-light border p-2 text-dark">Đồng</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('khachhang_xem', $customer->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Xem
                                </a>
                                <a href="{{ route('khachhang_chinhsua', $customer->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <form action="{{ route('khachhang_xoa', $customer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa khách hàng này? Hành động này không thể hoàn tác.');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" title="Xóa tài khoản">
                                        <i class="fas fa-trash"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
@endsection