@extends('layouts.admin')

@section('title', 'Bàn làm việc Nhân viên - FOODELICIOUS')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800 font-weight-bold">Bàn làm việc Nhân viên</h1>
            <p class="text-muted mb-0">Hệ thống phân phối và xử lý nghiệp vụ vận hành hàng ngày</p>
        </div>
        <div class="text-secondary small font-weight-bold bg-white px-3 py-2 rounded shadow-sm">
            <i class="fas fa-calendar-alt text-danger mr-2"></i> Ngày làm việc: {{ \Carbon\Carbon::parse($todayStr)->format('d/m/Y') }}
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($errors->has('role'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm font-weight-bold" role="alert">
            <i class="fas fa-exclamation-triangle mr-2"></i> {{ $errors->first('role') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Main Workspace Sections -->
    <div class="row">
        <!-- 🍳 BỘ PHẬN NHÀ BẾP -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow border-left-danger h-100">
                <div class="card-header py-3 bg-gradient-danger d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-utensils mr-2"></i>🍳 BỘ PHẬN NHÀ BẾP</h6>
                    <span class="badge badge-light text-danger font-weight-bold px-3 py-2" style="font-size: 0.85rem;">
                        {{ $kitchenTotal }} món cần nấu
                    </span>
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <p class="text-muted small mb-4">Nhà bếp chuẩn bị món ăn trong ngày theo thực đơn đặt trước từ khách lẻ và khách đăng ký gói dài hạn.</p>
                        
                        <div class="list-group list-group-flush mb-4">
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-3 border-bottom">
                                <div>
                                    <h6 class="mb-0 font-weight-bold text-dark">Món ăn cho Đơn lẻ</h6>
                                    <small class="text-muted">Các đơn hàng lẻ đã xác nhận</small>
                                </div>
                                <span class="badge badge-pill badge-danger font-weight-bold px-2 py-1">{{ $kitchenSingleQty }} phần</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-3 border-bottom">
                                <div>
                                    <h6 class="mb-0 font-weight-bold text-dark">Món ăn cho Gói dịch vụ</h6>
                                    <small class="text-muted">Lịch giao gói ăn ngày hôm nay</small>
                                </div>
                                <span class="badge badge-pill badge-warning text-dark font-weight-bold px-2 py-1">{{ $kitchenSubQty }} phần</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('quanly_bep') }}" class="btn btn-danger btn-block py-2 font-weight-bold shadow-sm">
                        <i class="fas fa-clipboard-list mr-2"></i>Xem bảng chuẩn bị món
                    </a>
                </div>
            </div>
        </div>

        <!-- 📞 BỘ PHẬN CHĂM SÓC KHÁCH HÀNG (CSKH) -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow border-left-primary h-100">
                <div class="card-header py-3 bg-gradient-primary d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-headset mr-2"></i>📞 DỊCH VỤ KHÁCH HÀNG</h6>
                    <span class="badge badge-light text-primary font-weight-bold px-3 py-2" style="font-size: 0.85rem;">
                        {{ $cskhPendingOrders + $cskhPendingRefunds }} việc cần làm
                    </span>
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <p class="text-muted small mb-4">Xác nhận các đơn hàng mới đặt từ khách hàng và tiếp nhận xử lý yêu cầu hoàn tiền.</p>
                        
                        <div class="list-group list-group-flush mb-4">
                            <a href="{{ route('quanly_donhang', ['status' => 'pending']) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-3 border-bottom">
                                <div>
                                    <h6 class="mb-0 font-weight-bold text-dark">Xác nhận đơn mới</h6>
                                    <small class="text-muted">Đơn hàng mới chờ duyệt</small>
                                </div>
                                <span class="badge badge-pill badge-primary font-weight-bold px-2 py-1">{{ $cskhPendingOrders }} đơn</span>
                            </a>
                            <a href="{{ route('quanly_yeucauhoan') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-3 border-bottom">
                                <div>
                                    <h6 class="mb-0 font-weight-bold text-dark">Yêu cầu hoàn tiền</h6>
                                    <small class="text-muted">Khách hàng yêu cầu hủy/hoàn tiền</small>
                                </div>
                                <span class="badge badge-pill badge-warning text-dark font-weight-bold px-2 py-1">{{ $cskhPendingRefunds }} yêu cầu</span>
                            </a>
                        </div>
                    </div>

                    <div class="row no-gutters gap-2">
                        <div class="col-6 pr-1">
                            <a href="{{ route('quanly_donhang', ['status' => 'pending']) }}" class="btn btn-outline-primary btn-block py-2 font-weight-bold shadow-sm" style="font-size: 0.85rem;">
                                <i class="fas fa-check mr-1"></i>Duyệt đơn mới
                            </a>
                        </div>
                        <div class="col-6 pl-1">
                            <a href="{{ route('quanly_yeucauhoan') }}" class="btn btn-primary btn-block py-2 font-weight-bold shadow-sm" style="font-size: 0.85rem;">
                                <i class="fas fa-undo-alt mr-1"></i>Giải quyết hoàn
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 🛵 BỘ PHẬN VẬN CHUYỂN & SHIPPER -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow border-left-success h-100">
                <div class="card-header py-3 bg-gradient-success d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-shipping-fast mr-2"></i>🛵 VẬN CHUYỂN & SHIPPER</h6>
                    <span class="badge badge-light text-success font-weight-bold px-3 py-2" style="font-size: 0.85rem;">
                        {{ $shipperDeliveringOrders }} đang giao
                    </span>
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <p class="text-muted small mb-4">Điều phối lịch trình giao các gói ăn ngày hôm nay và cập nhật trạng thái vận đơn đang trên đường giao lẻ.</p>
                        
                        <div class="list-group list-group-flush mb-4">
                            <a href="{{ route('quanly_donhang', ['status' => 'delivering']) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-3 border-bottom">
                                <div>
                                    <h6 class="mb-0 font-weight-bold text-dark">Shipper đang giao lẻ</h6>
                                    <small class="text-muted">Đơn lẻ đang vận chuyển</small>
                                </div>
                                <span class="badge badge-pill badge-success font-weight-bold px-2 py-1">{{ $shipperDeliveringOrders }} đơn</span>
                            </a>
                            <a href="{{ route('quanly_goidangky') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-3 border-bottom">
                                <div>
                                    <h6 class="mb-0 font-weight-bold text-dark">Điều phối gói ăn ngày</h6>
                                    <small class="text-muted">Tổng số lịch giao hôm nay</small>
                                </div>
                                <span class="badge badge-pill badge-info font-weight-bold px-2 py-1">{{ $shipperSubDispatches }} lượt giao</span>
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('quanly_goidangky') }}" class="btn btn-success btn-block py-2 font-weight-bold shadow-sm">
                        <i class="fas fa-truck mr-2"></i>Điều phối lịch giao hàng
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
