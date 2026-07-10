<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'category_name' => 'Ăn sáng', 'description' => 'Món ăn sáng bổ dưỡng'],
            ['id' => 2, 'category_name' => 'Tráng miệng', 'description' => 'Món tráng miệng thanh mát'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
