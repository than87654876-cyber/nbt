<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\DailySchedule;
use App\Models\Dish;
use App\Models\Order;
use App\Models\ServicePackage;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FullSystemWorkflowTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test client registration, login, checkout, and staff/admin operations.
     */
    public function test_complete_customer_to_staff_workflow(): void
    {
        // 1. Setup initial DB seeds manually or programmatically
        $category = Category::create([
            'category_name' => 'Mon Chinh',
            'description' => 'Cac mon chinh an kem com',
            'icon' => 'dish.png',
            'status' => true,
        ]);

        $dish1 = Dish::create([
            'category_id' => $category->id,
            'dish_name' => 'Com ga hai nam',
            'price' => 50000,
            'is_available' => true,
            'description' => 'Com ga ngon dam da',
            'image_url' => 'comga.jpg',
        ]);

        $dish2 = Dish::create([
            'category_id' => $category->id,
            'dish_name' => 'Com tam suon bi cha',
            'price' => 45000,
            'is_available' => true,
            'description' => 'Com tam dac san',
            'image_url' => 'comtam.jpg',
        ]);

        $package = ServicePackage::create([
            'package_name' => 'Monthly Flex',
            'price' => 179.99,
            'days' => 30,
            'description' => 'Monthly subscription flex menu',
            'status' => true,
        ]);

        // 2. Test Customer registration
        $registrationData = [
            'fullname' => 'Nguyen Van A',
            'email' => 'customer_a@example.com',
            'phone' => '0987654321',
            'address' => '123 Ly Thuong Kiet, Q10, HCMC',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'terms' => 'on',
        ];

        $response = $this->post(route('trangchu/dangky.post'), $registrationData);
        $response->assertRedirect(route('trangchu/dangnhap'));

        $this->assertDatabaseHas('users', [
            'email' => 'customer_a@example.com',
            'phone' => '0987654321',
            'role' => 'customer',
        ]);

        $user = User::where('email', 'customer_a@example.com')->first();
        $this->assertStringContainsString('123 Ly Thuong Kiet', $user->notes);

        // 3. Test Customer login
        $loginData = [
            'phone' => '0987654321',
            'password' => 'password123',
        ];

        $response = $this->post(route('trangchu/dangnhap.post'), $loginData);
        $response->assertRedirect(route('trangchu_dangnhap'));
        $this->assertAuthenticatedAs($user);

        // 4. Test Cart Checkout
        // Simulating the localStorage format submitted as a JSON string
        $cartItems = json_encode([
            ['id' => $dish1->id, 'quantity' => 2],
            ['id' => $dish2->id, 'quantity' => 1],
        ]);

        $checkoutData = [
            'cart_phone' => '0987654321',
            'cart_address' => '123 Ly Thuong Kiet, HCMC',
            'cart_time' => '12:00',
            'cart_payment' => 'cod', // cash
            'cart_items' => $cartItems,
        ];

        $response = $this->actingAs($user)->post(route('muahang.process'), $checkoutData);
        $response->assertRedirect(route('giohang'));

        // Total price is: (50000 * 2) + 45000 = 145000
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'order_type' => 'single',
            'total_amount' => 145000,
            'payment_method' => 'cash',
            'order_status' => 'pending',
        ]);

        $order = Order::where('user_id', $user->id)->first();
        $this->assertDatabaseHas('order_items', [
            'order_id' => $order->id,
            'dish_id' => $dish1->id,
            'quantity' => 2,
            'price' => 50000,
        ]);
        $this->assertDatabaseHas('order_items', [
            'order_id' => $order->id,
            'dish_id' => $dish2->id,
            'quantity' => 1,
            'price' => 45000,
        ]);

        // 5. Test Staff access and order status transition
        $staff = User::factory()->create([
            'fullname' => 'Staff Member',
            'email' => 'staff_member@example.com',
            'role' => 'staff',
            'status' => true,
        ]);

        // Staff/Admin updates order status from pending to preparing/delivering/completed
        $response = $this->actingAs($staff)->post(route('donhang_chinhsua.post', $order->id), [
            'order_status' => 'delivering',
            'payment_status' => 'pending',
        ]);
        $response->assertRedirect();
        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'order_status' => 'delivering',
        ]);

        // Staff/Admin marks as completed
        $response = $this->actingAs($staff)->post(route('donhang_chinhsua.post', $order->id), [
            'order_status' => 'completed',
            'payment_status' => 'paid',
        ]);
        $response->assertRedirect();
        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'order_status' => 'completed',
            'payment_status' => 'paid',
        ]);

        // 6. Test Subscription and Daily schedule flow
        // Let's create a subscription order manually for testing
        $subOrder = Order::create([
            'user_id' => $user->id,
            'order_type' => 'subscription',
            'total_amount' => 179.99,
            'final_amount' => 179.99,
            'payment_method' => 'bank_transfer',
            'payment_status' => 'paid',
            'order_status' => 'confirmed',
            'health_notes' => 'Subscription order notes',
        ]);

        $subscription = Subscription::create([
            'order_id' => $subOrder->id,
            'user_id' => $user->id,
            'package_id' => $package->id,
            'start_date' => '2026-06-01',
            'end_date' => '2026-06-30',
            'remaining_days' => 10,
            'status' => 'active',
        ]);

        $schedule = DailySchedule::create([
            'subscription_id' => $subscription->id,
            'delivery_date' => '2026-06-15',
            'dish_id' => $dish1->id,
            'delivery_status' => 'pending',
            'is_locked' => false,
        ]);

        // Staff/Admin triggers daily delivery order creation
        $response = $this->actingAs($staff)->post(route('goidangky_tao_don', $subscription->id));
        $response->assertRedirect();

        $this->assertDatabaseHas('daily_schedules', [
            'id' => $schedule->id,
            'delivery_status' => 'delivered',
            'is_locked' => true,
        ]);

        $this->assertDatabaseHas('subscriptions', [
            'id' => $subscription->id,
            'remaining_days' => 9,
            'status' => 'active',
        ]);

        // 7. Test Front-end Package Purchase (buyPackage route)
        // Ensure seeded package exists for mapping 'family'
        $familyPackage = ServicePackage::create([
            'package_name' => 'Gói Gia Đình Hàng Ngày',
            'price' => 1500000.00,
            'duration_days' => 30,
            'status' => true,
            'description' => 'Gia dinh test',
        ]);

        $purchaseData = [
            'package_type' => 'family',
            'package_duration' => 30,
            'start_date' => date('Y-m-d', strtotime('+1 day')),
            'delivery_slot' => 'noon',
            'sub_phone' => '0987654321',
            'sub_email' => 'customer_a@example.com',
            'sub_address' => '123 Ly Thuong Kiet, HCMC',
            'sub_payment_method' => 'bank_transfer',
        ];

        $response = $this->actingAs($user)->post(route('goidichvu.buy'), $purchaseData);
        $response->assertRedirect(route('goidichvu'));

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'order_type' => 'subscription',
            'total_amount' => 1500000.00,
            'payment_method' => 'bank_transfer',
        ]);

        $newSub = Subscription::where('user_id', $user->id)
            ->where('package_id', $familyPackage->id)
            ->first();

        $this->assertNotNull($newSub);
        $this->assertEquals(30, $newSub->remaining_days);
        $this->assertEquals(30, $newSub->dailySchedules()->count());
    }
}
