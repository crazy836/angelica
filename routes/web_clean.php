<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/test', function () {
    return 'Test route is working';
})->name('test');

Route::get('/test-image', function () {
    $imagePath = public_path('images/urban-sneakers.jpg');
    if (file_exists($imagePath)) {
        return response()->file($imagePath);
    } else {
        return 'Image not found at: ' . $imagePath;
    }
})->name('test.image');

Route::get('/test-image-view', function () {
    return view('test-image');
})->name('test.image.view');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/orders', [ProfileController::class, 'orders'])->name('profile.orders');
    Route::get('/profile/orders/{orderId}', [ProfileController::class, 'showOrder'])->name('profile.order.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
});

// Public routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/shop', [ProductController::class, 'index'])->name('shop');

// Debug route for Urban Street Tee
Route::get('/debug-urban-street-tee', function () {
    $product = \App\Models\Product::where('name', 'Urban Street Tee')->first();
    return response()->json([
        'product' => $product,
        'image_exists' => $product && $product->cover_image ? file_exists(public_path('images/' . $product->cover_image)) : false,
        'image_path' => $product && $product->cover_image ? public_path('images/' . $product->cover_image) : null,
    ]);
});

// Debug products view
Route::get('/debug-products', function () {
    $allProducts = \App\Models\Product::with('category')->get();
    
    $result = [];
    foreach ($allProducts as $product) {
        $result[] = [
            'id' => $product->id,
            'name' => $product->name,
            'category' => $product->category->name ?? 'No Category',
            'price' => $product->price,
            'cover_image' => $product->cover_image,
            'image_exists' => $product->cover_image && file_exists(public_path('images/' . $product->cover_image))
        ];
    }
    
    return response()->json($result);
});
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Cart routes
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/', [CartController::class, 'store'])->name('store');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::put('/{id}', [CartController::class, 'update'])->name('update');
    Route::delete('/{id}', [CartController::class, 'destroy'])->name('destroy');
});

// Checkout routes
Route::prefix('checkout')->name('checkout.')->middleware('auth')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('index');
    Route::post('/', [CheckoutController::class, 'store'])->name('store');
});

// Payment routes
Route::prefix('payment')->name('payment.')->middleware('auth')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('index');
    Route::post('/process', [PaymentController::class, 'process'])->name('process');
    Route::get('/success', [PaymentController::class, 'success'])->name('success');
});

require __DIR__.'/auth.php';

Route::get('/test-profile', function () { return view('test-profile-form'); })->name('test.profile.form');