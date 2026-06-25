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
                        <tr>
                            <td>1</td>
                            <td>Gói Gia Đình Hàng Ngày</td>
                            <td>Phở Bò, Bánh Mì Thịt, Cơm Tấm</td>
                            <td>30 ngày</td>
                            <td>1,500,000 đ</td>
                            <td>
                                <a href="{{ route('goidichvu_xem') }}"
                                    class="btn btn-info btn-sm" title="Xem"><i
                                        class="fas fa-eye"></i> Xem</a>
                                <a href="{{ route('goidichvu_chinhsua') }}"
                                    class="btn btn-warning btn-sm" title="Sửa"><i
                                        class="fas fa-edit"></i> Sửa</a>
                                <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                        class="fas fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Gói Công Ty Tuần</td>
                            <td>Bánh Chưng, Mì Kỵ, Hủ Tiếu, Cơm Gà</td>
                            <td>7 ngày</td>
                            <td>420,000 đ</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                        class="fas fa-eye"></i> Xem</a>
                                <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                        class="fas fa-edit"></i> Sửa</a>
                                <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                        class="fas fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Gói Tiệc Cơm Trưa</td>
                            <td>Cơm Chiên Dương Châu, Bánh Quai Vạc, Xôi Gà</td>
                            <td>14 ngày</td>
                            <td>840,000 đ</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                        class="fas fa-eye"></i> Xem</a>
                                <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                        class="fas fa-edit"></i> Sửa</a>
                                <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                        class="fas fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Gói Ăn Chiều Tối</td>
                            <td>Cháo Gà, Bánh Dầy, Cơm Lươn</td>
                            <td>10 ngày</td>
                            <td>600,000 đ</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                        class="fas fa-eye"></i> Xem</a>
                                <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                        class="fas fa-edit"></i> Sửa</a>
                                <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                        class="fas fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Gói Ngoại Catering</td>
                            <td>Bánh Mì Pâté, Cơm Cà Chua Trứng, Bánh Bao, Cháo Thịt Bò</td>
                            <td>Linh hoạt</td>
                            <td>2,000,000 đ</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm" title="Xem"><i
                                        class="fas fa-eye"></i> Xem</a>
                                <a href="#" class="btn btn-warning btn-sm" title="Sửa"><i
                                        class="fas fa-edit"></i> Sửa</a>
                                <a href="#" class="btn btn-danger btn-sm" title="Xóa"><i
                                        class="fas fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
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