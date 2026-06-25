@extends('layouts.admin')

@section('title', 'Chi tiết gói món ăn - FOODELICIOUS')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800">Chi tiết gói món ăn</h1>
        <a href="{{ route('quanly_goidichvu') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Quay lại danh sách gói
        </a>
    </div>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hình ảnh gói món ăn</h6>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('logo.jpg') }}" alt="Hình ảnh gói món ăn" class="img-fluid rounded shadow-sm"
                        style="max-height: 250px; width: 100%; object-fit: cover;">
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin tổng quan gói</h6>
                    <a href="{{ route('goidichvu_chinhsua') }}" class="btn btn-sm btn-warning shadow-sm">
                        <i class="fas fa-edit fa-sm"></i> Chỉnh sửa gói
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-dark mb-0">
                        <tbody>
                            <tr>
                                <th style="width: 30%">Mã định danh gói (ID):</th>
                                <td class="font-weight-bold">#PKG-2026</td>
                            </tr>
                            <tr>
                                <th>Tên gói món ăn:</th>
                                <td class="font-weight-bold text-primary">Combo Tiết Kiệm Sáng - Trưa</td>
                            </tr>
                            <tr>
                                <th>Ngày tạo gói:</th>
                                <td>15/06/2026</td>
                            </tr>
                            <tr>
                                <th>Giá gói tích hợp:</th>
                                <td class="text-danger font-weight-bold fs-5">89.000 vnđ</td>
                            </tr>
                            <tr>
                                <th>Trạng thái áp dụng:</th>
                                <td>
                                    <span class="badge badge-success">Đang kích hoạt</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-utensils mr-2"></i>Các món ăn có trong gói này</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped text-dark">
                            <thead class="bg-light">
                                <tr>
                                    <th style="width: 10%">STT</th>
                                    <th style="width: 15%">Hình ảnh</th>
                                    <th style="width: 35%">Tên món ăn thành phần</th>
                                    <th style="width: 20%">Số lượng trong gói</th>
                                    <th style="width: 20%">Giá gốc (Bán đơn)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <img src="{{ asset('logo.jpg') }}" alt="Món 1" class="img-thumbnail" style="max-height: 50px;">
                                    </td>
                                    <td class="font-weight-bold text-secondary">Cơm tấm sườn bì chả</td>
                                    <td>1 phần</td>
                                    <td>45.000 vnđ</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <img src="{{ asset('logo.jpg') }}" alt="Món 2" class="img-thumbnail" style="max-height: 50px;">
                                    </td>
                                    <td class="font-weight-bold text-secondary">Cà phê sữa đá pha phin</td>
                                    <td>1 ly</td>
                                    <td>29.000 vnđ</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <img src="{{ asset('logo.jpg') }}" alt="Món 3" class="img-thumbnail" style="max-height: 50px;">
                                    </td>
                                    <td class="font-weight-bold text-secondary">Canh khổ qua thác lác đi kèm</td>
                                    <td>1 chén</td>
                                    <td>20.000 vnđ</td>
                                </tr>
                            </tbody>
                            <tfoot class="font-weight-bold bg-gray-100">
                                <tr>
                                    <td colspan="3" class="text-right">Tổng giá trị thực tế (Nếu mua lẻ):</td>
                                    <td colspan="2" class="text-danger">94.000 vnđ (Tiết kiệm được 5.000 vnđ)</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection