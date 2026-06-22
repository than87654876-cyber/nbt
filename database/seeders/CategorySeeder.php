<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Healthy Bowls', 'description' => 'Nutritious and balanced meal bowls'],
            ['category_name' => 'Salads', 'description' => 'Fresh and delicious salads'],
            ['category_name' => 'Soups', 'description' => 'Warm and comforting soups'],
            ['category_name' => 'Beverages', 'description' => 'Healthy drinks and juices'],
            ['category_name' => 'Desserts', 'description' => 'Light and healthy desserts'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
