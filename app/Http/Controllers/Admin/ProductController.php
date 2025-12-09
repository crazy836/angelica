<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Generate slug from name
        $slug = Str::slug($request->name);
        
        // Ensure slug is unique
        $originalSlug = $slug;
        $counter = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Create product with all data except cover_image
        $productData = $request->except('cover_image');
        $productData['slug'] = $slug;
        
        $product = new Product($productData);
        
        if ($request->hasFile('cover_image')) {
            $imageName = time().'.'.$request->cover_image->extension();
            $request->cover_image->move(public_path('images'), $imageName);
            $product->cover_image = $imageName;
        }
        
        $product->save();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Generate slug from name if name changed
        $slug = $product->name !== $request->name ? Str::slug($request->name) : $product->slug;
        
        // If name changed, ensure slug is unique (excluding current product)
        if ($product->name !== $request->name) {
            $originalSlug = $slug;
            $counter = 1;
            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
        }

        // Update product with all data except cover_image
        $productData = $request->except('cover_image');
        $productData['slug'] = $slug;
        
        $product->fill($productData);
        
        if ($request->hasFile('cover_image')) {
            // Delete old image if exists
            if ($product->cover_image && file_exists(public_path('images/'.$product->cover_image))) {
                unlink(public_path('images/'.$product->cover_image));
            }
            
            $imageName = time().'.'.$request->cover_image->extension();
            $request->cover_image->move(public_path('images'), $imageName);
            $product->cover_image = $imageName;
        }
        
        $product->save();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        
        // Delete image if exists
        if ($product->cover_image && file_exists(public_path('images/'.$product->cover_image))) {
            unlink(public_path('images/'.$product->cover_image));
        }
        
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}