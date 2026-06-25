<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Thanh toán Đơn hàng - FOODELICIOUS</title>

    <link href="{{ asset('logo.jpg') }}" rel="icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('client/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/css/main.css') }}" rel="stylesheet">

    <style>
        .momo-brand-color {
            color: #A50064;
        }

        .bank-brand-color {
            color: #004B87;
        }

        .nav-pills .nav-link {
            border: 2px solid #dee2e6;
            color: #495057;
            background-color: #fff;
            font-weight: bold;
            transition: all 0.2s ease-in-out;
        }

        .nav-pills .nav-link.active.tab-momo {
            background-color: #A50064 !important;
            border-color: #A50064 !important;
            color: white !important;
        }

        .nav-pills .nav-link.active.tab-bank {
            background-color: #004B87 !important;
            border-color: #004B87 !important;
            color: white !important;
        }

        .qr-box {
            border-radius: 12px;
            padding: 20px;
            background: #fff;
            max-width: 280px;
            margin: 0 auto;
        }

        .qr-box.box-momo {
            border: 2px solid #A50064;
        }

        .qr-box.box-bank {
            border: 2px solid #004B87;
        }

        .countdown-timer {
            font-size: 22px;
            font-weight: bold;
            color: #ce1126;
            background: #fff5f5;
            padding: 5px 15px;
            border-radius: 20px;
            display: inline-block;
        }
    </style>
</head>

<body class="bg-light text-dark">

    <header id="header" class="header d-flex align-items-center sticky-top bg-white shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="{{ route('trangchu') }}" class="logo d-flex align-items-center me-auto" style="text-decoration: none;">
                <img src="{{ asset('logo.jpg') }}" alt="">
                <h1 class="sitename text-danger m-0" style="font-size: 28px;">FOODELICIOUS</h1>
            </a>
            <span class="navbar-text fw-bold text-muted"><i class="bi bi-shield-check text-success"></i> Hệ thống thanh toán mã QR giả lập</span>
        </div>
    </header>

    <main class="container my-5">
        <div class="row justify-content-center">

            <div class="col-lg-6 col-md-10 mb-4">
                <div class="card shadow border-0 p-4 text-center">
                    <h5 class="fw-bold mb-4">Chọn phương thức quét mã QR</h5>

                    @php
                        $isMomo = (isset($payment_type) && $payment_type === 'momo') || !isset($payment_type);
                    @endphp

                    <ul class="nav nav-pills row g-2 mb-4" id="pills-tab" role="tablist">
                        <li class="nav-item col-6" role="presentation">
                            <button class="nav-link w-100 py-2.5 tab-momo {{ $isMomo ? 'active' : '' }}" id="pills-momo-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-momo" type="button" role="tab"
                                aria-controls="pills-momo" aria-selected="{{ $isMomo ? 'true' : 'false' }}">
                                <i class="bi bi-wallet2 me-2"></i>Ví MoMo
                            </button>
                        </li>
                        <li class="nav-item col-6" role="presentation">
                            <button class="nav-link w-100 py-2.5 tab-bank {{ !$isMomo ? 'active' : '' }}" id="pills-bank-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-bank" type="button" role="tab" aria-controls="pills-bank"
                                aria-selected="{{ !$isMomo ? 'true' : 'false' }}">
                                <i class="bi bi-bank me-2"></i>Ngân hàng (VietQR)
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade {{ $isMomo ? 'show active' : '' }}" id="pills-momo" role="tabpanel"
                            aria-labelledby="pills-momo-tab">
                            <div class="qr-box box-momo shadow-sm mb-3">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=Momo_Order_{{ $order_id }}_Amount_{{ $amount }}"
                                    alt="Mã QR MoMo" class="img-fluid">
                            </div>
                            <p class="small text-muted mb-3"><i class="bi bi-phone-vibrate me-1"></i> Mở ứng dụng
                                <strong>MoMo</strong> để quét mã chuyển tiền</p>
                        </div>

                        <div class="tab-pane fade {{ !$isMomo ? 'show active' : '' }}" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
                            <div class="qr-box box-bank shadow-sm mb-3">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=VietQR_Order_{{ $order_id }}_Amount_{{ $amount }}"
                                    alt="Mã VietQR" class="img-fluid">
                            </div>
                            <p class="small text-muted mb-3"><i class="bi bi-phone-vibrate me-1"></i> Sử dụng
                                <strong>App Ngân hàng (Mobile Banking)</strong> bất kỳ để quét mã</p>
                        </div>

                    </div>

                    <div class="mb-2 mt-2 small text-secondary">Thời gian giữ mã giao dịch còn lại:</div>
                    <div class="countdown-timer mb-2 shadow-sm"><i class="bi bi-clock-history me-2"></i><span
                            id="timer">10:00</span></div>
                </div>
            </div>

            <div class="col-lg-5 col-md-10">
                <div class="card shadow border-0 p-4 text-dark">
                    <h5 class="fw-bold border-bottom pb-2 text-dark"><i class="bi bi-receipt me-2 text-danger"></i>Thông tin đơn hàng</h5>

                    <div class="py-2 d-flex justify-content-between">
                        <span class="text-muted">Mã đơn hàng:</span>
                        <strong class="text-dark">#FDL-{{ $order_id }}</strong>
                    </div>
                    <div class="py-2 d-flex justify-content-between">
                        <span class="text-muted">Nhà cung cấp:</span>
                        <span class="fw-bold">Hệ thống FOODELICIOUS</span>
                    </div>
                    <div class="py-2 d-flex justify-content-between align-items-center">
                        <span class="text-muted">Số tiền cần thanh toán:</span>
                        <span class="fs-4 fw-bold text-danger">{{ number_format($amount, 0, ',', '.') }} đ</span>
                    </div>

                    <div class="alert alert-warning small mt-3 border-0">
                        <h6 class="fw-bold mb-1"><i class="bi bi-exclamation-triangle-fill me-1"></i> Lưu ý đối soát hệ thống:</h6>
                        Mã QR đã tích hợp sẵn số tiền **{{ number_format($amount, 0, ',', '.') }} đ** và nội dung chuyển khoản tự động. Vui lòng không tự ý thay đổi thông tin để đơn hàng được duyệt ngay lập tức.
                    </div>

                    <div class="mt-4 pt-2 border-top">
                        <form action="{{ route('thanhtoan_hoantat', $order_id) }}" method="GET">
                            <button type="submit" class="btn btn-danger w-100 py-2.5 fw-bold shadow-sm mb-2" style="background-color: #ce1126;">
                                <i class="bi bi-check2-circle me-1"></i> Tôi đã hoàn tất chuyển khoản
                            </button>
                        </form>
                        <a href="{{ route('trangchu_dangnhap') }}" class="btn btn-outline-secondary w-100 py-2.5 btn-sm">Quay lại trang chủ</a>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            var interval = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(interval);
                    display.textContent = "Hết hạn";
                }
            }, 1000);
        }
        window.onload = function () {
            var tenMinutes = 60 * 10,
                display = document.querySelector('#timer');
            startTimer(tenMinutes, display);
        };
    </script>

    <script src="{{ asset('client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
