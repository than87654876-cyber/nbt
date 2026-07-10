<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes = [
            // Ăn sáng (category_id = 1)
            [
                'category_id' => 1,
                'dish_name' => 'Quinoa Buddha Bowl',
                'image_url' => 'https://via.placeholder.com/300?text=Quinoa+Buddha+Bowl',
                'price' => 8.99,
                'description' => 'Quinoa, roasted vegetables, chickpeas, and tahini dressing',
                'is_available' => true,
            ],
            [
                'category_id' => 1,
                'dish_name' => 'Grilled Chicken Bowl',
                'image_url' => 'https://via.placeholder.com/300?text=Chicken+Bowl',
                'price' => 9.99,
                'description' => 'Lean grilled chicken with brown rice and steamed vegetables',
                'is_available' => true,
            ],
            [
                'category_id' => 1,
                'dish_name' => 'Tofu Power Bowl',
                'image_url' => 'https://via.placeholder.com/300?text=Tofu+Bowl',
                'price' => 8.49,
                'description' => 'Crispy tofu, edamame, and nutritious grain mix',
                'is_available' => true,
            ],
            [
                'category_id' => 1,
                'dish_name' => 'Garden Fresh Salad',
                'image_url' => 'https://via.placeholder.com/300?text=Garden+Salad',
                'price' => 7.99,
                'description' => 'Mixed greens with seasonal vegetables and vinaigrette',
                'is_available' => true,
            ],
            [
                'category_id' => 1,
                'dish_name' => 'Kale Caesar Salad',
                'image_url' => 'https://via.placeholder.com/300?text=Kale+Caesar',
                'price' => 8.99,
                'description' => 'Crispy kale with light Caesar dressing and croutons',
                'is_available' => true,
            ],
            [
                'category_id' => 1,
                'dish_name' => 'Vegetable Soup',
                'image_url' => 'https://via.placeholder.com/300?text=Veg+Soup',
                'price' => 6.99,
                'description' => 'Hearty vegetable soup with herbs',
                'is_available' => true,
            ],
            [
                'category_id' => 1,
                'dish_name' => 'Chicken Broth',
                'image_url' => 'https://via.placeholder.com/300?text=Chicken+Broth',
                'price' => 7.49,
                'description' => 'Warm and nourishing chicken broth',
                'is_available' => true,
            ],
            [
                'category_id' => 1,
                'dish_name' => 'Green Juice',
                'image_url' => 'https://via.placeholder.com/300?text=Green+Juice',
                'price' => 5.99,
                'description' => 'Fresh pressed green juice with apple and ginger',
                'is_available' => true,
            ],
            [
                'category_id' => 1,
                'dish_name' => 'Protein Smoothie',
                'image_url' => 'https://via.placeholder.com/300?text=Smoothie',
                'price' => 6.49,
                'description' => 'Protein smoothie with fruits and nut butter',
                'is_available' => true,
            ],
            // Tráng miệng (category_id = 2)
            [
                'category_id' => 2,
                'dish_name' => 'Chia Pudding',
                'image_url' => 'https://via.placeholder.com/300?text=Chia+Pudding',
                'price' => 5.49,
                'description' => 'Creamy chia pudding with fresh berries',
                'is_available' => true,
            ],
        ];

        foreach ($dishes as $dish) {
            Dish::create($dish);
        }
    }
}
