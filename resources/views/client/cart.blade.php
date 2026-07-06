<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Lịch sử đơn hàng - FOODELICIOUS</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link href="logo.jpg" rel="icon">
    <link href="client/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="client/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="client/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="client/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="client/assets/css/main.css" rel="stylesheet">

    <style>
        .cart-container {
            min-height: 70vh;
            padding: 40px 0;
        }

        .search-box {
            margin-bottom: 30px;
        }

        .search-box input {
            border-radius: 5px;
            border: 2px solid #ce1126;
            padding: 10px 15px;
        }

        .search-box button {
            background-color: #ce1126;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-box button:hover {
            background-color: #a00d20;
        }

        .order-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .order-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
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

        .order-date {
            color: #666;
            font-size: 14px;
        }

        .info-section {
            background-color: #fcfcfc;
            border: 1px dashed #e5e5e5;
            border-radius: 6px;
            padding: 12px 15px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .info-title {
            font-weight: bold;
            color: #444;
            margin-bottom: 5px;
        }

        .product-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #f4f4f4;
        }

        .product-item:last-child {
            border-bottom: none;
        }

        .product-name {
            font-weight: 500;
            color: #333;
            flex: 1;
        }

        .product-qty {
            color: #666;
            margin: 0 10px;
            min-width: 80px;
            text-align: center;
        }

        .product-price {
            color: #ce1126;
            font-weight: bold;
            min-width: 100px;
            text-align: right;
        }

        .order-footer {
            border-top: 2px solid #f4f4f4;
            padding-top: 15px;
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .order-total {
            font-size: 18px;
            font-weight: bold;
            color: #ce1126;
        }

        .payment-method {
            background-color: #f4f4f4;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            color: #555;
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            color: #ce1126;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
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

        /* Hệ thống chọn sao đánh giá */
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
            transition: color 0.2s;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input:checked~label {
            color: #f5b301;
        }

        @media (max-width: 768px) {
            .product-item {
                flex-wrap: wrap;
            }

            .product-qty,
            .product-price {
                min-width: auto;
                margin-top: 5px;
            }

            .search-box {
                display: flex;
                gap: 10px;
            }

            .search-box input {
                flex: 1;
            }

            .order-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .action-buttons {
                width: 100%;
                display: flex;
                flex-direction: column;
                gap: 8px;
            }
        }
    </style>
    @vite(['resources/js/app.js'])
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('trangchu') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ isset($settings['logo_url']) ? (\Illuminate\Support\Str::startsWith($settings['logo_url'], 'http') ? $settings['logo_url'] : asset($settings['logo_url'])) : asset('logo.jpg') }}" alt="" class="setting-logo-img">
                <h1 class="sitename">FOODELICIOUS</h1><span>.</span>
            </a>
    </header>
    <main class="main">
        <div class="cart-container">
            <div class="container">
                <a href="{{ route('trangchu_dangnhap') }}" class="back-btn"><i class="bi bi-arrow-left"></i> Quay lại
                    cửa hàng</a>
                <h1 class="section-title"><i class="bi bi-cart-fill"></i> Lịch sử đơn hàng của tôi</h1>

                <!-- Search Box -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="search-box">
                            <form action="{{ route('giohang') }}" method="GET" class="d-flex gap-2">
                                <input type="text" class="form-control" name="search" value="{{ $search }}"
                                    placeholder="Tìm kiếm đơn hàng (mã đơn, nơi giao, sản phẩm)...">
                                <button type="submit" class="btn"><i class="bi bi-search"></i> Tìm</button>
                            </form>
                        </div>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $errors->first() }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @forelse($orders as $order)
                    @php
                        $paymentMethodText = 'Tiền mặt khi nhận (COD)';
                        if ($order->payment_method === 'bank_transfer') {
                            $paymentMethodText = 'Chuyển khoản ATM';
                        } elseif ($order->payment_method === 'momo') {
                            $paymentMethodText = 'Ví điện tử MoMo';
                        } elseif ($order->payment_method === 'vnpay') {
                            $paymentMethodText = 'Cổng VNPay';
                        } elseif ($order->payment_method === 'zalopay') {
                            $paymentMethodText = 'Ví ZaloPay';
                        }
                    @endphp
                    <div class="order-card text-dark" id="order-card-{{ $order->id }}">
                        <div class="order-header">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="order-id">Đơn hàng: #FDL-{{ $order->id }}</div>
                                    <div class="order-date">Ngày đặt: {{ $order->created_at->format('d/m/Y H:i') }}</div>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    @if($order->order_status === 'pending')
                                        <span class="badge bg-secondary text-white"><i class="bi bi-hourglass-split me-1"></i> Chờ xác nhận</span>
                                    @elseif($order->order_status === 'confirmed')
                                        <span class="badge bg-info text-white"><i class="bi bi-check-circle me-1"></i> Đã xác nhận</span>
                                    @elseif($order->order_status === 'preparing')
                                        <span class="badge bg-warning text-dark"><i class="bi bi-fire me-1"></i> Đang chuẩn bị</span>
                                    @elseif($order->order_status === 'delivering')
                                        <span class="badge bg-primary text-white"><i class="bi bi-truck me-1"></i> Đang giao</span>
                                    @elseif($order->order_status === 'completed')
                                        <span class="badge bg-success text-white"><i class="bi bi-check2-all me-1"></i> Đã hoàn thành</span>
                                    @elseif($order->order_status === 'cancelled')
                                        <span class="badge bg-danger text-white"><i class="bi bi-x-circle me-1"></i> Đã hủy</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="info-section">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="info-title"><i class="bi bi-geo-alt-fill text-danger me-1"></i> Thông tin giao hàng:</div>
                                    <div class="text-secondary">
                                        {{ $order->user->fullname ?? 'Khách hàng' }}<br>
                                        {{ $order->health_notes }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="info-title"><i class="bi bi-cash-stack text-success me-1"></i> Thanh toán:</div>
                                    <div class="text-secondary">
                                        {{ $paymentMethodText }}<br>
                                        @if($order->payment_status === 'pending')
                                            <span class="badge bg-warning text-dark">Chờ thanh toán</span>
                                        @elseif($order->payment_status === 'paid')
                                            <span class="badge bg-success text-white">Đã thanh toán</span>
                                        @elseif($order->payment_status === 'failed')
                                            <span class="badge bg-danger text-white">Thất bại</span>
                                        @elseif($order->payment_status === 'refunded')
                                            <span class="badge bg-info text-dark">Đã hoàn tiền</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="products-list text-dark">
                            @foreach($order->orderItems as $item)
                                <div class="product-item">
                                    <span class="product-name">{{ $item->dish->dish_name ?? 'Món ăn không tồn tại' }}</span>
                                    <span class="product-qty">x{{ $item->quantity }}</span>
                                    <span class="product-price">{{ number_format($item->price, 0, ',', '.') }} đ</span>
                                </div>
                            @endforeach
                            <div class="order-total text-success">Điểm tích lũy: {{ number_format($order->final_amount / 100, 0, ',', '.') }}</div>
                        </div>
                        <div class="order-footer">
                            <div class="order-total">Tổng cộng: {{ number_format($order->final_amount, 0, ',', '.') }} đ</div>
                            <div class="action-buttons d-flex gap-2">
                                @if($order->order_status === 'pending')
                                    <button type="button" class="btn btn-outline-danger btn-sm px-3" data-bs-toggle="modal"
                                        data-bs-target="#cancelOrderModal" data-order-id="{{ $order->id }}">
                                        <i class="bi bi-trash3 me-1"></i> Hủy đơn hàng này
                                    </button>
                                @endif
                                
                                @if($order->order_status === 'completed')
                                    @php
                                        $isReviewed = \App\Models\Review::where('order_id', $order->id)->exists();
                                    @endphp
                                    @if(!$isReviewed)
                                        <button type="button" class="btn btn-warning text-dark btn-sm fw-bold px-3"
                                            data-bs-toggle="modal" data-bs-target="#reviewOrderModal" data-order-id="{{ $order->id }}">
                                            <i class="bi bi-star-fill me-1"></i> Viết đánh giá
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-outline-success btn-sm px-3" disabled>
                                            <i class="bi bi-check-circle-fill me-1"></i> Đã đánh giá
                                        </button>
                                    @endif

                                    @php
                                        $hasRefundRequest = strpos($order->health_notes, '[Yêu cầu hoàn tiền') !== false;
                                    @endphp
                                    @if($order->payment_status === 'refunded')
                                        <span class="badge bg-dark text-white d-flex align-items-center px-3"><i class="bi bi-arrow-counterclockwise me-1"></i> Đã hoàn tiền</span>
                                    @elseif($hasRefundRequest)
                                        <span class="badge bg-secondary text-white d-flex align-items-center px-3"><i class="bi bi-clock me-1"></i> Đã yêu cầu hoàn tiền</span>
                                    @else
                                        <button type="button" class="btn btn-outline-secondary btn-sm px-3" data-bs-toggle="modal"
                                            data-bs-target="#refundOrderModal" data-order-id="{{ $order->id }}" data-amount="{{ number_format($order->final_amount, 0, ',', '.') }} đ" data-raw-amount="{{ $order->final_amount }}">
                                            <i class="bi bi-arrow-counterclockwise me-1"></i> Yêu cầu hoàn tiền
                                        </button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5 bg-white rounded border text-muted">
                        <i class="bi bi-journal-x fs-1"></i>
                        <p class="mt-2 mb-0">Bạn chưa có đơn hàng nào.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </main>

    <!-- ======================================================= -->
    <!-- KHU VỰC CÁC MODAL THAO TÁC (HỦY ĐƠN / ĐÁNH GIÁ / HOÀN TIỀN) -->
    <!-- ======================================================= -->

    <!-- MODAL 1: HỦY ĐƠN HÀNG -->
    <div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-dark">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title fw-bold"><i class="bi bi-exclamation-triangle-fill me-2"></i>Xác nhận hủy đơn
                        hàng</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('order.cancel') }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" id="cancel_order_id_input">
                    <div class="modal-body text-start">
                        <p>Bạn đang yêu cầu hủy đơn hàng <strong id="cancel-order-id-display"
                                class="text-danger">#</strong>. Vui lòng cho biết lý do hủy để cửa hàng cải thiện dịch
                            vụ:</p>
                        <div class="form-group mb-3">
                            <select class="form-select" name="cancel_reason" required>
                                <option value="" selected disabled>-- Chọn lý do hủy đơn --</option>
                                <option value="change_mind">Tôi muốn thay đổi món ăn/thêm bớt sản phẩm</option>
                                <option value="wrong_info">Nhập sai thông tin liên lạc hoặc sai địa chỉ nhận</option>
                                <option value="long_delivery">Thời gian xử lý/dự kiến giao hàng quá lâu</option>
                                <option value="other">Lý do khác (Vui lòng ghi chi tiết bên dưới)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label small fw-bold">Chi tiết lý do (Nếu có):</label>
                            <textarea class="form-control" name="cancel_detail" rows="2"
                                placeholder="Nhập thêm nội dung chi tiết..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary shadow-sm" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-danger shadow-sm px-4">Xác nhận hủy đơn</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL 2: ĐÁNH GIÁ MÓN ĂN -->
    <div class="modal fade" id="reviewOrderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-dark">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title fw-bold"><i class="bi bi-chat-heart-fill me-2"></i>Đánh giá chất lượng đơn
                        hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('order.review') }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" id="review_order_id_input">
                    <div class="modal-body text-center">
                        <p class="text-start">Đánh giá của bạn về đơn hàng <strong
                                id="review-order-id-display">#</strong> giúp nhà bếp nâng cao tay nghề nấu nướng:</p>

                        <!-- Chọn số lượng sao -->
                        <div class="star-rating my-3">
                            <input type="radio" id="star5" name="rating_stars" value="5" /><label for="star5"
                                class="bi bi-star-fill"></label>
                            <input type="radio" id="star4" name="rating_stars" value="4" /><label for="star4"
                                class="bi bi-star-fill"></label>
                            <input type="radio" id="star3" name="rating_stars" value="3" /><label for="star3"
                                class="bi bi-star-fill"></label>
                            <input type="radio" id="star2" name="rating_stars" value="2" /><label for="star2"
                                class="bi bi-star-fill"></label>
                            <input type="radio" id="star1" name="rating_stars" value="1" required /><label for="star1"
                                class="bi bi-star-fill"></label>
                        </div>

                        <div class="form-group text-start">
                            <label for="review_comment" class="form-label small fw-bold">Nội dung nhận xét:</label>
                            <textarea class="form-control" id="review_comment" name="review_comment" rows="3"
                                placeholder="Món ăn vừa vị, đóng gói sạch sẽ, shipper nhiệt tình..."
                                required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary shadow-sm" data-bs-dismiss="modal">Trở
                            về</button>
                        <button type="submit" class="btn btn-warning text-dark fw-bold shadow-sm px-4">Gửi đánh
                            giá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL 3: YÊU CẦU HOÀN TIỀN (CẬP NHẬT CHỌN PHƯƠNG THỨC VÀ HÌNH ẢNH) -->
    <div class="modal fade" id="refundOrderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content text-dark">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title fw-bold"><i class="bi bi-arrow-counterclockwise me-2"></i>Yêu cầu hoàn tiền đơn hàng</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('order.refund') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="order_id" id="refund_order_id_input">
                    <div class="modal-body text-start">
                        <div class="alert alert-info py-2 small border-0">
                            Số tiền dự kiến hoàn trả: <strong id="refund-amount-display" class="text-danger">0 đ</strong>
                        </div>
                        <p>Hệ thống hỗ trợ gửi yêu cầu khiếu nại hoàn tiền cho đơn hàng <strong id="refund-order-id-display">#</strong>. Vui lòng điền các thông tin dưới đây:</p>

                        <div class="row">
                            <!-- Lý do khiếu nại -->
                            <div class="form-group col-md-6 mb-3">
                                <label class="form-label small fw-bold">Lý do yêu cầu hoàn tiền <span class="text-danger">*</span></label>
                                <select class="form-select" name="refund_reason" required>
                                    <option value="" selected disabled>-- Chọn nguyên do khiếu nại --</option>
                                    <option value="wrong_dish">Giao sai món ăn / Nhầm lẫn thực đơn</option>
                                    <option value="damaged_food">Thực phẩm biến chất, rơi đổ do vận chuyển</option>
                                    <option value="not_delivered">Tài xế không giao hàng nhưng bấm hoàn thành</option>
                                </select>
                            </div>

                            <!-- Chọn phương thức hoàn tiền -->
                            <div class="form-group col-md-6 mb-3">
                                <label for="refund_method" class="form-label small fw-bold">Phương thức nhận tiền hoàn <span class="text-danger">*</span></label>
                                <select class="form-select fw-bold text-primary" id="refund_method" name="refund_method" required onchange="toggleRefundFields(this.value)">
                                    <option value="bank" selected>Chuyển khoản Ngân hàng nội địa</option>
                                    <option value="momo">Chuyển về Ví điện tử MoMo</option>
                                </select>
                            </div>
                        </div>

                        <!-- KHU VỰC ĐIỀN THÔNG TIN TÀI KHOẢN NHẬN TIỀN -->
                        <div class="card bg-light border-0 p-3 mb-3">
                            <h6 class="fw-bold small text-secondary mb-2"><i class="bi bi-wallet2 me-1"></i> Thông tin tài khoản đích</h6>

                            <!-- Trường nhập cho Ngân Hàng -->
                            <div id="bank_fields_group">
                                <div class="row">
                                    <div class="form-group col-md-4 mb-2">
                                        <label class="small">Tên Ngân hàng <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm bank-input" name="bank_name" placeholder="Ví dụ: Vietcombank, Techcombank..." required>
                                    </div>
                                    <div class="form-group col-md-4 mb-2">
                                        <label class="small">Số tài khoản <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm bank-input" name="bank_account" placeholder="Nhập số tài khoản" required>
                                    </div>
                                    <div class="form-group col-md-4 mb-2">
                                        <label class="small">Tên chủ thẻ <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm bank-input text-uppercase" name="bank_user" placeholder="NGUYEN VAN A" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Trường nhập cho MoMo -->
                            <div id="momo_fields_group" class="d-none">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-2">
                                        <label class="small">Số điện thoại đăng ký MoMo <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm momo-input" id="momo_phone" name="momo_phone" placeholder="09xxxxxxxx">
                                    </div>
                                    <div class="form-group col-md-6 mb-2">
                                        <label class="small">Tên chủ tài khoản MoMo <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm momo-input text-uppercase" id="momo_user" name="momo_user" placeholder="NGUYEN VAN A">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Số tiền muốn hoàn trả & Hình ảnh minh chứng -->
                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <label for="refund_amount" class="form-label small fw-bold">Số tiền muốn hoàn trả (đ) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control font-weight-bold text-danger" id="refund_amount_input" name="refund_amount" required min="0">
                                <small class="text-muted">Nhập số tiền muốn hoàn trả (tối đa bằng giá trị đơn hàng).</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="refund_image" class="form-label small fw-bold">Hình ảnh minh chứng (nếu có)</label>
                                <input type="file" class="form-control" id="refund_image" name="refund_image" accept="image/*">
                                <small class="text-muted">Định dạng hỗ trợ: jpg, png, jpeg, gif. Tối đa: 2MB.</small>
                            </div>
                        </div>

                        <!-- Miêu tả sự cố -->
                        <div class="form-group">
                            <label class="form-label small fw-bold">Chi tiết sự cố gặp phải:</label>
                            <textarea class="form-control" name="refund_detail" rows="2" placeholder="Vui lòng miêu tả ngắn gọn sự cố để cửa hàng đối chiếu..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary shadow-sm" data-bs-dismiss="modal">Hủy bỏ</button>
                        <button type="submit" class="btn btn-primary shadow-sm px-4">Gửi đơn khiếu nại</button>
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
    <script src="client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="client/assets/vendor/aos/aos.js"></script>

    <!-- Script điều phối gán Mã đơn hàng tương ứng vào từng cửa sổ Modal động -->
    <script>
        function toggleRefundFields(method) {
            const bankGroup = document.getElementById('bank_fields_group');
            const momoGroup = document.getElementById('momo_fields_group');
            const bankInputs = document.querySelectorAll('.bank-input');
            const momoInputs = document.querySelectorAll('.momo-input');

            if (method === 'momo') {
                // Hiện khung MoMo, ẩn khung Ngân hàng
                momoGroup.classList.remove('d-none');
                bankGroup.classList.add('d-none');

                // Bật bắt buộc nhập cho MoMo, tắt Ngân hàng
                momoInputs.forEach(input => input.setAttribute('required', 'required'));
                bankInputs.forEach(input => input.removeAttribute('required'));
            } else {
                // Hiện khung Ngân hàng, ẩn khung MoMo
                bankGroup.classList.remove('d-none');
                momoGroup.classList.add('d-none');

                // Bật bắt buộc nhập cho Ngân hàng, tắt MoMo
                bankInputs.forEach(input => input.setAttribute('required', 'required'));
                momoInputs.forEach(input => input.removeAttribute('required'));
            }
        }
        document.addEventListener("DOMContentLoaded", function () {
            // 1. Ánh xạ dữ liệu cho Modal Hủy đơn
            const cancelModal = document.getElementById('cancelOrderModal');
            if (cancelModal) {
                cancelModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const orderId = button.getAttribute('data-order-id');
                    document.getElementById('cancel-order-id-display').innerText = '#FDL-' + orderId;
                    document.getElementById('cancel_order_id_input').value = orderId;
                });
            }

            // 2. Ánh xạ dữ liệu cho Modal Đánh giá
            const reviewModal = document.getElementById('reviewOrderModal');
            if (reviewModal) {
                reviewModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const orderId = button.getAttribute('data-order-id');
                    document.getElementById('review-order-id-display').innerText = '#FDL-' + orderId;
                    document.getElementById('review_order_id_input').value = orderId;
                });
            }

            // 3. Ánh xạ dữ liệu cho Modal Hoàn tiền
            const refundModal = document.getElementById('refundOrderModal');
            if (refundModal) {
                refundModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const orderId = button.getAttribute('data-order-id');
                    const amount = button.getAttribute('data-amount');
                    const rawAmount = button.getAttribute('data-raw-amount');
                    
                    document.getElementById('refund-order-id-display').innerText = '#FDL-' + orderId;
                    document.getElementById('refund_order_id_input').value = orderId;
                    document.getElementById('refund-amount-display').innerText = amount;
                    
                    const amountInput = document.getElementById('refund_amount_input');
                    if (amountInput) {
                        amountInput.value = rawAmount;
                        amountInput.max = rawAmount;
                    }
                });
            }

            // 4. Lắng nghe sự kiện truyền tải Realtime từ Laravel Echo (Disabled in favor of Polling)
            /*
            if (window.Echo) {
                const userId = {{ Auth::id() }};
                window.Echo.private('App.Models.User.' + userId)
                    .listen('OrderUpdated', (e) => {
                        console.log('Order update received:', e);
                        const order = e.order;
                        
                        // Cập nhật thẻ Order Card trên màn hình
                        const orderCard = document.getElementById('order-card-' + order.id);
                        if (orderCard) {
                            // 1. Cập nhật Badge Trạng thái đơn hàng
                            const headerCol = orderCard.querySelector('.order-header .col-md-6.text-md-end');
                            if (headerCol) {
                                let badgeHtml = '';
                                if (order.order_status === 'pending') {
                                    badgeHtml = '<span class="badge bg-secondary text-white"><i class="bi bi-hourglass-split me-1"></i> Chờ xác nhận</span>';
                                } else if (order.order_status === 'confirmed') {
                                    badgeHtml = '<span class="badge bg-info text-white"><i class="bi bi-check-circle me-1"></i> Đã xác nhận</span>';
                                } else if (order.order_status === 'preparing') {
                                    badgeHtml = '<span class="badge bg-warning text-dark"><i class="bi bi-fire me-1"></i> Đang chuẩn bị</span>';
                                } else if (order.order_status === 'delivering') {
                                    badgeHtml = '<span class="badge bg-primary text-white"><i class="bi bi-truck me-1"></i> Đang giao</span>';
                                } else if (order.order_status === 'completed') {
                                    badgeHtml = '<span class="badge bg-success text-white"><i class="bi bi-check2-all me-1"></i> Đã hoàn thành</span>';
                                } else if (order.order_status === 'cancelled') {
                                    badgeHtml = '<span class="badge bg-danger text-white"><i class="bi bi-x-circle me-1"></i> Đã hủy</span>';
                                }
                                headerCol.innerHTML = badgeHtml;
                            }

                            // 2. Cập nhật Badge Trạng thái thanh toán
                            const paymentBadge = orderCard.querySelector('.info-section span.badge');
                            if (paymentBadge) {
                                paymentBadge.className = 'badge';
                                if (order.payment_status === 'pending') {
                                    paymentBadge.classList.add('bg-warning', 'text-dark');
                                    paymentBadge.innerText = 'Chờ thanh toán';
                                } else if (order.payment_status === 'paid') {
                                    paymentBadge.classList.add('bg-success', 'text-white');
                                    paymentBadge.innerText = 'Đã thanh toán';
                                } else if (order.payment_status === 'failed') {
                                    paymentBadge.classList.add('bg-danger', 'text-white');
                                    paymentBadge.innerText = 'Thất bại';
                                } else if (order.payment_status === 'refunded') {
                                    paymentBadge.classList.add('bg-info', 'text-dark');
                                    paymentBadge.innerText = 'Đã hoàn tiền';
                                }
                            }

                            // 3. Hiển thị thông báo Alert trên thẻ đơn hàng
                            let statusText = '';
                            switch(order.order_status) {
                                case 'pending': statusText = 'chờ xác nhận'; break;
                                case 'confirmed': statusText = 'đã xác nhận'; break;
                                case 'preparing': statusText = 'đang chuẩn bị món'; break;
                                case 'delivering': statusText = 'đang được giao'; break;
                                case 'completed': statusText = 'đã hoàn tất giao nhận'; break;
                                case 'cancelled': statusText = 'đã bị hủy'; break;
                            }

                            const alertDiv = document.createElement('div');
                            alertDiv.className = 'alert alert-info alert-dismissible fade show mt-3 mb-2';
                            alertDiv.role = 'alert';
                            alertDiv.innerHTML = `
                                <i class="bi bi-info-circle-fill me-2"></i>
                                Đơn hàng <strong>#FDL-${order.id}</strong> của bạn vừa cập nhật trạng thái: <strong class="text-uppercase">${statusText}</strong>!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            `;
                            
                            // Xóa các Alert cũ nếu có trong card
                            const oldAlerts = orderCard.querySelectorAll('.alert-info');
                            oldAlerts.forEach(el => el.remove());
                            
                            orderCard.querySelector('.order-header').after(alertDiv);

                            // 4. Phát âm thanh bíp thông báo
                            try {
                                const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
                                const oscillator = audioCtx.createOscillator();
                                oscillator.type = 'sine';
                                oscillator.frequency.setValueAtTime(587.33, audioCtx.currentTime); // D5 note
                                oscillator.connect(audioCtx.destination);
                                oscillator.start();
                                oscillator.stop(audioCtx.currentTime + 0.2);
                            } catch (err) {
                                console.log('Audio error:', err);
                            }
                        }
                    });
            }
            */

            // 4. AJAX Polling for Realtime updates
            const userId = {{ Auth::id() }};
            if (userId) {
                let lastCheckedTime = null;

                // Initialize Order Polling
                fetch("{{ route('api.orders.poll') }}")
                    .then(response => response.json())
                    .then(data => {
                        lastCheckedTime = data.timestamp;
                        console.log('Cart Polling initialized at:', lastCheckedTime);
                        setInterval(pollUpdates, 2000);
                    })
                    .catch(err => console.error('Error initializing cart polling:', err));

                function pollUpdates() {
                    if (!lastCheckedTime) return;

                    fetch(`{{ route('api.orders.poll') }}?since=${encodeURIComponent(lastCheckedTime)}`)
                        .then(response => response.json())
                        .then(data => {
                            lastCheckedTime = data.timestamp;
                            if (data.updates && data.updates.length > 0) {
                                data.updates.forEach(e => {
                                    console.log('Cart Polling Order update received:', e);
                                    const order = e.order;
                                    
                                    // Cập nhật thẻ Order Card trên màn hình
                                    const orderCard = document.getElementById('order-card-' + order.id);
                                    if (orderCard) {
                                        // 1. Cập nhật Badge Trạng thái đơn hàng
                                        const headerCol = orderCard.querySelector('.order-header .col-md-6.text-md-end');
                                        if (headerCol) {
                                            let badgeHtml = '';
                                            if (order.order_status === 'pending') {
                                                badgeHtml = '<span class="badge bg-secondary text-white"><i class="bi bi-hourglass-split me-1"></i> Chờ xác nhận</span>';
                                            } else if (order.order_status === 'confirmed') {
                                                badgeHtml = '<span class="badge bg-info text-white"><i class="bi bi-check-circle me-1"></i> Đã xác nhận</span>';
                                            } else if (order.order_status === 'preparing') {
                                                badgeHtml = '<span class="badge bg-warning text-dark"><i class="bi bi-fire me-1"></i> Đang chuẩn bị</span>';
                                            } else if (order.order_status === 'delivering') {
                                                badgeHtml = '<span class="badge bg-primary text-white"><i class="bi bi-truck me-1"></i> Đang giao</span>';
                                            } else if (order.order_status === 'completed') {
                                                badgeHtml = '<span class="badge bg-success text-white"><i class="bi bi-check2-all me-1"></i> Đã hoàn thành</span>';
                                            } else if (order.order_status === 'cancelled') {
                                                badgeHtml = '<span class="badge bg-danger text-white"><i class="bi bi-x-circle me-1"></i> Đã hủy</span>';
                                            }
                                            headerCol.innerHTML = badgeHtml;
                                        }

                                        // 2. Cập nhật Badge Trạng thái thanh toán
                                        const paymentBadge = orderCard.querySelector('.info-section span.badge');
                                        
                                        // 2.1 Cập nhật Nút thao tác (Action buttons)
                                        const actionButtons = orderCard.querySelector('.action-buttons');
                                        if (actionButtons) {
                                            let buttonsHtml = '';
                                            if (order.order_status === 'pending') {
                                                buttonsHtml = `
                                                    <button type="button" class="btn btn-outline-danger btn-sm px-3" data-bs-toggle="modal"
                                                        data-bs-target="#cancelOrderModal" data-order-id="${order.id}">
                                                        <i class="bi bi-trash3 me-1"></i> Hủy đơn hàng này
                                                    </button>
                                                `;
                                            } else if (order.order_status === 'completed') {
                                                if (order.is_reviewed) {
                                                    buttonsHtml += `
                                                        <button type="button" class="btn btn-outline-success btn-sm px-3" disabled>
                                                            <i class="bi bi-check-circle-fill me-1"></i> Đã đánh giá
                                                        </button>
                                                    `;
                                                } else {
                                                    buttonsHtml += `
                                                        <button type="button" class="btn btn-warning text-dark btn-sm fw-bold px-3"
                                                            data-bs-toggle="modal" data-bs-target="#reviewOrderModal" data-order-id="${order.id}">
                                                            <i class="bi bi-star-fill me-1"></i> Viết đánh giá
                                                        </button>
                                                    `;
                                                }

                                                if (order.payment_status === 'refunded') {
                                                    buttonsHtml += `
                                                        <span class="badge bg-dark text-white d-flex align-items-center px-3"><i class="bi bi-arrow-counterclockwise me-1"></i> Đã hoàn tiền</span>
                                                    `;
                                                } else if (order.has_refund_request) {
                                                    buttonsHtml += `
                                                        <span class="badge bg-secondary text-white d-flex align-items-center px-3"><i class="bi bi-clock me-1"></i> Đã yêu cầu hoàn tiền</span>
                                                    `;
                                                } else {
                                                    buttonsHtml += `
                                                        <button type="button" class="btn btn-outline-secondary btn-sm px-3" data-bs-toggle="modal"
                                                            data-bs-target="#refundOrderModal" data-order-id="${order.id}" data-amount="${new Intl.NumberFormat('vi-VN').format(order.final_amount)} đ" data-raw-amount="${order.final_amount}">
                                                            <i class="bi bi-arrow-counterclockwise me-1"></i> Yêu cầu hoàn tiền
                                                        </button>
                                                    `;
                                                }
                                            }
                                            actionButtons.innerHTML = buttonsHtml;
                                        }

                                        if (paymentBadge) {
                                            paymentBadge.className = 'badge';
                                            if (order.payment_status === 'pending') {
                                                paymentBadge.classList.add('bg-warning', 'text-dark');
                                                paymentBadge.innerText = 'Chờ thanh toán';
                                            } else if (order.payment_status === 'paid') {
                                                paymentBadge.classList.add('bg-success', 'text-white');
                                                paymentBadge.innerText = 'Đã thanh toán';
                                            } else if (order.payment_status === 'failed') {
                                                paymentBadge.classList.add('bg-danger', 'text-white');
                                                paymentBadge.innerText = 'Thất bại';
                                            } else if (order.payment_status === 'refunded') {
                                                paymentBadge.classList.add('bg-info', 'text-dark');
                                                paymentBadge.innerText = 'Đã hoàn tiền';
                                            }
                                        }

                                        // 3. Hiển thị thông báo Alert trên thẻ đơn hàng
                                        let statusText = '';
                                        switch(order.order_status) {
                                            case 'pending': statusText = 'chờ xác nhận'; break;
                                            case 'confirmed': statusText = 'đã xác nhận'; break;
                                            case 'preparing': statusText = 'đang chuẩn bị món'; break;
                                            case 'delivering': statusText = 'đang được giao'; break;
                                            case 'completed': statusText = 'đã hoàn tất giao nhận'; break;
                                            case 'cancelled': statusText = 'đã bị hủy'; break;
                                        }

                                        const alertDiv = document.createElement('div');
                                        alertDiv.className = 'alert alert-info alert-dismissible fade show mt-3 mb-2';
                                        alertDiv.role = 'alert';
                                        alertDiv.innerHTML = `
                                            <i class="bi bi-info-circle-fill me-2"></i>
                                            Đơn hàng <strong>#FDL-${order.id}</strong> của bạn vừa cập nhật trạng thái: <strong class="text-uppercase">${statusText}</strong>!
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        `;
                                        
                                        // Xóa các Alert cũ nếu có trong card
                                        const oldAlerts = orderCard.querySelectorAll('.alert-info');
                                        oldAlerts.forEach(el => el.remove());
                                        
                                        orderCard.querySelector('.order-header').after(alertDiv);

                                        // 4. Phát âm thanh bíp thông báo
                                        try {
                                            const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
                                            const oscillator = audioCtx.createOscillator();
                                            oscillator.type = 'sine';
                                            oscillator.frequency.setValueAtTime(587.33, audioCtx.currentTime); // D5 note
                                            oscillator.connect(audioCtx.destination);
                                            oscillator.start();
                                            oscillator.stop(audioCtx.currentTime + 0.2);
                                        } catch (err) {
                                            console.log('Audio error:', err);
                                        }
                                    }
                                });
                            }
                        })
                        .catch(err => console.error('Error during cart polling:', err));
            }
            
            // Settings/Logo Polling in Cart view
            let currentLogoUrl = "{{ isset($settings['logo_url']) ? (\Illuminate\Support\Str::startsWith($settings['logo_url'], 'http') ? $settings['logo_url'] : asset($settings['logo_url'])) : asset('logo.jpg') }}";
            
            function pollCartSettings() {
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
                    .catch(err => console.error('Error polling settings in cart view:', err));
            }
            setInterval(pollCartSettings, 2000);
        });
    </script>
</body>

</html>