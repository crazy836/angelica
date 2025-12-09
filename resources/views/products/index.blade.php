@extends('layouts.landing')

@section('content')
<div class="relative min-h-screen bg-black text-white">
    <!-- Products Content -->
    <div class="pb-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">
                    Our Products
                </h1>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto animate-fade-in-up">
                    Discover our latest collection of urban fashion
                </p>
            </div>

            <!-- Search and Filter Section -->
            <div class="mb-8 bg-gray-900 rounded-lg shadow-md p-6">
                <form method="GET" action="{{ route('products.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-300">Search</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                    </div>
                    
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-300">Category</label>
                        <select name="category" id="category" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label for="sort" class="block text-sm font-medium text-gray-300">Sort By</label>
                        <select name="sort" id="sort" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                        </select>
                    </div>
                    
                    <div class="flex items-end">
                        <button type="submit" class="w-full rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Filter
                        </button>
                    </div>
                </form>
                
                <!-- Price Range Filter -->
                <div class="mt-4 pt-4 border-t border-gray-700">
                    <form method="GET" action="{{ route('products.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Preserve existing filters -->
                        @foreach(request()->except('min_price', 'max_price', 'page') as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                        
                        <div>
                            <label for="min_price" class="block text-sm font-medium text-gray-300">Min Price</label>
                            <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" min="0" step="0.01" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                        </div>
                        
                        <div>
                            <label for="max_price" class="block text-sm font-medium text-gray-300">Max Price</label>
                            <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" min="0" step="0.01" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                        </div>
                        
                        <div class="md:col-span-2 flex items-end space-x-2">
                            <button type="submit" class="rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                Apply Price Range
                            </button>
                            
                            @if(request('min_price') || request('max_price'))
                                <a href="{{ route('products.index', array_filter(request()->except('min_price', 'max_price', 'page'))) }}" class="rounded-md border border-gray-600 bg-gray-800 py-2 px-4 text-sm font-medium text-gray-300 shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                    Clear Price Filter
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Active Filters Display -->
            @if((request('search') || request('category') || request('min_price') || request('max_price') || request('sort')) && !request()->has('page'))
                <div class="mb-4 bg-blue-900 rounded-lg p-4">
                    <div class="flex flex-wrap items-center justify-between">
                        <div class="flex flex-wrap gap-2">
                            @if(request('search'))
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-800 text-blue-100">
                                    Search: "{{ request('search') }}"
                                </span>
                            @endif
                            
                            @if(request('category'))
                                @php
                                    $category = $categories->firstWhere('id', request('category'));
                                @endphp
                                @if($category)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-800 text-blue-100">
                                        Category: {{ $category->name }}
                                    </span>
                                @endif
                            @endif
                            
                            @if(request('min_price') || request('max_price'))
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-800 text-blue-100">
                                    Price: 
                                    @if(request('min_price'))
                                        ${{ request('min_price') }}+
                                    @endif
                                    @if(request('max_price'))
                                        @if(request('min_price')) - @endif
                                        ${{ request('max_price') }}
                                    @endif
                                </span>
                            @endif
                            
                            @if(request('sort'))
                                @php
                                    $sortLabels = [
                                        'latest' => 'Latest',
                                        'price_low' => 'Price: Low to High',
                                        'price_high' => 'Price: High to Low',
                                        'name' => 'Name'
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-800 text-blue-100">
                                    Sort: {{ $sortLabels[request('sort')] ?? 'Latest' }}
                                </span>
                            @endif
                        </div>
                        
                        <a href="{{ route('products.index') }}" class="text-sm font-medium text-red-400 hover:text-red-300">
                            Clear All Filters
                        </a>
                    </div>
                </div>
            @endif
            
            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($products as $product)
                    <div class="group relative bg-gray-900 rounded-lg shadow-md overflow-hidden">
                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-800 xl:aspect-w-7 xl:aspect-h-8">
                            @if($product->cover_image)
                                <img src="{{ asset('images/' . $product->cover_image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center group-hover:opacity-75">
                            @else
                                <div class="bg-gray-800 border-2 border-dashed border-gray-700 rounded-xl w-full h-full flex items-center justify-center">
                                    <svg class="h-12 w-12 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-white">
                                <a href="{{ route('products.show', $product) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-400">{{ $product->category->name }}</p>
                            <p class="mt-2 text-lg font-medium text-white">${{ number_format($product->price, 2) }}</p>
                            <div class="mt-4">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="add-to-cart w-full flex items-center justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2" data-product-id="{{ $product->id }}">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <h3 class="text-lg font-medium text-white">No products found</h3>
                        <p class="mt-1 text-sm text-gray-400">Try adjusting your search or filter criteria.</p>
                        <a href="{{ route('products.index') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Clear Filters
                        </a>
                    </div>
                @endforelse
            </div>
            

        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-black py-8 border-t border-gray-800 mt-auto">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-4">OXGN<span class="text-red-600">FASHION</span></h3>
                    <p class="text-gray-400">
                        Urban fashion redefined. Premium quality streetwear for the modern lifestyle.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Shop</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition">New Arrivals</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition">Best Sellers</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition">Sale</a></li>
                        <li><a href="#collections" class="text-gray-400 hover:text-white transition">Collections</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Contact Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Shipping Info</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Returns</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Connect</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.477 2 2 6.477 2 12c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.523-4.477-10-10-10zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm-2-12c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2zm4 8H8v-1c0-1.324 1.945-2 4-2s4 .676 4 2v1z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} OXGN FASHION. All rights reserved.</p>
            </div>
        </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add to cart functionality
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            
            addToCartButtons.forEach(button => {
                        button.addEventListener('click', function(e) {
                            e.preventDefault();
                    
                    const productId = this.getAttribute('data-product-id');
                    
                    // Show loading state
                    const originalHTML = this.innerHTML;
                    this.innerHTML = '<svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
                    this.disabled = true;
                    
                    // Get CSRF token
                        const csrfToken = document.querySelector('meta[name="csrf-token"]');
                        if (!csrfToken) {
                            // Always prevent form submission, even if CSRF token is missing
                            console.error('CSRF token not found');
                            alert('Unable to add product to cart. Please refresh the page and try again.');
                            return;
                        }
                    
                    // Send request to add to cart
                    fetch('/cart/add', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            quantity: 1
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            // Always prevent form submission, even on errors
                            return Promise.reject(new Error('Server responded with status ' + response.status));
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            // Update cart count in header
                            const cartCounts = document.querySelectorAll('.cart-count');
                            cartCounts.forEach(cartCount => {
                                cartCount.textContent = data.cart_count;
                            });
                            
                            // Redirect to cart page after successful addition
                            window.location.href = '/cart';
                        } else {
                            alert('Failed to add product to cart: ' + (data.message || 'Unknown error'));
                        }
                    })
                    .catch(error => {
                        // Always prevent form submission on error
                        console.error('Error:', error);
                        alert('Network error: Unable to connect to the server. Please check your internet connection.');
                    })
                    .finally(() => {
                        // Restore button state
                        this.innerHTML = originalHTML;
                        this.disabled = false;
                    });
                });
            });
        });
    </script>
    
    </footer>
</div>
@endsection
