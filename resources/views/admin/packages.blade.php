@extends('layouts.admin')

@section('title', 'Quản lý Gói dịch vụ')

@section('styles')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="row justify-content-between px-2 py-3">
        <h1 class="h3 mb-2 text-gray-800">Gói dịch vụ</h1>
        <a class="btn btn-primary me-auto" href="{{ route('goidichvu_them') }}">
            <i class="fas fa-plus"></i> Thêm gói
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show text-dark mx-2" role="alert">
            <strong><i class="fas fa-check-circle mr-1"></i> Thành công:</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show text-dark mx-2" role="alert">
            <strong><i class="fas fa-exclamation-triangle mr-1"></i> Lỗi:</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách Gói Dịch Vụ</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Tên gói</th>
                            <th>Các món ăn</th>
                            <th>Ngày</th>
                            <th>Giá tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Tên gói</th>
                            <th>Các món ăn</th>
                            <th>Ngày</th>
                            <th>Giá tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse($packages as $index => $package)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="font-weight-bold text-primary">{{ $package->package_name }}</td>
                            <td>
                                {{ $package->dishes->pluck('dish_name')->implode(', ') ?: 'Chưa cấu hình món ăn' }}
                            </td>
                            <td>{{ $package->duration_days }} ngày</td>
                            <td class="text-danger font-weight-bold">{{ number_format($package->price, 0, ',', '.') }} đ</td>
                            <td>
                                <a href="{{ route('goidichvu_xem', $package->id) }}"
                                    class="btn btn-info btn-sm" title="Xem"><i
                                        class="fas fa-eye"></i> Xem</a>
                                <a href="{{ route('goidichvu_chinhsua', $package->id) }}"
                                    class="btn btn-warning btn-sm" title="Sửa"><i
                                        class="fas fa-edit"></i> Sửa</a>
                                <form action="{{ route('goidichvu_xoa', $package->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa gói dịch vụ này?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" title="Xóa"><i
                                        class="fas fa-trash"></i> Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Không có gói dịch vụ nào trong hệ thống.</td>
                        </tr>
                        @endforelse
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