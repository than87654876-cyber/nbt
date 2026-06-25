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
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('fullname');

            $table->string('email')->unique();

            $table->string('phone')->nullable();

            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');

            $table->rememberToken();

            $table->tinyInteger('status')->default(1);
            $table->string('role')->default('customer'); // customer, staff, admin
            $table->integer('points')->default(0);
            $table->string('membership')->default('bronze'); // bronze, silver, gold, diamond
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
