<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Gói dịch vụ của tôi - FOODELICIOUS</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('logo.jpg') }}" rel="icon">
    <link href="{{ asset('client/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('client/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/css/main.css') }}" rel="stylesheet">

    <style>
        .cart-container {
            min-height: 70vh;
            padding: 40px 0;
        }

        .order-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .order-header {
            border-bottom: 2px solid #f4f4f4;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .order-id {
            color: #ce1126;
            font-weight: bold;
            font-size: 16px;
        }

        .info-section {
            background-color: #fcfcfc;
            border: 1px dashed #e5e5e5;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .info-title {
            font-weight: bold;
            color: #444;
            margin-bottom: 5px;
        }

        .timeline-container {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            color: #ce1126;
            text-decoration: none;
            font-weight: 500;
        }

        .back-btn:hover {
            color: #a00d20;
        }

        .section-title {
            color: #ce1126;
            margin-bottom: 30px;
            border-bottom: 3px solid #ce1126;
            padding-bottom: 15px;
        }

        /* Star Rating */
        .star-rating {
            direction: rtl;
            display: inline-block;
            font-size: 30px;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: #ddd;
            cursor: pointer;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input:checked~label {
            color: #f5b301;
        }
    </style>
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('trangchu') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ isset($settings['logo_url']) ? (\Illuminate\Support\Str::startsWith($settings['logo_url'], 'http') ? $settings['logo_url'] : asset($settings['logo_url'])) : asset('logo.jpg') }}" alt="" class="setting-logo-img">
                <h1 class="sitename">FOODELICIOUS</h1><span>.</span>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('trangchu_dangnhap') }}#hero">Trang chủ</a></li>
                    <li><a href="{{ route('trangchu_dangnhap') }}#about">Giới thiệu</a></li>
                    <li><a href="{{ route('trangchu_dangnhap') }}#menu">Thực đơn</a></li>
                    <li><a href="{{ route('trangchu_dangnhap') }}#events">Sự kiện</a></li>
                    <li><a href="{{ route('trangchu_dangnhap') }}#chefs">Đầu bếp</a></li>
                    <li><a href="{{ route('trangchu_dangnhap') }}#contact">Liên hệ</a></li>
                </ul>
            </nav>
            <div class="dropdown me-3">
                <a href="#" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle"></i> {{ Auth::user()->fullname }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item py-2" href="{{ route('giohang') }}"><i class="bi bi-clock-history me-2 text-danger"></i>Lịch sử đơn hàng</a></li>
                    <li><a class="dropdown-item py-2" href="{{ route('goidichvu') }}"><i class="bi bi-box-seam me-2 text-danger"></i>Gói của tôi</a></li>
                    <li><a class="dropdown-item py-2" href="{{ route('yeucauhoan') }}"><i class="bi bi-wallet2 me-2 text-danger"></i>Yêu cầu hoàn tiền</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger py-2" href="{{ route('dangxuat') }}"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="cart-container">
            <div class="container">
                <a href="{{ route('trangchu_dangnhap') }}" class="back-btn"><i class="bi bi-arrow-left"></i> Quay lại cửa hàng</a>
                
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <h1 class="section-title"><i class="bi bi-box-seam-fill"></i> Gói dịch vụ ăn uống của tôi</h1>

                @forelse($subscriptions as $subscription)
                <!-- ĐƠN GÓI DỊCH VỤ -->
                <div class="order-card text-dark mb-4">
                    <div class="order-header">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="order-id">Gói đăng ký: {{ $subscription->package->package_name }} ({{ $subscription->package->duration_days }} Ngày)</div>
                                <div class="order-date">Mã đơn mua: <strong>#FDL-{{ $subscription->order_id }}</strong></div>
                            </div>
                            <div class="col-md-6 text-md-end">
                                @if($subscription->status === 'active')
                                <span class="badge bg-success"><i class="bi bi-play-circle-fill me-1"></i> Đang hoạt động</span>
                                @elseif($subscription->status === 'paused')
                                <span class="badge bg-warning text-dark"><i class="bi bi-pause-circle-fill me-1"></i> Tạm ngưng</span>
                                @elseif($subscription->status === 'expired')
                                <span class="badge bg-secondary"><i class="bi bi-exclamation-circle-fill me-1"></i> Hết hạn</span>
                                @else
                                <span class="badge bg-danger"><i class="bi bi-x-circle-fill me-1"></i> Đã hủy</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Tiến độ dịch vụ (Ngày hiện tại, Ngày kết thúc) -->
                    <div class="timeline-container mb-3 shadow-sm border">
                        <div class="d-flex justify-content-between font-weight-bold small mb-2">
                            <span><i class="bi bi-calendar-check text-success"></i> Ngày bắt đầu: {{ $subscription->start_date->format('d/m/Y') }}</span>
                            <span class="text-primary font-weight-bold">Tiến độ: Ngày {{ $subscription->completed_days }} / {{ $subscription->schedules_list->count() }}</span>
                            <span><i class="bi bi-calendar-x text-danger"></i> Ngày kết thúc: {{ $subscription->end_date->format('d/m/Y') }}</span>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                role="progressbar" style="width: {{ $subscription->progress_percent }}%;" aria-valuenow="{{ $subscription->progress_percent }}" aria-valuemin="0"
                                aria-valuemax="100">{{ $subscription->progress_percent }}%</div>
                        </div>
                    </div>

                    <!-- Thông tin thực đơn hôm nay & Ngày mai -->
                    <div class="info-section">
                        <div class="row">
                            <div class="col-md-6 border-end">
                                @if($subscription->tomorrow_schedule)
                                <div class="info-title text-primary"><i class="bi bi-egg-fried"></i> Thực đơn ngày tiếp theo (Ngày {{ $subscription->tomorrow_day_number }} - {{ $subscription->tomorrow_schedule->delivery_date->format('d/m/Y') }}):</div>
                                <div class="fw-bold mb-2 text-dark fs-5">
                                    {{ $subscription->tomorrow_schedule->dish->dish_name }}
                                    @if($subscription->tomorrow_schedule->delivery_notes)
                                        <div class="mt-1"><span class="badge bg-light text-dark fw-normal border" style="font-size: 11px;"><i class="bi bi-chat-left-text me-1 text-primary"></i> Ghi chú: {{ $subscription->tomorrow_schedule->delivery_notes }}</span></div>
                                    @endif
                                </div>
                                @if($subscription->status === 'active')
                                <!-- Thao tác đổi món / Ghi chú cho ngày mai -->
                                <button type="button" class="btn btn-sm btn-outline-primary me-2 shadow-sm" data-bs-toggle="modal"
                                    data-bs-target="#changeMenuModal" data-sub-id="{{ $subscription->id }}" data-day="{{ $subscription->tomorrow_day_number }}"><i
                                        class="bi bi-arrow-left-right"></i> Đổi món ngày mai</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary shadow-sm" data-bs-toggle="modal"
                                    data-bs-target="#noteDayModal" data-sub-id="{{ $subscription->id }}" data-day="{{ $subscription->tomorrow_day_number }}"><i class="bi bi-pencil-square"></i> Ghi
                                    chú ngày mai</button>
                                @endif
                                @else
                                <div class="info-title text-primary"><i class="bi bi-egg-fried"></i> Thực đơn tiếp theo:</div>
                                <div class="text-muted mb-2">Đã hoàn thành hoặc không có lịch giao chờ xử lý.</div>
                                @endif
                            </div>
                            <div class="col-md-6 ps-md-4">
                                <div class="info-title text-secondary"><i class="bi bi-gear-fill"></i> Quản lý trạng thái gói dài hạn:</div>
                                <p class="small text-muted mb-2">Bạn có việc bận đột xuất? Bạn có thể tạm ngưng nhận món ăn hoặc hủy gói bất kỳ lúc nào.</p>
                                @if($subscription->status === 'active')
                                <button type="button" class="btn btn-sm btn-warning text-dark me-2 shadow-sm fw-bold"
                                    data-bs-toggle="modal" data-bs-target="#pauseServiceModal" data-sub-id="{{ $subscription->id }}"><i
                                        class="bi bi-pause-circle-fill"></i> Tạm ngưng gói</button>
                                <button type="button" class="btn btn-sm btn-outline-danger shadow-sm"
                                    data-bs-toggle="modal" data-bs-target="#cancelServiceModal" data-sub-id="{{ $subscription->id }}"><i class="bi bi-x-octagon"></i> Hủy dịch vụ</button>
                                @else
                                <span class="text-muted small">Các tùy chọn tạm dừng/hủy không khả dụng cho gói đã ngưng hoạt động.</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                        <div class="small text-muted">* Đã giao thành công {{ $subscription->completed_days }} ngày. Số ngày còn lại: {{ $subscription->remaining_days }} ngày.</div>
                        <!-- Nút viết đánh giá dịch vụ tổng thể -->
                        @if($subscription->status === 'active' || $subscription->status === 'expired')
                        <button type="button" class="btn btn-sm btn-outline-warning text-dark fw-bold shadow-sm"
                            data-bs-toggle="modal" data-bs-target="#reviewServiceModal" data-sub-id="{{ $subscription->id }}"><i class="bi bi-star-fill"></i>
                            Đánh giá chất lượng gói</button>
                        @endif
                    </div>
                </div>
                @empty
                <div class="alert alert-info text-center py-4 bg-light border text-dark">
                    <i class="bi bi-info-circle fa-2x mb-2 d-block text-primary"></i>
                    Bạn chưa đăng ký gói dịch vụ ăn uống dài hạn nào. Hãy đăng ký gói ở trang chủ để được phục vụ bữa ăn nóng hổi hàng ngày!
                </div>
                @endforelse

            </div>
        </div>
    </main>

    <!-- ======================================================= -->
    <!-- KHU VỰC CÁC MODAL THAO TÁC INTERACTION -->
    <!-- ======================================================= -->

    <!-- MODAL 1: YÊU CẦU ĐỔI MÓN -->
    <div class="modal fade" id="changeMenuModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-dark border-0 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold"><i class="bi bi-arrow-left-right me-2"></i>Yêu cầu đổi món ăn thực đơn</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('goidichvu.change-menu') }}" method="POST">
                    @csrf
                    <input type="hidden" name="subscription_id" id="change-sub-id-input">
                    <input type="hidden" name="day_number" id="change-day-input">
                    <div class="modal-body">
                        <p>Hệ thống hỗ trợ đổi món ăn cho lịch trình <strong class="text-primary">Ngày <span
                                    id="change-day-display">X</span></strong> (Hạn chót thay đổi trước 21h hôm nay):</p>
                        <div class="form-group mb-3">
                            <label class="form-label small fw-bold">Chọn món thay thế mong muốn:</label>
                            <select class="form-select" name="new_dish_id" required>
                                <option value="" selected disabled>-- Chọn thực đơn thay thế có sẵn --</option>
                                @foreach($dishes as $dish)
                                <option value="{{ $dish->id }}">{{ $dish->dish_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary px-4">Xác nhận đổi món</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL 2: GHI CHÚ THEO NGÀY -->
    <div class="modal fade" id="noteDayModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-dark border-0 shadow">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title fw-bold"><i class="bi bi-pencil-square me-2"></i>Ghi chú giao hàng cho ngày mai</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('goidichvu.add-note') }}" method="POST">
                    @csrf
                    <input type="hidden" name="subscription_id" id="note-sub-id-input">
                    <input type="hidden" name="day_number" id="note-day-input">
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="day_note" class="form-label small fw-bold">Nhập yêu cầu giao hàng cụ thể cho
                                Ngày <span id="note-day-display">X</span>:</label>
                            <textarea class="form-control" id="day_note" name="day_note" rows="3"
                                placeholder="Ví dụ: Ngày mai giao trễ hơn 30 phút, không lấy hành lá, giao lên lầu 3 giúp tôi..."
                                required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-dark px-4">Lưu ghi chú ngày</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL 3: TẠM NGƯNG DỊCH VỤ -->
    <div class="modal fade" id="pauseServiceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-dark border-0 shadow">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title fw-bold"><i class="bi bi-pause-circle-fill me-2"></i>Yêu cầu tạm ngưng nhận món</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('goidichvu.pause') }}" method="POST">
                    @csrf
                    <input type="hidden" name="subscription_id" id="pause-sub-id-input">
                    <div class="modal-body">
                        <p>Hệ thống sẽ tạm dừng giao hàng cho gói dịch vụ dài hạn này. Số ngày còn lại sẽ được bảo lưu và tiếp tục giao sau khi bạn kích hoạt mở lại.</p>
                        <div class="form-group mb-3">
                            <label for="pause_days" class="form-label small fw-bold">Số ngày tạm ngưng dự kiến:</label>
                            <select class="form-select" id="pause_days" name="pause_days" required>
                                <option value="3">Tạm ngưng 3 ngày tiếp theo</option>
                                <option value="7">Tạm ngưng 1 tuần</option>
                                <option value="unknown">Tạm đóng băng (cho đến khi mở lại)</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-warning text-dark fw-bold px-4">Xác nhận tạm ngưng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL 4: HỦY DỊCH VỤ GÓI -->
    <div class="modal fade" id="cancelServiceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-dark border-0 shadow">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title fw-bold"><i class="bi bi-x-octagon me-2"></i>Yêu cầu chấm dứt/Hủy ngang gói dịch vụ</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('goidichvu.cancel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="subscription_id" id="cancel-sub-id-input">
                    <div class="modal-body">
                        <div class="alert alert-warning border-0 small"><i class="bi bi-info-circle-fill me-1"></i> Tiền tương ứng với các ngày ăn chưa sử dụng còn lại sẽ được ban quản lý thẩm định và hoàn trả lại tài khoản ngân hàng của bạn sau khi đối soát.</div>
                        <div class="form-group mb-3">
                            <label for="cancel_reason" class="form-label small fw-bold">Vui lòng cho cửa hàng biết lý do hủy (Tối thiểu 50 ký tự): <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="cancel_reason" name="cancel_reason" rows="3"
                                minlength="50" placeholder="Vui lòng giải thích chi tiết lý do bạn muốn hủy gói dịch vụ ăn uống (tối thiểu 50 ký tự)..." required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="cancel_image" class="form-label small fw-bold">Hình ảnh minh chứng lý do hủy: <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="cancel_image" name="cancel_image" accept="image/*" required>
                            <small class="text-muted d-block mt-1">* Vui lòng chụp hình ảnh đơn viết tay hoặc lỗi dịch vụ để ban quản trị duyệt nhanh chóng.</small>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-danger px-4">Xác nhận hủy gói dịch vụ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL 5: ĐÁNH GIÁ CHẤT LƯỢNG GÓI -->
    <div class="modal fade" id="reviewServiceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-dark border-0 shadow">
                <div class="modal-header bg-light border-bottom">
                    <h5 class="modal-title fw-bold text-dark"><i class="bi bi-star-fill text-warning me-2"></i>Đánh giá trải nghiệm gói dịch vụ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('goidichvu.review') }}" method="POST">
                    @csrf
                    <input type="hidden" name="subscription_id" id="review-sub-id-input">
                    <div class="modal-body text-center">
                        <p class="text-start mb-1">Góp ý của bạn giúp FOODELICIOUS tối ưu hóa chất lượng phục vụ:</p>
                        <div class="star-rating my-2">
                            <input type="radio" id="star5" name="service_stars" value="5" /><label for="star5"
                                class="bi bi-star-fill"></label>
                            <input type="radio" id="star4" name="service_stars" value="4" /><label for="star4"
                                class="bi bi-star-fill"></label>
                            <input type="radio" id="star3" name="service_stars" value="3" /><label for="star3"
                                class="bi bi-star-fill"></label>
                            <input type="radio" id="star2" name="service_stars" value="2" /><label for="star2"
                                class="bi bi-star-fill"></label>
                            <input type="radio" id="star1" name="service_stars" value="1" required /><label for="star1"
                                class="bi bi-star-fill"></label>
                        </div>
                        <div class="form-group text-start">
                            <textarea class="form-control" name="service_comment" rows="3"
                                placeholder="Nhập cảm nhận của bạn về thực đơn xoay vòng, thời gian giao hàng đúng hẹn..."
                                required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0">
                        <button type="button" class="btn btn-secondary shadow-sm" data-bs-dismiss="modal">Trở lại</button>
                        <button type="submit" class="btn btn-warning text-dark fw-bold shadow-sm px-4">Gửi nhận xét</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="footer" class="footer dark-background">
        <div class="container copyright text-center mt-4">
            <p>© <span>2026</span> <strong class="px-1">FOODELICIOUS</strong>. Tất cả quyền được bảo lưu.</p>
        </div>
    </footer>

    <!-- Vendor JS Files -->
    <script src="{{ asset('client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/aos/aos.js') }}"></script>

    <!-- Script điều động gán thông tin chu kỳ ngày vào Modal -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Gán dữ liệu ngày đặt cho Modal đổi món
            const changeMenuModal = document.getElementById('changeMenuModal');
            if (changeMenuModal) {
                changeMenuModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const day = button.getAttribute('data-day');
                    const subId = button.getAttribute('data-sub-id');
                    document.getElementById('change-day-display').innerText = day;
                    document.getElementById('change-day-input').value = day;
                    document.getElementById('change-sub-id-input').value = subId;
                });
            }

            // Gán dữ liệu ngày đặt cho Modal ghi chú theo ngày
            const noteDayModal = document.getElementById('noteDayModal');
            if (noteDayModal) {
                noteDayModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const day = button.getAttribute('data-day');
                    const subId = button.getAttribute('data-sub-id');
                    document.getElementById('note-day-display').innerText = day;
                    document.getElementById('note-day-input').value = day;
                    document.getElementById('note-sub-id-input').value = subId;
                });
            }

            // Gán dữ liệu cho Modal tạm ngưng
            const pauseServiceModal = document.getElementById('pauseServiceModal');
            if (pauseServiceModal) {
                pauseServiceModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const subId = button.getAttribute('data-sub-id');
                    document.getElementById('pause-sub-id-input').value = subId;
                });
            }

            // Gán dữ liệu cho Modal hủy dịch vụ
            const cancelServiceModal = document.getElementById('cancelServiceModal');
            if (cancelServiceModal) {
                cancelServiceModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const subId = button.getAttribute('data-sub-id');
                    document.getElementById('cancel-sub-id-input').value = subId;
                });
            }

            // Gán dữ liệu cho Modal viết đánh giá
            const reviewServiceModal = document.getElementById('reviewServiceModal');
            if (reviewServiceModal) {
                reviewServiceModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const subId = button.getAttribute('data-sub-id');
                    document.getElementById('review-sub-id-input').value = subId;
                });
            }

            // Settings/Logo Polling in Sub Packages view
            let currentLogoUrl = "{{ isset($settings['logo_url']) ? (\Illuminate\Support\Str::startsWith($settings['logo_url'], 'http') ? $settings['logo_url'] : asset($settings['logo_url'])) : asset('logo.jpg') }}";
            
            function pollPackagesSettings() {
                fetch("{{ route('api.settings.poll') }}")
                    .then(response => response.json())
                    .then(data => {
                        const newLogo = data.settings.logo_url;
                        if (newLogo && newLogo !== currentLogoUrl) {
                            currentLogoUrl = newLogo;
                            document.querySelectorAll('.setting-logo-img').forEach(img => {
                                img.src = newLogo;
                            });
                        }
                    })
                    .catch(err => console.error('Error polling settings in packages view:', err));
            }
            setInterval(pollPackagesSettings, 2000);
        });
    </script>
</body>

</html>