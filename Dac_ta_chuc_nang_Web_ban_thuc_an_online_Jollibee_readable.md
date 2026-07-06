Đề tài: Website Bán thức ăn online
Chi tiết đề tài:
Hình thức B2C(doanh nghiệp tới người tiêu dùng) 
Doanh nghiệp:
Quản lý: cho phép chỉnh sửa thực đơn(giá, hình ảnh), gói chương trinh(theo ngày/tháng), khuyến mãi, xem danh sách tài khoản khách hàng/đơn hàng, tạo tài khoản nhân viên
Nhân viên: tương tác(tư vấn/xác nhận) với khách hàng, xác nhân đóng hàng, giao hàng, hoàn tiền
Khách hàng: tìm kiếm thực đơn, chương trình, khuyến mãi, đặt hàng, đăng ký gói, đánh giá
II. ĐẶC TẢ
TỔNG QUAN
Hệ thống gồm 3 phân hệ chính:
Phân hệ Quản trị (Admin Dashboard) – dành cho doanh nghiệp, nhân viên.
Phân hệ Người dùng có tài khoản (Member Portal) – dành cho khách hàng đã đăng ký.
Phân hệ Khách vãng lai (Guest Checkout) – dành cho khách chưa đăng ký, chỉ cần số điện thoại & email.
Dữ liệu người dùng được tách thành 2 bảng riêng: customers (khách hàng) và staff (nhân viên).
Không dùng chung bảng users.
PHÂN HỆ QUẢN TRỊ (DÀNH CHO DOANH NGHIỆP & NHÂN VIÊN)
2.1. Quản lý người dùng & Khách hàng
Xem danh sách khách hàng
Hiển thị danh sách khách hàng đã đăng ký tài khoản (họ tên, email, số điện thoại, điểm tích lũy, ngày đăng ký, tổng chi tiêu).
Có bộ lọc theo: Đã đặt hàng lần đầu, Đang dùng gói, Đã hoàn tiền, Không hoạt động >3 tháng.
Xem danh sách khách vãng lai (guest)
Danh sách các đơn hàng được đặt bởi guest (lưu theo email/SĐT), không có tài khoản. Hỗ trợ gộp đơn theo cùng email/SĐT để tiện chăm sóc.
Quản lý trạng thái khách hàng
Nhân viên có thể cập nhật thủ công trạng thái: Mới đăng ký, Đã đặt hàng lẻ, Đang dùng gói dịch vụ, Yêu cầu hoàn tiền, Đã hoàn tiền, Chặn tài khoản.
Xem lịch sử dịch vụ/đơn hàng
Click vào từng khách hàng (kể cả guest nếu gộp đơn) để xem chi tiết tất cả đơn hàng món lẻ và gói dịch vụ đã/kỳ đăng ký.
2.2. Quản lý Đơn hàng, Dịch vụ & Phản hồi
Xử lý đơn hàng & gói dịch vụ
Nhân viên có thể thay đổi trạng thái đơn hàng theo quy trình:
=> Chờ xác nhận → Đã xác nhận → Đang chuẩn bị → Đang giao → Đã giao / Tạm dừng / Đã hủy.
Mỗi lần thay đổi, hệ thống tự động gửi email thông báo cho khách (nếu có email).
Ghi chú đặc biệt (dị ứng, yêu cầu)
Hiển thị nổi bật các ghi chú của khách ngay trên màn hình xử lý đơn để nhà bếp biết.
Xử lý phản hồi & đánh giá
Xem danh sách đánh giá, bình luận, hình ảnh từ khách hàng.
Xử lý hoàn tiền (Refund)
Với khách có tài khoản: Nhân viên nhận yêu cầu, kiểm tra đơn hàng, phê duyệt → doanh nghiệp sẽ là bên thực hiện giao dịch hoàn tiền và xác nhận lại trên web → lưu lại lịch sử hoàn tiền kèm phương thức.
Với khách vãng lai: Khi khách gửi yêu cầu hoàn tiền qua form (cần nhập mã đơn hàng + email/SĐT), hệ thống gửi mã xác thực (OTP) vào email/SĐT đó. Nhân viên xác nhận sau khi OTP hợp lệ → tiến hành hoàn tiền thủ công, kiểm tra đơn hàng, phê duyệt 
Trạng thái hoàn tiền: Chờ duyệt → Đã duyệt → Đã hoàn / Từ chối.
Chỉ nhân viên có quyền refund approval (≥50%) mới được duyệt hoàn tiền.
2.3. Quản lý Thực đơn & Khuyến mãi
Quản lý món ăn
Thêm, sửa, xóa món (trên, hình, giá, danh mục, mô tả, nguyên liệu chính).
Trạng thái món: Còn hàng / Hết hàng – đồng bộ realtime lên website.
Quản lý gói dịch vụ (Subscription/Combo)
Tạo gói theo số ngày (7, 30, 90 ngày) hoặc theo suất (bữa sáng, trưa, tối).
Mỗi gói có danh sách món ăn mặc định, cho phép khách đổi món trong giới hạn (cùng giá hoặc chênh lệch tính thêm).
Quản lý chương trình khuyến mãi
Tạo mã giảm giá (mã code, % hoặc số tiền, thời gian hiệu lực, số lần sử dụng).
Soạn nội dung email, kèm mã khuyến mãi tự động sinh hoặc chọn mã có sẵn.
Nhấn “Gửi ngày” → hệ thống đẩy vào hàng đợi (queue) để gửi email đến hàng nghìn khách mà không làm chậm website.
Lưu lịch sử gửi (ngày gửi, nội dung, số lượng gửi thành công/thất bại).
2.4. Quản lý nhân viên & Phân quyền (dựa trên vai trò và % quyền)
Bảng riêng staff gồm: id, họ tên, email, số điện thoại, mật khẩu, role_id, ngày tạo, người tạo, trạng thái (hoạt động/khóa).
Bảng roles gồm: id, tên vai trò, mức quyền (permission level):
100% – Super Admin: toàn quyền (thêm/xóa nhân viên, phân quyền Manager, xem mọi báo cáo).
50% – Quản lý (Manager): được duyệt hoàn tiền, xem báo cáo, xem danh sách khách hàng, xem thực đơn, quản lý khuyến mãi, quản lý thực đơn, không thể tạo/xóa admin.
20% – Nhân viên (Staff): chỉ cập nhật trạng thái đơn hàng, xem danh sách khách hàng, xem thực đơn, không được xem doanh thu chi tiết, không được duyệt hoàn tiền.
Phân quyền chi tiết (RBAC): Mỗi vai trò có tập quyền cụ thể (ví dụ: order update, refund approval, staff create, report view, …). Khi tạo nhân viên, bắt buộc chọn một vai trò. Nhân viên chỉ được thao tác các chức năng trong vai trò đó.
2.5. Hệ thống Thông báo & Email
Cho phép doanh nghiệp thực hiện gửi email mã khuyến mãi tự động đến hàng trăm, nghìn khách hàng thông qua nút bấm
Xác nhận đơn hàng thành công (quản lý/nhân quyên có quyền sẽ thực hiện hiển thị thông báo trên web và email qua nút bấm)
Cập nhật trạng thái đơn hàng (quản lý/nhân quyên có quyền sẽ thực hiện hiển thị thông báo trên web qua nút bấm)
Thông báo hạn gói dịch vụ theo ngày (hệ thống tự gửi qua email và hiển thị trên web)
Xác nhận hoàn tiền (quản lý/nhân quyên có quyền sẽ thực hiện gửi thông qua nút bấm)
2.6. Báo cáo & Thống kê – Xuất Excel
Dashboard hiển thị biểu đồ: doanh thu theo ngày/tuần/tháng, số đơn hàng, số gói dịch vụ đang hoạt động, số khách mới, tổng điểm đã đổi.
Xuất báo cáo Excel (.xlsx) cho: doanh thu, danh sách đơn hàng, danh sách khách hàng (cả member lẫn guest đã gộp), danh sách món ăn bán chạy, báo cáo hoàn tiền.
PHÂN HỆ NGƯỜI DÙNG (KHÁCH HÀNG)
3.1. Đăng ký / Đăng nhập / Guest Checkout
Khách vãng lai (Guest)
Khi vào đặt hàng, khách chỉ cần nhập Số điện thoại và Email (không cần mật khẩu). Hệ thống tạo phiên đặt hàng, lưu thông tin guest vào bảng orders.
Sau khi đặt phòng, khách có thể nhận thông báo qua email về trạng thái đơn hàng nhưng không có tài khoản để xem lịch sử.
Nếu sau đó khách đăng ký tài khoản bằng chính email/SĐT đó, hệ thống sẽ gộp lịch sử đơn hàng guest vào tài khoản mới.
Đăng ký tài khoản (Member)
Khách tạo tài khoản bằng email/SĐT, đặt mật khẩu. Được lưu vào bảng customers.
3.2. Xem thông tin doanh nghiệp
Trang giới thiệu, địa chỉ, hotline, chính sách bảo mật, chính sách hoàn tiền
3.3. Tìm kiếm & Đặt hàng
Tìm kiếm món ăn, gói dịch vụ, khuyến mãi.
Đặt hàng món lẻ: chọn món, số lượng, thêm ghi chú (dị ứng, yêu cầu).
Đăng ký gói dịch vụ: chọn gói, chọn ngày bắt đầu, chọn các món trong gói (nếu được đổi món ngày khi đăng ký).
Áp mã giảm giá (nếu có).
Chọn phương thức thanh toán: COD, chuyển khoản, ví điện tử (tích hợp sau).
Xác nhận đơn hàng → nhận email xác nhận.
3.4. Theo dõi & Quản lý đơn hàng / gói dịch vụ
Dành cho khách có tài khoản:
Trang “Lịch sử đặt hàng”: xem danh sách tất cả đơn hàng (món lẻ và gói), trạng thái, ngày đặt, tổng tiền.
Click vào từng đơn hàng để xem chi tiết, theo dõi tiến trình giao hàng (dạng timeline).
Đối với gói dịch vụ dài ngày: hiển thị lịch trình (Calendar) từng ngày giao món gì. Khách thấy được: ngày hôm nay giao món nào, còn bao nhiêu ngày trong gói, ngày kết thúc.
Dành cho khách vãng lai:
Không có trang lịch sử. Để theo dõi đơn hàng, khách phải dùng link tra cứu được gửi qua email sau khi đặt hàng (mã đơn hàng + email/SĐT).
Link tra cứu cho phép xem trạng thái hiện tại, không có chức năng đổi món, tạm dừng (vì không có tài khoản).
3.5. Tính năng linh hoạt cho gói dịch vụ (chỉ dành cho khách có tài khoản)
Đổi món trong gói
Khách hàng có thể đổi món của một ngày cụ thể trong lịch trình (nếu còn trong thời gian cho phép). Quy định:
Trước 22h ngày hôm trước thì được đổi món cho ngày hôm sau (có thể cấu hình). Hệ thống kiểm tra giá trị món đổi (có thể phải trả thêm tiền hoặc hoàn chênh lệch dưới dạng điểm).
Tạm dừng và dời ngày
Khách có thể tạm dừng gói vào những ngày bận (không nhận đồ). Hệ thống tự động dời những ngày đó xuống cuối chu kỳ, gia hạn ngày kết thúc tương ứng.
Ví dụ: Gói 30 ngày, tạm dừng 2 ngày → gói còn 28 ngày, ngày kết thúc cộng thêm 2 ngày.
3.6. Đánh giá & Phản hồi
Sau khi đơn hàng chuyển sang trạng thái Đã giao, khách hàng (có tài khoản) có thể chấm sao (1-5 sao), viết bình luận, tải ảnh lên.
Khách vãng lai cũng có thể đánh giá thông qua link tra cứu đơn hàng (sau khi xác thực email/SĐT).
Admin có thể phản hồi đánh giá.
CÁC LOGIC CỐT LÕI CẦN XỬ LÝ KỸ THUẬT
Đồng bộ trạng thái món ăn realtime
Khi Admin bật/tắt “hết hàng”, trên website ngay lập tức ẩn nút đặt hoặc hiển thị “Tạm hết”.
Khóa sổ đổi món
Chỉ cho phép đổi món trước một mốc giờ cố định (ví dụ 22h). Sau mốc đó, món ngày hôm sau bị khóa, không thể đổi.
Tính ngày khi tạm dừng/dời ngày
Lưu lại bảng subscription pauses (id, subscription_id, start pause date, end_pause_date). Khi tính ngày kết thúc mới, lấy tổng số ngày tạm dừng (không overlap) cộng vào original end_date.
Gửi email hàng loạt không làm chậm website
Sử dụng hàng đợi (database queue, Redis, hoặc Laravel queue). Khi admin bấm gửi, tạo các job gửi email, mỗi job gửi 1 email hoặc batch nhỏ. Hiển thị thông báo “Đang gửi, vui lòng kiểm tra sau”.
Gộp đơn khách vãng lai khi khách đăng ký tài khoản
Khi đăng ký với email/SĐT đã từng đặt hàng guest, hệ thống tìm tất cả đơn hàng có guest email hoặc guest_phone trùng, cập nhật customer_id về id vừa tạo. Lịch sử hiển thị đầy đủ sau khi gộp.
Phân quyền kiểm tra trên mọi request
Xây dựng middleware kiểm tra rơle và permission. Nhân viên chỉ được truy cập đúng các route/API tương ứng với quyền của vai trò.
III. LƯỢC ĐỒ CƠ SỞ DỮ LIỆU
1. Phân hệ Quản trị & Phân quyền
USER(USER_ID, FULLNAME, EMAIL, PHONE, PASSWORD_HASH, CREATE_AT, STATUS)
ROLE(ROLE_ID, ROLE_NAME, DESCRIPTION)
USER_ROLE(USER_ID, ROLE_ID)
2. Phân hệ Thực đơn & Khuyến mãi
CATEGORY(CATEGORY_ID, CATEGORY_NAME, DESCRIPTION, CREATE_AT)
DISH(DISH_ID, CATEGORY_ID, DISH_NAME, IMAGE_URL, PRICE, DESCRIPTION, IS_AVAILABLE, CREATE_AT)
SERVICE_PACKAGE(PACKAGE_ID, PACKAGE_NAME, DESCRIPTION, PRICE, DURATION_DAYS, STATUS, CREATE_AT)
PACKAGE_DISH(PACKAGE_ID, DISH_ID)
COUPON(COUPON_ID, COUPON_CODE, DISCOUNT_TYPE, DISCOUNT_VALUE, MIN_ORDER_VALUE, START_DATE, END_DATE, USAGE_LIMIT, CREATE_AT)
3. Phân hệ Đơn hàng & Gói dịch vụ (Subscription)
ORDERS(ORDER_ID, USER_ID, COUPON_ID, ORDER_TYPE, TOTAL_AMOUNT, FINAL_AMOUNT, PAYMENT_METHOD, PAYMENT_STATUS, ORDER_STATUS, HEALTH_NOTES, CREATE_AT)
ORDER_ITEM(ORDER_ITEM_ID, ORDER_ID, DISH_ID, QUANTITY, PRICE)
SUBSCRIPTION(SUBSCRIPTION_ID, ORDER_ID, USER_ID, PACKAGE_ID, START_DATE, END_DATE, REMAINING_DAYS, STATUS, CREATE_AT)
4. Phân hệ Vận hành, Lịch trình & Phản hồi (Logic Cốt Lõi)
DAILY_SCHEDULE(SCHEDULE_ID, SUBSCRIPTION_ID, DELIVERY_DATE, DISH_ID, DELIVERY_STATUS, IS_LOCKED, UPDATE_AT)
SUBSCRIPTION_PAUSE(PAUSE_ID, SUBSCRIPTION_ID, PAUSE_START_DATE, PAUSE_END_DATE, CREATE_AT)
REVIEW(REVIEW_ID, USER_ID, ORDER_ID, RATING, COMMENT, IMAGE_URL, CREATE_AT)
API ứng dụng vô project
  Google OAuth 2.0: Hỗ trợ đăng nhập nhanh bằng tài khoản Google.
  Pusher Channels: Hỗ trợ realtime cho chat, thông báo và dashboard quản trị.
  Google Gemini AI: Hỗ trợ chatbot gợi ý món ăn dựa trên dữ liệu sản phẩm trong hệ thống.
  PayOS kết hợp VietQR/QR thanh toán: Hỗ trợ tạo giao dịch/chuyển khoản trực tuyến và hiển thị mã QR để khách hàng quét bằng ứng dụng ngân hàng.
  Cloudinary: Lưu trữ, phân phối và tối ưu hình ảnh sản phẩm, banner, quà tặng.
  Telegram Bot/Webhook: Hỗ trợ kênh thông báo hoặc trao đổi tin nhắn liên quan đến quản trị/chat.
  OpenStreetMap Nominatim: Hỗ trợ tìm tọa độ từ địa chỉ và lấy địa chỉ từ tọa độ.
  Google Maps Embed/Directions: Hiển thị bản đồ và chỉ đường đến chi nhánh.
  Vietnam Provinces API: Hỗ trợ chọn tỉnh/thành, quận/huyện, phường/xã.
  OpenWeatherMap: Hiển thị thông tin thời tiết trên khu vực quản trị.
  Gmail SMTP/PHPMailer: Gửi email cho các luồng như quên mật khẩu, xác thực hoặc thông báo.
