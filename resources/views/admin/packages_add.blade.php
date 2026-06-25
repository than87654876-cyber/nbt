@extends('layouts.admin')

@section('title', 'Thêm gói dịch vụ mới - FOODELICIOUS')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800">Thêm gói dịch vụ mới</h1>
        <a href="{{ route('quanly_goidichvu') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-undo fa-sm"></i> Hủy và Quay lại
        </a>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Biểu mẫu thêm gói mới</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="font-weight-bold text-dark">Mã định danh gói (ID)</label>
                                <input type="text" class="form-control bg-light" value="#PKG-2026" readonly>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="combo_name" class="font-weight-bold text-dark">Tên gói món ăn <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="combo_name" name="combo_name" placeholder="Ví dụ: Gói cơm văn phòng tuần" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="created_at" class="font-weight-bold text-dark">Ngày tạo gói</label>
                                <input type="date" class="form-control" id="created_at" name="created_at" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="combo_price" class="font-weight-bold text-dark">Giá gói tích hợp (vnđ) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control text-danger font-weight-bold" id="combo_price" name="combo_price" placeholder="Nhập số tiền" required min="0">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="status" class="font-weight-bold text-dark">Trạng thái áp dụng</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="active" selected>Đang kích hoạt (Active)</option>
                                    <option value="inactive">Tạm ngưng (Inactive)</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="combo_image" class="font-weight-bold text-dark">Hình ảnh gói món ăn</label>
                                <input type="file" class="form-control-file mb-1" id="combo_image" name="combo_image" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-tasks mr-2"></i>Cấu hình danh sách món ăn trong gói</h6>
                    </div>
                    <div class="input-group p-2">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small">* Tích chọn vào ô đầu dòng để thêm món ăn vào gói và cập nhật số lượng tương ứng.</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-dark">
                                <thead class="bg-light">
                                    <tr>
                                        <th style="width: 8%" class="text-center">Chọn</th>
                                        <th style="width: 12%">Hình ảnh</th>
                                        <th style="width: 40%">Tên món ăn đơn</th>
                                        <th style="width: 20%">Giá gốc lẻ</th>
                                        <th style="width: 20%">Số lượng trong gói</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <input type="checkbox" name="dishes[]" value="1" style="width: 18px; height: 18px;" checked>
                                        </td>
                                        <td>
                                            <img src="{{ asset('logo.jpg') }}" alt="Món 1" class="img-thumbnail" style="max-height: 45px;">
                                        </td>
                                        <td class="align-middle font-weight-bold">Cơm tấm sườn bì chả</td>
                                        <td class="align-middle text-secondary">45.000 vnđ</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm" name="quantity[1]" value="1" min="1" style="max-width: 100px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <input type="checkbox" name="dishes[]" value="2" style="width: 18px; height: 18px;" checked>
                                        </td>
                                        <td>
                                            <img src="{{ asset('logo.jpg') }}" alt="Món 2" class="img-thumbnail" style="max-height: 45px;">
                                        </td>
                                        <td class="align-middle font-weight-bold">Cà phê sữa đá pha phin</td>
                                        <td class="align-middle text-secondary">29.000 vnđ</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm" name="quantity[2]" value="1" min="1" style="max-width: 100px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <input type="checkbox" name="dishes[]" value="3" style="width: 18px; height: 18px;" checked>
                                        </td>
                                        <td>
                                            <img src="{{ asset('logo.jpg') }}" alt="Món 3" class="img-thumbnail" style="max-height: 45px;">
                                        </td>
                                        <td class="align-middle font-weight-bold">Canh khổ qua thác lác đi kèm</td>
                                        <td class="align-middle text-secondary">20.000 vnđ</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm" name="quantity[3]" value="1" min="1" style="max-width: 100px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <input type="checkbox" name="dishes[]" value="4" style="width: 18px; height: 18px;">
                                        </td>
                                        <td>
                                            <img src="{{ asset('logo.jpg') }}" alt="Món 4" class="img-thumbnail" style="max-height: 45px;">
                                        </td>
                                        <td class="align-middle text-muted">Trà đào sả cam miếng lớn</td>
                                        <td class="align-middle text-secondary">35.000 vnđ</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm" name="quantity[4]" value="0" min="0" style="max-width: 100px;">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr>
                        <div class="d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary shadow-sm px-4 mr-2">
                                <i class="fas fa-save fa-sm mr-1"></i> Thêm gói
                            </button>
                            <a href="{{ route('quanly_goidichvu') }}" class="btn btn-secondary shadow-sm px-3">Hủy bỏ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection