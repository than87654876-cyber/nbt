<?php

namespace Tests\Feature;

use App\Events\OrderUpdated;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class OrderAutomationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the orders:cancel-overdue command cancels pending unpaid orders older than 15 minutes.
     */
    public function test_command_cancels_overdue_orders()
    {
        Event::fake([OrderUpdated::class]);

        $customer = User::create([
            'fullname' => 'Test Customer',
            'email' => 'testcustomer@example.com',
            'phone' => '0912345678',
            'password' => bcrypt('password'),
            'role' => 'customer',
            'status' => true,
        ]);

        // 1. Create a recent pending order (should NOT be cancelled)
        $recentOrder = Order::create([
            'user_id' => $customer->id,
            'total_amount' => 100000,
            'final_amount' => 100000,
            'payment_method' => 'cash',
            'payment_status' => 'pending',
            'order_status' => 'pending',
        ]);
        $recentOrder->created_at = Carbon::now()->subMinutes(10);
        $recentOrder->saveQuietly();

        // 2. Create an overdue pending order (should be cancelled)
        $overdueOrder = Order::create([
            'user_id' => $customer->id,
            'total_amount' => 120000,
            'final_amount' => 120000,
            'payment_method' => 'cash',
            'payment_status' => 'pending',
            'order_status' => 'pending',
        ]);
        $overdueOrder->created_at = Carbon::now()->subMinutes(20);
        $overdueOrder->saveQuietly();

        // 3. Create an overdue but paid order (should NOT be cancelled)
        $paidOrder = Order::create([
            'user_id' => $customer->id,
            'total_amount' => 150000,
            'final_amount' => 150000,
            'payment_method' => 'cash',
            'payment_status' => 'paid',
            'order_status' => 'pending',
        ]);
        $paidOrder->created_at = Carbon::now()->subMinutes(25);
        $paidOrder->saveQuietly();

        // Run the custom Artisan command
        $this->artisan('orders:cancel-overdue')
            ->expectsOutput('Starting checking for overdue unpaid orders...')
            ->expectsOutput("Cancelled order FDL-{$overdueOrder->id}")
            ->expectsOutput('Successfully cancelled 1 overdue orders.')
            ->assertExitCode(0);

        // Assert database states
        $this->assertEquals('pending', $recentOrder->fresh()->order_status);
        $this->assertEquals('cancelled', $overdueOrder->fresh()->order_status);
        $this->assertEquals('pending', $paidOrder->fresh()->order_status);
        
        $this->assertStringContainsString('Tự động hủy đơn hàng quá hạn thanh toán', $overdueOrder->fresh()->health_notes);

        // Assert broadcasting event was dispatched for the cancelled order
        Event::assertDispatched(OrderUpdated::class, function ($event) use ($overdueOrder) {
            return $event->order->id === $overdueOrder->id && $event->action === 'cancelled';
        });

        Event::assertNotDispatched(OrderUpdated::class, function ($event) use ($recentOrder) {
            return $event->order->id === $recentOrder->id;
        });
    }

    /**
     * Test coupon validation API and its application during checkout.
     */
    public function test_coupon_validation_and_checkout_application()
    {
        $customer = User::create([
            'fullname' => 'Test Customer',
            'email' => 'testcustomer2@example.com',
            'phone' => '0912345678',
            'password' => bcrypt('password'),
            'role' => 'customer',
            'status' => true,
        ]);

        $category = \App\Models\Category::create([
            'category_name' => 'Test Category',
            'description' => 'Test Description'
        ]);

        $dish = \App\Models\Dish::create([
            'category_id' => $category->id,
            'dish_name' => 'Pho Test',
            'price' => 50000,
            'is_available' => true,
        ]);

        $coupon = \App\Models\Coupon::create([
            'coupon_code' => 'TESTCOUPON10',
            'discount_type' => 'percent',
            'discount_value' => 10,
            'min_order_value' => 40000,
            'start_date' => Carbon::now()->subDay()->format('Y-m-d'),
            'end_date' => Carbon::now()->addDay()->format('Y-m-d'),
            'usage_limit' => 10,
        ]);

        // 1. Test validateCoupon API - Valid request
        $response = $this->postJson(route('api.coupon.validate'), [
            'code' => 'TESTCOUPON10',
            'total_amount' => 50000
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'discount_amount' => 5000,
                'final_amount' => 45000
            ]);

        // 2. Test validateCoupon API - Min order value violation
        $responseErr = $this->postJson(route('api.coupon.validate'), [
            'code' => 'TESTCOUPON10',
            'total_amount' => 30000
        ]);

        $responseErr->assertStatus(200)
            ->assertJson([
                'success' => false,
            ]);

        // 3. Test processCheckout applying coupon
        $cartItems = json_encode([
            ['id' => $dish->id, 'quantity' => 1]
        ]);

        // Log in the customer
        $this->actingAs($customer);

        $responseCheckout = $this->post(route('muahang.process'), [
            'cart_items' => $cartItems,
            'cart_phone' => '0912345678',
            'cart_time' => 'now',
            'province' => 'TP. Hồ Chí Minh',
            'district' => 'Tân Phú',
            'ward' => 'Tân Sơn Nhì',
            'cart_address_detail' => '12 Bau Cat',
            'cart_address' => '12 Bau Cat, Tân Sơn Nhì, Tân Phú, TP. Hồ Chí Minh',
            'cart_payment' => 'cod',
            'coupon_code' => 'TESTCOUPON10'
        ]);

        // Assert order was created in DB with correct amounts and coupon_id
        $this->assertDatabaseHas('orders', [
            'user_id' => $customer->id,
            'coupon_id' => $coupon->id,
            'total_amount' => 50000,
            'final_amount' => 45000,
            'payment_method' => 'cash',
        ]);

        // Assert coupon usage limit was decremented
        $this->assertEquals(9, $coupon->fresh()->usage_limit);
    }
}
