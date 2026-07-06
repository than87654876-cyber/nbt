@extends('layouts.admin')

@section('title', 'Cấu hình Trang chủ - FOODELICIOUS')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cấu hình Trang chủ</h1>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4 text-dark" role="alert">
        <strong><i class="fas fa-check-circle mr-1"></i> Thành công!</strong> {{ session('success') }}
        <button type="button" class="close" data-alert="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mb-4 text-dark" role="alert">
        <strong><i class="fas fa-exclamation-triangle mr-1"></i> Đã xảy ra lỗi:</strong>
        <ul class="mb-0 mt-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- Các Lối tắt Quản trị nhanh Thực đơn & Chương trình -->
    <div class="row mb-4">
        <!-- Thực đơn -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2 text-dark">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Quản lý thực đơn</div>
                            <div class="h6 mb-2 font-weight-bold text-gray-800">Món ăn & Danh mục</div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('quanly_monandon') }}" class="btn btn-sm btn-outline-danger mr-2"><i class="fas fa-utensils mr-1"></i> Món ăn</a>
                                <a href="{{ route('quanly_danhmuc') }}" class="btn btn-sm btn-outline-danger"><i class="fas fa-folder mr-1"></i> Danh mục</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-utensils fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chương trình gói -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 text-dark">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Quản lý chương trình</div>
                            <div class="h6 mb-2 font-weight-bold text-gray-800">Gói đăng ký & Dịch vụ</div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('quanly_goidichvu') }}" class="btn btn-sm btn-outline-success mr-2"><i class="fas fa-box mr-1"></i> Gói dịch vụ</a>
                                <a href="{{ route('quanly_goidangky') }}" class="btn btn-sm btn-outline-success"><i class="fas fa-users mr-1"></i> Gói khách đăng ký</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Khuyến mãi -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 text-dark">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Khuyến mãi & Sự kiện</div>
                            <div class="h6 mb-2 font-weight-bold text-gray-800">Mã giảm giá & Banner</div>
                            <div class="d-flex">
                                <a href="{{ route('quanly_khuyenmai') }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-percentage mr-1"></i> Sự kiện khuyến mãi</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('quanly_cauhinh.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <!-- Cột trái: Cấu hình Thương hiệu & Banner -->
            <div class="col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary text-white">
                        <h6 class="m-0 font-weight-bold"><i class="fas fa-image mr-1"></i> 1. Banner & Thương hiệu</h6>
                    </div>
                    <div class="card-body text-dark">
                        <!-- Tải lên Logo -->
                        <div class="form-group">
                            <label class="font-weight-bold">Ảnh Logo cửa hàng</label>
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ $settings['logo_url'] ?? asset('logo.jpg') }}" class="rounded-circle border mr-3 shadow-sm" width="60" height="60" style="object-fit: cover;">
                                <div>
                                    <input type="file" name="logo_image" class="form-control-file">
                                    <small class="text-muted">Định dạng hỗ trợ: jpg, png, jpeg. Tối đa: 2MB.</small>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Tiêu đề chính Banner -->
                        <div class="form-group">
                            <label for="banner_title" class="font-weight-bold">Tiêu đề chính Banner (Hero Title)</label>
                            <input type="text" class="form-control" id="banner_title" name="banner_title" 
                                value="{{ old('banner_title', $settings['banner_title'] ?? '') }}" required>
                        </div>

                        <!-- Tiêu đề phụ Banner -->
                        <div class="form-group">
                            <label for="banner_subtitle" class="font-weight-bold">Tiêu đề phụ Banner (Hero Subtitle)</label>
                            <textarea class="form-control" id="banner_subtitle" name="banner_subtitle" rows="2" required>{{ old('banner_subtitle', $settings['banner_subtitle'] ?? '') }}</textarea>
                        </div>

                        <!-- Ảnh Banner chính -->
                        <div class="form-group">
                            <label class="font-weight-bold">Ảnh minh họa Banner (Hero Image)</label>
                            <div class="d-flex align-items-start mb-2">
                                <img src="{{ $settings['banner_image'] ?? asset('client/assets/img/hero-img.png') }}" class="rounded border mr-3 shadow-sm" width="120" style="max-height: 100px; object-fit: contain;">
                                <div>
                                    <input type="file" name="banner_image" class="form-control-file">
                                    <small class="text-muted">Ảnh minh họa hiển thị ở góc phải banner. Tối đa: 2MB.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-info text-white">
                        <h6 class="m-0 font-weight-bold"><i class="fas fa-phone mr-1"></i> 2. Thông tin liên hệ</h6>
                    </div>
                    <div class="card-body text-dark">
                        <!-- Số điện thoại tư vấn -->
                        <div class="form-group">
                            <label for="contact_phone" class="font-weight-bold">Số điện thoại hotline/tư vấn</label>
                            <input type="text" class="form-control" id="contact_phone" name="contact_phone" 
                                value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" required>
                        </div>

                        <!-- Email liên hệ -->
                        <div class="form-group">
                            <label for="contact_email" class="font-weight-bold">Địa chỉ Email liên hệ</label>
                            <input type="email" class="form-control" id="contact_email" name="contact_email" 
                                value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" required>
                        </div>

                        <!-- Địa chỉ liên hệ -->
                        <div class="form-group">
                            <label for="contact_address" class="font-weight-bold">Địa chỉ văn phòng/cửa hàng</label>
                            <input type="text" class="form-control" id="contact_address" name="contact_address" 
                                value="{{ old('contact_address', $settings['contact_address'] ?? '') }}" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cột phải: Cấu hình Bản đồ số (Map) -->
            <div class="col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-success text-white">
                        <h6 class="m-0 font-weight-bold"><i class="fas fa-map-marked-alt mr-1"></i> 3. Bản đồ chỉ đường</h6>
                    </div>
                    <div class="card-body text-dark">
                        <!-- Google Maps Link -->
                        <div class="form-group">
                            <label for="map_embed_url" class="font-weight-bold">Đường dẫn Bản đồ Google Maps (Link chia sẻ)</label>
                            <textarea class="form-control" id="map_embed_url" name="map_embed_url" rows="4" 
                                placeholder="Hãy dán đường dẫn chia sẻ từ Google Maps tại đây (Ví dụ: https://maps.app.goo.gl/...)" required>{{ old('map_embed_url', $settings['map_original_url'] ?? $settings['map_embed_url'] ?? '') }}</textarea>
                            <small class="text-muted">Nhấn vào Chia sẻ trên Google Maps -> Sao chép liên kết (Link) và dán vào đây.</small>
                        </div>
                    </div>
                </div>

                <!-- Nút lưu cài đặt -->
                <div class="card shadow mb-4">
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-primary btn-lg btn-block shadow-sm">
                            <i class="fas fa-save mr-2"></i> Lưu cấu hình trang chủ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
