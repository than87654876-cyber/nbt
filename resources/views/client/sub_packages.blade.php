<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Gói dịch vụ của tôi - FOODELICIOUS</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="logo.jpg" rel="icon">
    <link href="client/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Vendor CSS Files -->
    <link href="client/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="client/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="client/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="client/assets/css/main.css" rel="stylesheet">

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
            <a href="#" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="logo.jpg" alt="">
                <h1 class="sitename">FOODELICIOUS</h1><span>.</span>
            </a>
    </header>
    <main class="main">
        <div class="cart-container">
            <div class="container">
                <a href="{{ route('trangchu_dangnhap') }}" class="back-btn"><i class="bi bi-arrow-left"></i> Quay lại
                    cửa hàng</a>
                <h1 class="section-title"><i class="bi bi-box-seam-fill"></i> Gói dịch vụ ăn uống của tôi</h1>

                <!-- ĐƠN GÓI DỊCH VỤ 1 -->
                <div class="order-card text-dark">
                    <div class="order-header">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="order-id">Gói đăng ký: GÓI GIA ĐÌNH HÀNG NGÀY (30 Ngày)</div>
                                <div class="order-date">Mã đơn mua: <strong>#FDL-6102</strong></div>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <span class="badge bg-success"><i class="bi bi-play-circle-fill me-1"></i> Đang hoạt
                                    động</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tiến độ dịch vụ (Ngày hiện tại, Ngày kết thúc) -->
                    <div class="timeline-container mb-3 shadow-sm border">
                        <div class="d-flex justify-content-between font-weight-bold small mb-2">
                            <span><i class="bi bi-calendar-check text-success"></i> Ngày bắt đầu: 01/06/2026</span>
                            <span class="text-primary">Tiến độ: Ngày 18 / 30</span>
                            <span><i class="bi bi-calendar-x text-danger"></i> Ngày kết thúc: 30/06/2026</span>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                aria-valuemax="100">60%</div>
                        </div>
                    </div>

                    <!-- Thông tin thực đơn hôm nay & Ngày mai -->
                    <div class="info-section">
                        <div class="row">
                            <div class="col-md-6 border-end">
                                <div class="info-title text-primary"><i class="bi bi-egg-fried"></i> Thực đơn ngày mai
                                    (Ngày 19 - 18/06):</div>
                                <div class="fw-bold mb-2">Phở Bò Đặc Biệt + Cà phê sữa đá pha phin</div>
                                <!-- Thao tác đổi món / Ghi chú cho ngày mai -->
                                <button type="button" class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                                    data-bs-target="#changeMenuModal" data-day="19"><i
                                        class="bi bi-arrow-left-right"></i> Đổi món ngày mai</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#noteDayModal" data-day="19"><i class="bi bi-pencil-square"></i> Ghi
                                    chú ngày mai</button>
                            </div>
                            <div class="col-md-6 ps-md-4">
                                <div class="info-title text-secondary"><i class="bi bi-gear-fill"></i> Quản lý trạng
                                    thái gói dài hạn:</div>
                                <p class="small text-muted mb-2">Bạn có việc bận đột xuất? Bạn có thể tạm ngưng nhận món
                                    ăn hoặc hủy gói bất kỳ lúc nào.</p>
                                <button type="button" class="btn btn-sm btn-warning text-dark me-2"
                                    data-bs-toggle="modal" data-bs-target="#pauseServiceModal"><i
                                        class="bi bi-pause-circle-fill"></i> Tạm ngưng gói</button>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#cancelServiceModal"><i class="bi bi-x-octagon"></i> Hủy dịch
                                    vụ</button>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                        <div class="small text-muted">* Đã giao thành công 17 ngày ăn uống ngon miệng.</div>
                        <!-- Nút viết đánh giá dịch vụ tổng thể -->
                        <button type="button" class="btn btn-sm btn-outline-warning text-dark fw-bold"
                            data-bs-toggle="modal" data-bs-target="#reviewServiceModal"><i class="bi bi-star-fill"></i>
                            Đánh giá chất lượng gói</button>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- ======================================================= -->
    <!-- KHU VỰC CÁC MODAL THAO TÁC INTERACTION -->
    <!-- ======================================================= -->

    <!-- MODAL 1: YÊU CẦU ĐỔI MÓN -->
    <div class="modal fade" id="changeMenuModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-dark">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold"><i class="bi bi-arrow-left-right me-2"></i>Yêu cầu đổi món ăn thực
                        đơn</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="#" method="POST">
                    <div class="modal-body">
                        <p>Hệ thống hỗ trợ đổi món ăn cho lịch trình <strong class="text-primary">Ngày <span
                                    id="change-day-display">X</span></strong> (Hạn chót thay đổi trước 21h hôm nay):</p>
                        <div class="form-group mb-3">
                            <label class="form-label small fw-bold">Chọn món thay thế mong muốn:</label>
                            <select class="form-select" name="new_dish_id" required>
                                <option value="" selected disabled>-- Chọn thực đơn thay thế có sẵn --</option>
                                <option value="1">Cơm tấm sườn bì chả đặc biệt + Trà đá</option>
                                <option value="2">Bún bò Huế giò gân + Nước ngọt chanh dây</option>
                                <option value="3">Mì vằn thắn xá xíu + Pudding tráng miệng</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
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
            <div class="modal-content text-dark">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title fw-bold"><i class="bi bi-pencil-square me-2"></i>Ghi chú giao hàng cho ngày
                        mai</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="#" method="POST">
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="day_note" class="form-label small fw-bold">Nhập yêu cầu giao hàng cụ thể cho
                                Ngày <span id="note-day-display">X</span>:</label>
                            <textarea class="form-control" id="day_note" name="day_note" rows="3"
                                placeholder="Ví dụ: Ngày mai giao trễ hơn 30 phút, không lấy hành lá, giao lên lầu 3 phân hiệu văn phòng giúp tôi..."
                                required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
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
            <div class="modal-content text-dark">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title fw-bold"><i class="bi bi-pause-circle-fill me-2"></i>Yêu cầu tạm ngưng nhận
                        món</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="#" method="POST">
                    <div class="modal-body">
                        <p>Hệ thống sẽ tạm đóng băng gói dịch vụ dài hạn của bạn. Lịch giao hàng sẽ được bảo lưu và cộng
                            dồn bù vào chu kỳ sau khi bạn kích hoạt mở lại.</p>
                        <div class="form-group mb-3">
                            <label for="pause_days" class="form-label small fw-bold">Số ngày tạm ngưng dự kiến:</label>
                            <select class="form-select" id="pause_days" name="pause_days" required>
                                <option value="3">Tạm ngưng 3 ngày tiếp theo</option>
                                <option value="7">Tạm ngưng 1 tuần</option>
                                <option value="unknown">Tạm ngưng cho đến khi tôi thông báo mở lại</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
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
            <div class="modal-content text-dark">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title fw-bold"><i class="bi bi-x-octagon me-2"></i>Yêu cầu chấm dứt/Hủy ngang gói
                        dịch vụ</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="#" method="POST">
                    <div class="modal-body">
                        <div class="alert alert-warning border-0 small"><i class="bi bi-info-circle-fill me-1"></i> Số
                            tiền tương ứng với các ngày ăn chưa sử dụng còn lại (12 ngày) sẽ được hoàn trả về tài khoản
                            ngân hàng của bạn sau khi trừ 5% phí hủy hợp đồng.</div>
                        <div class="form-group">
                            <label for="cancel_reason" class="form-label small fw-bold">Vui lòng cho cửa hàng biết lý do
                                hủy:</label>
                            <textarea class="form-control" id="cancel_reason" name="cancel_reason" rows="2"
                                placeholder="Lý do cá nhân, món ăn không phù hợp..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
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
            <div class="modal-content text-dark">
                <div class="modal-header bg-light border-bottom">
                    <h5 class="modal-title fw-bold text-dark"><i class="bi bi-star-fill text-warning me-2"></i>Đánh giá
                        trải nghiệm gói dịch vụ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="#" method="POST">
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
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary shadow-sm" data-bs-dismiss="modal">Trở
                            lại</button>
                        <button type="submit" class="btn btn-warning text-dark fw-bold shadow-sm px-4">Gửi nhận
                            xét</button>
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

    <!-- Script điều động gán thông tin chu kỳ ngày vào Modal -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Gán dữ liệu ngày đặt cho Modal đổi món
            const changeMenuModal = document.getElementById('changeMenuModal');
            if (changeMenuModal) {
                changeMenuModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const day = button.getAttribute('data-day');
                    document.getElementById('change-day-display').innerText = day;
                });
            }

            // Gán dữ liệu ngày đặt cho Modal ghi chú theo ngày
            const noteDayModal = document.getElementById('noteDayModal');
            if (noteDayModal) {
                noteDayModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const day = button.getAttribute('data-day');
                    document.getElementById('note-day-display').innerText = day;
                });
            }
        });
    </script>
</body>

</html>