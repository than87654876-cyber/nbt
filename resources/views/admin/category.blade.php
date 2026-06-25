@extends('layouts.admin')

@section('title', 'Quản lý Danh mục - FOODELICIOUS')

@section('content')
<div class="row justify-content-between px-2 py-3">
    <h1 class="h3 mb-2 text-gray-800">Danh mục món ăn</h1>
    <a class="btn btn-primary me-auto" href="{{ route('danhmuc_them') }}">
        <i class="fas fa-plus"></i> Thêm danh mục
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách phân loại danh mục</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 80px;">STT</th>
                        <th>Tên danh mục</th>
                        <th>Số lượng món ăn</th>
                        <th>Miêu tả tóm tắt</th>
                        <th style="width: 250px;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="font-weight-bold text-primary">{{ $category->category_name }}</td>
                        <td class="text-center font-weight-bold">{{ $category->dishes_count }} món</td>
                        <td>{{ $category->description ?? 'Chưa có miêu tả' }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('danhmuc_xem', $category->id) }}" class="btn btn-info btn-sm mr-2">
                                    <i class="fas fa-eye"></i> Xem
                                </a>
                                <a href="{{ route('danhmuc_chinhsua', $category->id) }}" class="btn btn-warning btn-sm mr-2">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <form action="{{ route('danhmuc_xoa', $category->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Xóa
                                    </button>
                                </form>
                            </div>
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