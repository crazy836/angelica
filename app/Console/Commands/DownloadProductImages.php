<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class DownloadProductImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-product-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download sample images for products';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Downloading sample images for products...');
        
        // Sample image URLs for different product categories
        $imageUrls = [
            // T-Shirts
            'urban-street-tee' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'graphic-print-tshirt' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'oversized-fit-tee' => 'https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'vintage-logo-shirt' => 'https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            
            // Jackets
            'designer-jacket' => 'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'denim-trucker-jacket' => 'https://images.unsplash.com/photo-1544441892-7f7894898639?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'bomber-jacket' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'leather-moto-jacket' => 'https://images.unsplash.com/photo-1551537482-f2075a1d41f2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            
            // Pants
            'street-denim' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'cargo-pants' => 'https://images.unsplash.com/photo-1504593811423-6dd665756598?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'jogger-pants' => 'https://images.unsplash.com/photo-1545150593-7f7894898639?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'chino-pants' => 'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            
            // Shoes
            'urban-sneakers' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'running-shoes' => 'https://images.unsplash.com/photo-1543508282-6319a3e2621f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'canvas-slip-ons' => 'https://images.unsplash.com/photo-1560343090-f0409e92791a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'high-top-sneakers' => 'https://images.unsplash.com/photo-1600185365926-3a2ce3cdb9eb?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        ];
        
        $products = Product::all();
        
        $downloadCount = 0;
        $errorCount = 0;
        
        foreach ($products as $product) {
            if (isset($imageUrls[$product->slug])) {
                $imageUrl = $imageUrls[$product->slug];
                $imageName = $product->slug . '.jpg';
                $imagePath = 'images/' . $imageName;
                
                // Download image
                $imageData = @file_get_contents($imageUrl);
                
                if ($imageData !== false) {
                    // Save image to public/images directory
                    file_put_contents(public_path($imagePath), $imageData);
                    
                    // Update product with image name
                    $product->cover_image = $imageName;
                    $product->save();
                    
                    $this->info("Downloaded image for {$product->name}");
                    $downloadCount++;
                } else {
                    $this->warn("Failed to download image for {$product->name}");
                    $errorCount++;
                }
            } else {
                $this->warn("No image URL found for {$product->name}");
                $errorCount++;
            }
        }
        
        $this->info("Finished downloading product images! Successfully downloaded: {$downloadCount}, Errors: {$errorCount}");
    }
}