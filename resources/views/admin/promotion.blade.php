@extends('layouts.admin')

@section('title', 'Quản lý Chương trình khuyến mãi')

@section('styles')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4 text-dark" role="alert">
        <strong><i class="fas fa-check-circle mr-1"></i> Thành công!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-4 text-dark" role="alert">
        <strong><i class="fas fa-exclamation-triangle mr-1"></i> Lỗi!</strong> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- Page Heading -->
    <div class="row justify-content-between px-2 py-3">
        <h1 class="h3 mb-2 text-gray-800">Chương trình khuyến mãi</h1>
        <a class="btn btn-primary me-auto" href="{{ route('khuyenmai_them') }}">
            <i class="fas fa-plus"></i> Thêm chương trình
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách Chương Trình Khuyến Mãi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Tên chương trình</th>
                            <th>Điều kiện</th>
                            <th>Khuyến mãi</th>
                            <th>Thời hạn</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Tên chương trình</th>
                            <th>Điều kiện</th>
                            <th>Khuyến mãi</th>
                            <th>Thời hạn</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($promotions as $index => $promo)
                        <tr class="text-dark">
                            <td>{{ $index + 1 }}</td>
                            <td class="font-weight-bold text-primary">{{ $promo->coupon_code }}</td>
                            <td>Đơn tối thiểu: {{ number_format($promo->min_order_value, 0, ',', '.') }} đ</td>
                            <td>
                                <span class="badge badge-success font-weight-bold p-2">
                                    {{ $promo->discount_type === 'percent' ? 'Giảm ' . number_format($promo->discount_value, 0, ',', '.') . '%' : 'Giảm ' . number_format($promo->discount_value, 0, ',', '.') . ' đ' }}
                                </span>
                            </td>
                            <td>{{ $promo->start_date->format('d/m/Y') }} - {{ $promo->end_date->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('khuyenmai_xem', $promo->id) }}"
                                    class="btn btn-info btn-sm" title="Xem"><i
                                        class="fas fa-eye"></i> Xem</a>
                                <a href="{{ route('khuyenmai_chinhsua', $promo->id) }}"
                                    class="btn btn-warning btn-sm" title="Sửa"><i
                                        class="fas fa-edit"></i> Sửa</a>
                                <form action="{{ route('khuyenmai_xoa', $promo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" title="Xóa"><i
                                        class="fas fa-trash"></i> Xóa</button>
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