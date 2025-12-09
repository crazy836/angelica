<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            [
                'name' => 'T-Shirts',
                'slug' => 't-shirts',
                'description' => 'Casual and stylish t-shirts for everyday wear',
            ],
            [
                'name' => 'Jackets',
                'slug' => 'jackets',
                'description' => 'Trendy jackets for all seasons',
            ],
            [
                'name' => 'Pants',
                'slug' => 'pants',
                'description' => 'Comfortable and fashionable pants',
            ],
            [
                'name' => 'Shoes',
                'slug' => 'shoes',
                'description' => 'Sneakers and footwear for urban lifestyle',
            ],
        ];
        
        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
