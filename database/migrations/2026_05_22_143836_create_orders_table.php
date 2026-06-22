<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->enum('order_type', ['single', 'subscription'])->default('single');
            $table->decimal('total_amount', 12, 2)->default(0.00);
            $table->decimal('final_amount', 12, 2)->default(0.00);
            $table->enum('payment_method', ['cash', 'bank_transfer', 'momo', 'vnpay', 'zalopay'])->default('cash');
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $table->enum('order_status', ['pending', 'confirmed', 'preparing', 'delivering', 'completed', 'cancelled'])->default('pending');
            $table->text('health_notes')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('coupon_id')->references('id')->on('coupons')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
