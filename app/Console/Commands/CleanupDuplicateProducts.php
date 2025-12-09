<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanupDuplicateProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cleanup-duplicate-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleanup duplicate products';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all products grouped by name
        $products = \App\Models\Product::all();
        
        $grouped = $products->groupBy('name');
        
        foreach ($grouped as $name => $productGroup) {
            if ($productGroup->count() > 1) {
                $this->info("Found {$productGroup->count()} duplicates for: {$name}");
                
                // Keep the first one and delete the rest
                $firstProduct = $productGroup->first();
                
                // Check which one has the correct image
                $correctProduct = null;
                foreach ($productGroup as $product) {
                    if ($product->cover_image && file_exists(public_path('images/' . $product->cover_image))) {
                        $correctProduct = $product;
                        break;
                    }
                }
                
                // If we found a product with correct image, keep that one
                if ($correctProduct && $correctProduct->id != $firstProduct->id) {
                    // Delete the first product
                    $firstProduct->delete();
                    $this->info("Deleted product ID {$firstProduct->id}");
                }
                
                // Delete all except the correct one
                foreach ($productGroup as $product) {
                    if ($correctProduct) {
                        if ($product->id != $correctProduct->id) {
                            $product->delete();
                            $this->info("Deleted product ID {$product->id}");
                        }
                    } else {
                        // If no product has correct image, keep the first one
                        if ($product->id != $firstProduct->id) {
                            $product->delete();
                            $this->info("Deleted product ID {$product->id}");
                        }
                    }
                }
            }
        }
        
        $this->info('Duplicate cleanup completed!');
    }
}
