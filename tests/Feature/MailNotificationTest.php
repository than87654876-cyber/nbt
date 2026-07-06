<?php

namespace Tests\Feature;

use App\Mail\WelcomeMail;
use App\Mail\ResetPasswordMail;
use App\Mail\OrderPlacedMail;
use App\Mail\CouponPromoMail;
use App\Models\User;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class MailNotificationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test client registration triggers WelcomeMail.
     */
    public function test_registration_sends_welcome_mail()
    {
        Mail::fake();

        $response = $this->post(route('trangchu/dangky.post'), [
            'fullname' => 'Nguyen Van A',
            'email' => 'nguyenvana@example.com',
            'phone' => '0987654321',
            'address' => '123 HCM City',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'terms' => 'on',
        ]);

        $response->assertRedirect(route('trangchu'));

        Mail::assertQueued(WelcomeMail::class, function ($mail) {
            return $mail->hasTo('nguyenvana@example.com') && $mail->fullname === 'Nguyen Van A';
        });
    }

    /**
     * Test forgot password triggers OTP email and verification flow.
     */
    public function test_client_forgot_password_sends_otp_and_verifies()
    {
        // Mock PHPMailerService
        $mockMailer = $this->createMock(\App\Services\PHPMailerService::class);
        $mockMailer->expects($this->once())
            ->method('send')
            ->willReturn(true);
        $this->app->instance(\App\Services\PHPMailerService::class, $mockMailer);

        $user = User::create([
            'fullname' => 'Customer User',
            'email' => 'customer@example.com',
            'password' => bcrypt('oldpassword'),
            'role' => 'customer',
            'status' => true,
        ]);

        // Request OTP
        $response = $this->post(route('trangchu/quenmatkhau.post'), [
            'email' => 'customer@example.com',
        ]);

        $response->assertRedirect(route('trangchu/quenmatkhau/xacnhan', ['email' => 'customer@example.com']));
        
        $user->refresh();
        $this->assertNotNull($user->password_reset_token);
        $this->assertEquals(6, strlen($user->password_reset_token));
        $this->assertNotNull($user->password_reset_expires_at);

        // Verify with invalid OTP should fail
        $verifyFailResponse = $this->post(route('trangchu/quenmatkhau/xacnhan.post'), [
            'email' => 'customer@example.com',
            'otp' => '000000',
            'password' => 'newpassword123',
            'password_confirmation' => 'newpassword123',
        ]);
        $verifyFailResponse->assertSessionHasErrors(['otp']);

        // Verify with valid OTP should succeed
        $verifySuccessResponse = $this->post(route('trangchu/quenmatkhau/xacnhan.post'), [
            'email' => 'customer@example.com',
            'otp' => $user->password_reset_token,
            'password' => 'newpassword123',
            'password_confirmation' => 'newpassword123',
        ]);

        $verifySuccessResponse->assertRedirect(route('dangnhap'));
        $verifySuccessResponse->assertSessionHas('success');

        $user->refresh();
        $this->assertNull($user->password_reset_token);
        $this->assertNull($user->password_reset_expires_at);
        $this->assertTrue(\Illuminate\Support\Facades\Hash::check('newpassword123', $user->password));
    }

    /**
     * Test checkout triggers OrderPlacedMail.
     */
    public function test_checkout_sends_order_placed_mail()
    {
        Mail::fake();

        $user = User::create([
            'fullname' => 'Order Client',
            'email' => 'orderclient@example.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
            'status' => true,
        ]);

        $category = Category::create([
            'category_name' => 'Fried Chicken',
        ]);

        $dish = Dish::create([
            'category_id' => $category->id,
            'dish_name' => 'Jollibee Chicken',
            'price' => 35000,
            'is_available' => true,
        ]);

        $this->actingAs($user);

        $cartItems = [
            [
                'id' => $dish->id,
                'quantity' => 2,
            ]
        ];

        $response = $this->post(route('muahang.process'), [
            'cart_phone' => '0912345678',
            'cart_address' => '456 Le Loi, District 1',
            'cart_time' => 'now',
            'cart_payment' => 'cod',
            'cart_items' => json_encode($cartItems),
        ]);

        $response->assertRedirect(route('giohang'));

        Mail::assertQueued(OrderPlacedMail::class, function ($mail) use ($user) {
            return $mail->hasTo('orderclient@example.com') && $mail->order->final_amount == 70000;
        });
    }

    /**
     * Test admin coupon dispatcher triggers CouponPromoMail.
     */
    public function test_admin_coupon_dispatch_sends_promo_mail()
    {
        // Mock PHPMailerService
        $mockMailer = $this->createMock(\App\Services\PHPMailerService::class);
        $mockMailer->expects($this->once())
            ->method('sendWithTemplate')
            ->with(
                $this->equalTo('loyal@gmail.com'),
                $this->equalTo('Tri an khach hang vang'),
                $this->equalTo('emails.coupon_promo'),
                $this->callback(function ($data) {
                    return $data['fullname'] === 'Loyal Customer' &&
                           $data['subjectText'] === 'Tri an khach hang vang' &&
                           $data['expiryDays'] == 30;
                })
            )
            ->willReturn(true);
        $this->app->instance(\App\Services\PHPMailerService::class, $mockMailer);

        $admin = User::create([
            'fullname' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'status' => true,
        ]);

        $customer = User::create([
            'fullname' => 'Loyal Customer',
            'email' => 'loyal@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
            'status' => true,
            'membership' => 'gold',
        ]);

        $this->actingAs($admin);

        $response = $this->post(route('quanly_guima.post'), [
            'discount_value' => 50000,
            'discount_type' => 'fixed',
            'code_length' => 8,
            'expiry_days' => 30,
            'min_order' => 100000,
            'email_subject' => 'Tri an khach hang vang',
            'message_body' => 'Chuc mung [MÃ_TỰ_SINH] han dung [SỐ_NGÀY] ngay.',
            'ranks' => ['gold'],
        ]);

        $response->assertSessionHasNoErrors();
    }

    /**
     * Test SendPromoCouponEmail Job in isolation.
     */
    public function test_send_promo_coupon_email_job_in_isolation()
    {
        // Mock PHPMailerService
        $mockMailer = $this->createMock(\App\Services\PHPMailerService::class);
        $mockMailer->expects($this->once())
            ->method('sendWithTemplate')
            ->with(
                $this->equalTo('testjob@example.com'),
                $this->equalTo('Subject Test'),
                $this->equalTo('emails.coupon_promo'),
                $this->callback(function ($data) {
                    return $data['fullname'] === 'Job User' &&
                           $data['couponCode'] === 'CODE-123456' &&
                           $data['expiryDays'] == 15;
                })
            )
            ->willReturn(true);

        $job = new \App\Jobs\SendPromoCouponEmail(
            'testjob@example.com',
            'Job User',
            'CODE-123456',
            'Subject Test',
            'Nội dung mẫu',
            15
        );

        $job->handle($mockMailer);
    }

    /**
     * Test admin coupon dispatch with invalid target email domain fails.
     */
    public function test_admin_coupon_dispatch_with_invalid_target_email_domain_fails()
    {
        $admin = User::create([
            'fullname' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'status' => true,
        ]);

        $this->actingAs($admin);

        $response = $this->post(route('quanly_guima.post'), [
            'discount_value' => 50000,
            'discount_type' => 'fixed',
            'code_length' => 8,
            'expiry_days' => 30,
            'min_order' => 100000,
            'email_subject' => 'Tri an',
            'message_body' => 'Noi dung [MÃ_TỰ_SINH]',
            'target_email' => 'wrongdomain@example.com',
        ]);

        $response->assertSessionHas('error', 'Chỉ hỗ trợ gửi mã khuyến mãi đến địa chỉ Gmail kết thúc bằng @gmail.com!');
    }

    /**
     * Test admin coupon dispatch with non existent customer email fails.
     */
    public function test_admin_coupon_dispatch_with_non_existent_customer_email_fails()
    {
        $admin = User::create([
            'fullname' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'status' => true,
        ]);

        $this->actingAs($admin);

        $response = $this->post(route('quanly_guima.post'), [
            'discount_value' => 50000,
            'discount_type' => 'fixed',
            'code_length' => 8,
            'expiry_days' => 30,
            'min_order' => 100000,
            'email_subject' => 'Tri an',
            'message_body' => 'Noi dung [MÃ_TỰ_SINH]',
            'target_email' => 'nonexistentcustomer@gmail.com',
        ]);

        $response->assertSessionHas('error', 'Địa chỉ Gmail nhập vào không khớp với tài khoản khách hàng nào có sẵn trong hệ thống!');
    }

    /**
     * Test admin coupon dispatch with valid gmail customer succeeds.
     */
    public function test_admin_coupon_dispatch_with_valid_gmail_customer_succeeds()
    {
        // Mock PHPMailerService
        $mockMailer = $this->createMock(\App\Services\PHPMailerService::class);
        $mockMailer->expects($this->once())
            ->method('sendWithTemplate')
            ->willReturn(true);
        $this->app->instance(\App\Services\PHPMailerService::class, $mockMailer);

        $admin = User::create([
            'fullname' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'status' => true,
        ]);

        $customer = User::create([
            'fullname' => 'Valid Customer',
            'email' => 'validcustomer@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
            'status' => true,
        ]);

        $this->actingAs($admin);

        $response = $this->post(route('quanly_guima.post'), [
            'discount_value' => 50000,
            'discount_type' => 'fixed',
            'code_length' => 8,
            'expiry_days' => 30,
            'min_order' => 100000,
            'email_subject' => 'Tri an',
            'message_body' => 'Noi dung [MÃ_TỰ_SINH]',
            'target_email' => 'validcustomer@gmail.com',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('quanly_guima'));
        $this->assertDatabaseHas('coupons', [
            'discount_value' => 50000,
            'discount_type' => 'fixed',
        ]);
    }
}
