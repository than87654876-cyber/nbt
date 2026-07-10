@extends('layouts.admin')

@section('title', 'Quản lý Món ăn đơn - FOODELICIOUS')

@section('content')
<div class="row justify-content-between px-2 py-3">
    <h1 class="h3 mb-2 text-gray-800">
        @if($categoryId == 1)
            Danh sách Món ăn sáng
        @elseif($categoryId == 2)
            Danh sách Món tráng miệng
        @else
            Danh sách Món ăn đơn
        @endif
    </h1>
    <a class="btn btn-primary me-auto" href="{{ route('monandon_them', ['category_id' => $categoryId]) }}">
        <i class="fas fa-plus"></i> Thêm @if($categoryId == 1) món ăn sáng @elseif($categoryId == 2) món tráng miệng @else món ăn @endif mới
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

<div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            @if($categoryId == 1)
                Danh sách các món ăn sáng
            @elseif($categoryId == 2)
                Danh sách các món tráng miệng
            @else
                Danh sách các món ăn đơn lẻ
            @endif
        </h6>
        
        <!-- Filter Form -->
        <form method="GET" action="{{ route('quanly_monandon') }}" class="form-inline mt-2 mt-sm-0">
            <input type="hidden" name="category_id" value="{{ $categoryId }}">
            <div class="input-group input-group-sm">
                <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Tìm tên món..." value="{{ $search }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 80px;">STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên món ăn</th>
                        <th>Danh mục</th>
                        <th>Giá bán</th>
                        <th>Trạng thái</th>
                        <th style="width: 250px;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dishes as $index => $dish)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($dish->image_url)
                                <img src="{{ Str::startsWith($dish->image_url, 'http') ? $dish->image_url : asset($dish->image_url) }}" alt="{{ $dish->dish_name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                            @else
                                <span class="text-muted">Không có ảnh</span>
                            @endif
                        </td>
                        <td class="font-weight-bold text-primary">{{ $dish->dish_name }}</td>
                        <td>{{ $dish->category->category_name }}</td>
                        <td class="font-weight-bold text-danger">{{ number_format($dish->price, 0, ',', '.') }} đ</td>
                        <td>
                            @if($dish->is_available)
                                <span class="badge badge-success">Đang bán</span>
                            @else
                                <span class="badge badge-secondary">Tạm ngưng</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('monandon_xem', $dish->id) }}" class="btn btn-info btn-sm mr-2">
                                    <i class="fas fa-eye"></i> Xem
                                </a>
                                <a href="{{ route('monandon_chinhsua', $dish->id) }}" class="btn btn-warning btn-sm mr-2">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <form action="{{ route('monandon_xoa', $dish->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa món ăn này?');" style="display:inline-block;">
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