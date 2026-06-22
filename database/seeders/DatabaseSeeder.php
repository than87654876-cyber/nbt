<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed basic data
        $this->call([
            CategorySeeder::class,
            DishSeeder::class,
            ServicePackageSeeder::class,
            CouponSeeder::class,
        ]);

        // Create test users
        User::factory(5)->create();
        
        // Create admin user
        User::factory()->create([
            'fullname' => 'Admin User',
            'email' => 'admin@example.com',
            'phone' => '+1234567890',
            'status' => true,
        ]);

        // Create customer user
        User::factory()->create([
            'fullname' => 'Customer Test',
            'email' => 'customer@example.com',
            'phone' => '+0987654321',
            'status' => true,
        ]);
    }
}
