<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coupons = [
            [
                'coupon_code' => 'WELCOME10',
                'discount_type' => 'percent',
                'discount_value' => 10.00,
                'min_order_value' => 50.00,
                'start_date' => now()->format('Y-m-d'),
                'end_date' => now()->addMonths(3)->format('Y-m-d'),
                'usage_limit' => null,
            ],
            [
                'coupon_code' => 'SAVE15',
                'discount_type' => 'percent',
                'discount_value' => 15.00,
                'min_order_value' => 100.00,
                'start_date' => now()->format('Y-m-d'),
                'end_date' => now()->addMonths(2)->format('Y-m-d'),
                'usage_limit' => 100,
            ],
            [
                'coupon_code' => 'FLAT20',
                'discount_type' => 'fixed',
                'discount_value' => 20.00,
                'min_order_value' => 150.00,
                'start_date' => now()->format('Y-m-d'),
                'end_date' => now()->addMonths(1)->format('Y-m-d'),
                'usage_limit' => 50,
            ],
        ];

        foreach ($coupons as $coupon) {
            Coupon::create($coupon);
        }
    }
}
