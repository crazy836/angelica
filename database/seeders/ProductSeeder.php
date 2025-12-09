<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        
        if ($categories->isEmpty()) {
            $this->call(CategorySeeder::class);
            $categories = Category::all();
        }
        
        // Get category IDs
        $tshirtsCategoryId = $categories->firstWhere('slug', 't-shirts')->id;
        $jacketsCategoryId = $categories->firstWhere('slug', 'jackets')->id;
        $pantsCategoryId = $categories->firstWhere('slug', 'pants')->id;
        $shoesCategoryId = $categories->firstWhere('slug', 'shoes')->id;
        
        $products = [
            // T-Shirts
            [
                'name' => 'Urban Street Tee',
                'slug' => 'urban-street-tee',
                'description' => 'Premium cotton t-shirt with urban design',
                'category_id' => $tshirtsCategoryId,
                'price' => 39.99,
                'stock' => 50,
                'cover_image' => 'Urban Street Tee.jpg',
            ],
            [
                'name' => 'Casual Hoodie',
                'slug' => 'casual-hoodie',
                'description' => 'Comfortable hoodie for casual wear',
                'category_id' => $tshirtsCategoryId,
                'price' => 79.99,
                'stock' => 40,
                'cover_image' => 'Casual Hoodie.jpg',
            ],
            [
                'name' => 'Sporty Tank Top',
                'slug' => 'sporty-tank-top',
                'description' => 'Moisture wicking tank top for workouts',
                'category_id' => $tshirtsCategoryId,
                'price' => 34.99,
                'stock' => 35,
                'cover_image' => 'Sporty Tank Top.jpg',
            ],
            [
                'name' => 'Oversized Fit Tee',
                'slug' => 'oversized-fit-tee',
                'description' => 'Comfortable oversized fit for casual wear',
                'category_id' => $tshirtsCategoryId,
                'price' => 44.99,
                'stock' => 40,
                'cover_image' => 'oversized-fit-tee.jpg',
            ],
            [
                'name' => 'Vintage Logo Shirt',
                'slug' => 'vintage-logo-shirt',
                'description' => 'Retro-inspired design with soft fabric',
                'category_id' => $tshirtsCategoryId,
                'price' => 54.99,
                'stock' => 35,
                'cover_image' => 'vintage-logo-shirt.jpg',
            ],

            // Jackets
            [
                'name' => 'Designer Jacket',
                'slug' => 'designer-jacket',
                'description' => 'Limited edition designer jacket',
                'category_id' => $jacketsCategoryId,
                'price' => 129.99,
                'stock' => 25,
                'cover_image' => 'Designer Jacket.jpg',
            ],
            [
                'name' => 'Leather Moto Jacket',
                'slug' => 'leather-moto-jacket',
                'description' => 'Genuine leather motorcycle jacket',
                'category_id' => $jacketsCategoryId,
                'price' => 199.99,
                'stock' => 15,
                'cover_image' => 'leather-moto-jacket.jpg',
            ],

            // Pants
            [
                'name' => 'Street Denim',
                'slug' => 'street-denim',
                'description' => 'Slim fit denim for street style',
                'category_id' => $pantsCategoryId,
                'price' => 89.99,
                'stock' => 30,
                'cover_image' => 'Street Denim.jpg',
            ],
            [
                'name' => 'Summer Shorts',
                'slug' => 'summer-shorts',
                'description' => 'Lightweight shorts for summer days',
                'category_id' => $pantsCategoryId,
                'price' => 39.99,
                'stock' => 50,
                'cover_image' => 'Summer Shorts.jpg',
            ],

            // Shoes
            [
                'name' => 'Urban Sneakers',
                'slug' => 'urban-sneakers',
                'description' => 'High top sneakers for urban lifestyle',
                'category_id' => $shoesCategoryId,
                'price' => 119.99,
                'stock' => 20,
                'cover_image' => 'urban-sneakers.jpg',
            ],
            [
                'name' => 'Winter Beanie',
                'slug' => 'winter-beanie',
                'description' => 'Warm knit beanie for winter',
                'category_id' => $tshirtsCategoryId, // Using t-shirts category as accessory
                'price' => 29.99,
                'stock' => 100,
                'cover_image' => 'Winter Beanie.webp',
            ],
        ];
        
        foreach ($products as $productData) {
            // Update existing products or create new ones
            Product::updateOrCreate(
                ['slug' => $productData['slug']],
                $productData
            );
        }
    }
}