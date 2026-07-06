<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Insert FOODELICIOUS2026 coupon code
        DB::table('coupons')->updateOrInsert(
            ['coupon_code' => 'FOODELICIOUS2026'],
            [
                'discount_type' => 'percent',
                'discount_value' => 10.00,
                'min_order_value' => 0.00,
                'start_date' => '2026-01-01',
                'end_date' => '2031-12-31',
                'usage_limit' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('coupons')->where('coupon_code', 'FOODELICIOUS2026')->delete();
    }
};
