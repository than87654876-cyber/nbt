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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_transaction_id')->nullable()->after('payment_status');
            $table->string('payment_bank_reference')->nullable()->after('payment_transaction_id');
            $table->string('payment_bank')->nullable()->after('payment_bank_reference');
            $table->decimal('payment_amount', 12, 2)->nullable()->after('payment_bank');
            $table->string('payment_content')->nullable()->after('payment_amount');
            $table->timestamp('payment_paid_at')->nullable()->after('payment_content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'payment_transaction_id',
                'payment_bank_reference',
                'payment_bank',
                'payment_amount',
                'payment_content',
                'payment_paid_at',
            ]);
        });
    }
};
