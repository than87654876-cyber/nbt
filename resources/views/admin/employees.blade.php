@extends('layouts.admin')

@section('title', 'Quản lý Tài khoản nhân viên - FOODELICIOUS')

@section('styles')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tài khoản nhân viên</h1>
        <a class="btn btn-primary shadow-sm" href="{{ route('nhanvien_them') }}">
            <i class="fas fa-plus fa-sm"></i> Thêm nhân viên mới
        </a>
    </div>

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

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách tài khoản nhân viên hệ thống</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã NV</th>
                            <th>Họ và Tên</th>
                            <th>Chức vụ / Mô tả</th>
                            <th>Email</th>
                            <th>Quyền hạn</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td>NV-{{ sprintf('%03d', $employee->id) }}</td>
                            <td class="font-weight-bold">{{ $employee->fullname }}</td>
                            <td>{{ $employee->notes ?? 'Chưa ghi chú chức vụ' }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>
                                @if($employee->role === 'admin')
                                <span class="badge badge-danger px-2 py-1 font-weight-bold">Administrator</span>
                                @else
                                <span class="badge badge-primary px-2 py-1 font-weight-bold">Staff</span>
                                @endif
                            </td>
                            <td>
                                @if($employee->status)
                                <span class="badge badge-success px-2 py-1 font-weight-bold">Đang làm việc</span>
                                @else
                                <span class="badge badge-warning px-2 py-1 font-weight-bold text-dark">Tạm đình chỉ</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('nhanvien_xem', $employee->id) }}" class="btn btn-info btn-sm" title="Xem"><i class="fas fa-eye"></i> Xem</a>
                                <a href="{{ route('nhanvien_chinhsua', $employee->id) }}" class="btn btn-warning btn-sm" title="Sửa/Phân quyền"><i class="fas fa-edit"></i> Sửa</a>
                                
                                @if($employee->id !== auth()->id())
                                <form action="{{ route('nhanvien_xoa', $employee->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa tài khoản nhân viên này?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" title="Xóa tài khoản"><i class="fas fa-trash"></i> Xóa</button>
                                </form>
                                @endif
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