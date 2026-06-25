<?php

namespace Database\Seeders;

use App\Models\ServicePackage;
use Illuminate\Database\Seeder;

class ServicePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'package_name' => 'Gói Gia Đình Hàng Ngày',
                'description' => 'Thực đơn xoay vòng phong phú hàng ngày gồm Phở Bò, Bánh Mì, Cơm Tấm chuẩn vị.',
                'price' => 1500000.00,
                'duration_days' => 30,
                'status' => true,
            ],
            [
                'package_name' => 'Gói Văn Phòng / Công Ty',
                'description' => 'Giải pháp ăn trưa công sở tiện lợi, giao tận nơi đúng giờ với các món ăn dinh dưỡng.',
                'price' => 420000.00,
                'duration_days' => 7,
                'status' => true,
            ],
            [
                'package_name' => 'Gói Ăn Chiều Tối Dinh Dưỡng',
                'description' => 'Thực đơn nhẹ nhàng, dễ tiêu hóa cho buổi tối ấm cúng sau giờ làm việc căng thẳng.',
                'price' => 600000.00,
                'duration_days' => 10,
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
