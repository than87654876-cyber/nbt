<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServicePackage;

class ServicePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'package_name' => 'Starter Plan',
                'description' => '5 meals per week for 4 weeks',
                'price' => 99.99,
                'duration_days' => 28,
                'status' => true,
            ],
            [
                'package_name' => 'Professional Plan',
                'description' => '7 meals per week for 4 weeks',
                'price' => 149.99,
                'duration_days' => 28,
                'status' => true,
            ],
            [
                'package_name' => 'Elite Plan',
                'description' => '7 meals per week plus snacks for 4 weeks',
                'price' => 199.99,
                'duration_days' => 28,
                'status' => true,
            ],
            [
                'package_name' => 'Monthly Flex',
                'description' => 'Custom meals, cancel anytime',
                'price' => 179.99,
                'duration_days' => 30,
                'status' => true,
            ],
        ];

        foreach ($packages as $package) {
            ServicePackage::create($package);
        }
    }
}
