<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');
        
        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }
        
        // Category filter
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category_id', $request->category);
        }
        
        // Price range filter
        if ($request->has('min_price') && !empty($request->min_price)) {
            $query->where('price', '>=', $request->min_price);
        }
        
        if ($request->has('max_price') && !empty($request->max_price)) {
            $query->where('price', '<=', $request->max_price);
        }
        
        // Sorting
        $sortBy = $request->get('sort', 'latest');
        switch ($sortBy) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'latest':
            default:
                $query->latest();
                break;
        }
        
        // For the shop page, we need to show exactly 8 products
        if (request()->route()->getName() === 'shop') {
            // Apply search and filter parameters
            $searchTerm = $request->get('search');
            $categoryId = $request->get('category');
            
            if ($searchTerm) {
                $query->where(function($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('description', 'LIKE', "%{$searchTerm}%");
                });
            }
            
            if ($categoryId) {
                $query->where('category_id', $categoryId);
            }
            
            // Get all products and manually order them
            $allProducts = $query->get();
            
            // Define the specific order for the requested products
            $productNamesInOrder = [
                'Urban Street Tee',
                'Designer Jacket',
                'Street Denim',
                'Urban Sneakers',
                'Casual Hoodie',
                'Summer Shorts',
                'Winter Beanie',
                'Sporty Tank Top'
            ];
            
            // First get the specific products in the required order
            $orderedProducts = collect();
            foreach ($productNamesInOrder as $productName) {
                $product = $allProducts->firstWhere('name', $productName);
                if ($product) {
                    $orderedProducts->push($product);
                }
            }
            
            // If we don't have 8 products yet, fill with other products
            if ($orderedProducts->count() < 8) {
                $existingIds = $orderedProducts->pluck('id')->toArray();
                $additionalProducts = $allProducts->filter(function ($product) use ($existingIds) {
                    return !in_array($product->id, $existingIds);
                })->take(8 - $orderedProducts->count());
                
                $orderedProducts = $orderedProducts->merge($additionalProducts);
            }
            
            // Limit to exactly 8 products
            $products = $orderedProducts->take(8);
        } else {
            // For products.index, use the standard pagination
            $products = $query->paginate(12)->appends($request->except('page'));
        }
        $categories = Category::all();
        
        // Check if this is the shop route
                if (request()->route()->getName() === 'shop') {
                    return view('shop', compact('products', 'categories'));
                } else {
                    return view('products.index', compact('products', 'categories'));
                }
    }
    
    public function show(Product $product)
    {
        $product->load('category');
        return view('products.show', compact('product'));
    }
}