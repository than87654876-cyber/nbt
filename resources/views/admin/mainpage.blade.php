@extends('layouts.admin')

@section('title', 'Cấu hình Hệ thống - FOODELICIOUS')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cấu hình thông tin giao diện & Doanh nghiệp</h1>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data">
        <div class="row">
            <!-- CỘT TRÁI: HÌNH ẢNH & THƯƠNG HIỆU -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow mb-4 text-dark">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-image mr-1"></i>Hình ảnh & Logo</h6>
                    </div>
                    <div class="card-body text-center">
                        <!-- Logo hiện tại -->
                        <div class="form-group mb-4">
                            <label class="font-weight-bold d-block mb-2">Logo hiển thị</label>
                            <img src="{{ asset('logo.jpg') }}" class="img-thumbnail rounded-circle mb-3 shadow-sm" style="max-width: 120px; height: 120px; object-fit: cover;">
                            <div class="custom-file text-left">
                                <input type="file" class="custom-file-input" id="logoUpload" name="logo">
                                <label class="custom-file-label" for="logoUpload">Chọn ảnh logo mới...</label>
                            </div>
                        </div>

                        <hr>

                        <!-- Banner Hero hiện tại -->
                        <div class="form-group mt-3 text-left">
                            <label class="font-weight-bold d-block text-center mb-2">Hình ảnh Banner chính (Hero Section)</label>
                            <img src="{{ asset('client/assets/img/hero-img.png') }}" class="img-fluid rounded mb-3 border bg-light p-2" style="max-height: 150px; width: 100%; object-fit: contain;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="bannerUpload" name="hero_banner">
                                <label class="custom-file-label" for="bannerUpload">Thay đổi ảnh banner...</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CỘT PHẢI: THÔNG TIN LIÊN HỆ, TIỂU SỬ & CHỈ SỐ DOANH SỐ -->
            <div class="col-lg-8 mb-4">
                <!-- PHÂN HỆ MỚI: BỔ SUNG TIỂU SỬ & CÁC CHỈ SỐ HIỂN THỊ -->
                <div class="card shadow mb-4 text-dark border-left-primary">
                    <div class="card-header py-3 bg-light">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-chart-line mr-1"></i>Tiểu sử & Chỉ số doanh số hiển thị công khai</h6>
                    </div>
                    <div class="card-body">
                        <!-- Tiểu sử doanh nghiệp (Hiển thị tại Section About Us) -->
                        <div class="form-group mb-4">
                            <label for="company_bio" class="font-weight-bold">Tiểu sử / Lời giới thiệu doanh nghiệp <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="company_bio" name="bio" rows="4" placeholder="Nhập lời giới thiệu tổng quan về nhà hàng..." required>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Hệ thống thực phẩm FOODELICIOUS cam kết mang đến những bữa ăn an toàn, nhanh chóng và giàu dinh dưỡng nhất cho quý khách hàng.</textarea>
                        </div>

                        <!-- Cấu hình các con số hiển thị (Section Stats - Counters) -->
                        <label class="font-weight-bold small text-muted d-block mb-2">Cấu hình các số liệu thống kê (Hiển thị dạng bộ đếm ở trang chủ)</label>
                        <div class="row">
                            <!-- Số lượng khách hàng -->
                            <div class="form-group col-md-3 col-6">
                                <label for="stat_clients" class="small font-weight-bold text-secondary">Số Khách hàng (Clients)</label>
                                <input type="number" class="form-control form-control-sm font-weight-bold text-center" id="stat_clients" name="stat_clients" value="232" min="0">
                            </div>
                            <!-- Số lượng dự án/đơn hàng lớn -->
                            <div class="form-group col-md-3 col-6">
                                <label for="stat_projects" class="small font-weight-bold text-secondary">Số Dự án (Projects)</label>
                                <input type="number" class="form-control form-control-sm font-weight-bold text-center" id="stat_projects" name="stat_projects" value="521" min="0">
                            </div>
                            <!-- Tổng giờ hỗ trợ -->
                            <div class="form-group col-md-3 col-6">
                                <label for="stat_hours" class="small font-weight-bold text-secondary">Giờ hỗ trợ (Support)</label>
                                <input type="number" class="form-control form-control-sm font-weight-bold text-center" id="stat_hours" name="stat_hours" value="1453" min="0">
                            </div>
                            <!-- Số nhân sự/đầu bếp -->
                            <div class="form-group col-md-3 col-6">
                                <label for="stat_workers" class="small font-weight-bold text-secondary">Đầu bếp/Nhân sự (Workers)</label>
                                <input type="number" class="form-control form-control-sm font-weight-bold text-center" id="stat_workers" name="stat_workers" value="32" min="0">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD THÔNG TIN LIÊN HỆ CÔNG KHAI -->
                <div class="card shadow mb-4 text-dark">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-address-card mr-1"></i>Thông tin liên hệ công khai</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="company_phone" class="font-weight-bold">Số điện thoại tư vấn <span class="text-danger">*</span></label>
                                <input type="text" class="form-control font-weight-bold" id="company_phone" name="phone" value="+1 5589 55488 55" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="company_email" class="font-weight-bold">Địa chỉ Email doanh nghiệp <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="company_email" name="email" value="info@example.com" required>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label for="company_address" class="font-weight-bold">Địa chỉ trụ sở chính <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="company_address" name="address" value="Tầng 12, Tòa nhà Saigon Innovation Tower, 154 Nguyễn Thị Minh Khai, Phường Võ Thị Sáu, Quận 3, TP. Hồ Chí Minh." required>
                        </div>
                    </div>
                </div>

                <!-- CARD THÔNG TIN TÀI CHÍNH ẨN -->
                <div class="card shadow mb-4 border-left-danger text-dark">
                    <div class="card-header py-3 bg-light">
                        <h6 class="m-0 font-weight-bold text-danger"><i class="bi bi-shield-lock-fill mr-1"></i>Thông tin cấu hình tài khoản (Ẩn nội bộ)</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="bank_name" class="font-weight-bold small text-secondary">Tên Ngân hàng đối tác</label>
                                <input type="text" class="form-control form-control-sm font-weight-bold" id="bank_name" name="bank_name" value="Vietcombank (VCB)">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bank_account" class="font-weight-bold small text-secondary">Số tài khoản nhận tiền</label>
                                <input type="text" class="form-control form-control-sm font-weight-bold" id="bank_account" name="bank_account" value="1029384756321">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bank_user" class="font-weight-bold small text-secondary">Tên đại diện thụ hưởng</label>
                                <input type="text" class="form-control form-control-sm text-uppercase font-weight-bold" id="bank_user" name="bank_user" value="CONG TY TNHH FOODELICIOUS">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 mb-0">
                                <label for="momo_merchant_id" class="font-weight-bold small text-secondary">Momo Merchant ID (Cổng API)</label>
                                <input type="password" class="form-control form-control-sm font-weight-bold" id="momo_merchant_id" name="momo_id" value="MOMO_MID_2026_SAMPLE_SECURE_KEY">
                            </div>
                            <div class="form-group col-md-6 mb-0">
                                <label for="momo_phone_backup" class="font-weight-bold small text-secondary">Số điện thoại MoMo (Nhận thủ công)</label>
                                <input type="text" class="form-control form-control-sm" id="momo_phone_backup" name="momo_phone" value="0901234567">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- HÀNH ĐỘNG FORM -->
        <div class="row mb-5 px-3">
            <button type="submit" class="btn btn-primary shadow-sm px-5 fw-bold py-2"><i class="fas fa-save mr-2"></i>Lưu cấu hình hệ thống</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection