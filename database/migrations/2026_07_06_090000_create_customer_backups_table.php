<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer_backups', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('storage_path');
            $table->unsignedBigInteger('size')->default(0);
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('restored_by')->nullable();
            $table->timestamp('restored_at')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('restored_by')->references('id')->on('users')->nullOnDelete();
        });

        Schema::create('customer_backup_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('backup_id');
            $table->string('action');
            $table->text('message')->nullable();
            $table->unsignedBigInteger('performed_by')->nullable();
            $table->timestamps();

            $table->foreign('backup_id')->references('id')->on('customer_backups')->cascadeOnDelete();
            $table->foreign('performed_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_backup_logs');
        Schema::dropIfExists('customer_backups');
    }
};
