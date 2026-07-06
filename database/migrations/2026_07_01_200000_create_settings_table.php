<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // Seed default website configuration values
        DB::table('settings')->insert([
            [
                'key' => 'logo_url',
                'value' => '/logo.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'banner_title',
                'value' => 'Bạn đã sẵn sàng để tận hưởng những bữa sáng ngon lành',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'banner_subtitle',
                'value' => 'Đồng hành cùng bạn trên hành trình khám phá những ẩm thực',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'banner_image',
                'value' => '/client/assets/img/hero-img.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'contact_phone',
                'value' => '+1 5589 55488 55',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'contact_email',
                'value' => 'contact@example.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'contact_address',
                'value' => 'A108 Adam Street, New York, NY 535022',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'map_embed_url',
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1415053648486!2d106.6917926!3d10.8004543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528c2576b92dd%3A0x6e9ca9bc8926958b!2zMTIzIEzDqiBI4buTbmcgUGjDuW5nLCBRdeG6rW4gMywgVFAuSENN!5e0!3m2!1svi!2s!4v1539943755621',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'store_latitude',
                'value' => '10.8230',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'store_longitude',
                'value' => '106.6296',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
