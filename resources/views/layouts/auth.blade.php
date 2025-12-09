<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'OXGN FASHION') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- reCAPTCHA Script -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body class="font-sans text-gray-900 antialiased min-h-screen overflow-hidden">
        <script>
            function togglePasswordVisibility(fieldId) {
                const passwordField = document.getElementById(fieldId);
                const eyeIcon = document.querySelector(`#eye-icon-${fieldId}`);
                const eyeOpen = document.querySelector(`#eye-open-${fieldId}`);
                const eyeOpen2 = document.querySelector(`#eye-open-${fieldId}-2`);
                const eyeClosed = document.querySelector(`#eye-closed-${fieldId}`);
                
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    eyeOpen.classList.add('hidden');
                    eyeOpen2.classList.add('hidden');
                    eyeClosed.classList.remove('hidden');
                } else {
                    passwordField.type = 'password';
                    eyeOpen.classList.remove('hidden');
                    eyeOpen2.classList.remove('hidden');
                    eyeClosed.classList.add('hidden');
                }
            }
        </script>
        
        <!-- Header -->
        <div class="fixed top-0 left-0 right-0 z-50 py-4 bg-black shadow-lg">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-3 items-center w-full">
                    <!-- Logo on the far left -->
                    <div>
                        <a href="{{ route('landing') }}" class="text-2xl font-bold text-white">OXGN<span class="text-red-600">FASHION</span></a>
                    </div>
                    
                    <!-- Centered navigation links -->
                    <div class="flex justify-center">
                        <nav class="flex space-x-6 md:space-x-8">
                            <a href="{{ route('landing') }}" class="text-white hover:text-[#C20404] transition duration-300 font-medium">Home</a>
                            <a href="{{ route('landing') }}#shop" class="text-white hover:text-[#C20404] transition duration-300 font-medium">Shop</a>
                            <a href="{{ route('landing') }}#collections" class="text-white hover:text-[#C20404] transition duration-300 font-medium">Collections</a>
                            <a href="{{ route('landing') }}#about" class="text-white hover:text-[#C20404] transition duration-300 font-medium">About</a>
                            <a href="{{ route('landing') }}#contact" class="text-white hover:text-[#C20404] transition duration-300 font-medium">Contact</a>
                        </nav>
                    </div>
                    
                    <!-- Right section with cart, login/signup -->
                    <div class="flex justify-end items-center space-x-3">
                        <!-- Cart Icon -->
                        <a href="{{ route('cart.index') }}" class="relative text-white hover:text-[#C20404] transition duration-300">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            @php
                                try {
                                    $cartCount = app(App\Services\CartService::class)->getItemCount();
                                } catch (Exception $e) {
                                    $cartCount = 0;
                                }
                            @endphp
                            @if($cartCount > 0)
                                <span class="absolute -top-2 -right-2 bg-[#C20404] text-white text-xs rounded-full h-5 w-5 flex items-center justify-center cart-count">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                        
                        <a href="{{ route('login') }}" class="text-white hover:text-[#C20404] transition duration-300">Login</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-[#C20404] text-white font-bold rounded-full hover:bg-[#8C0000] transition duration-300">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center pt-20 sm:pt-0">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0">
                <div class="bg-gradient-to-r from-black to-red-900 opacity-90 absolute inset-0"></div>
                <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                     alt="Fashion Background" 
                     class="w-full h-full object-cover">
            </div>
            
            <div class="w-full sm:max-w-md px-6 py-4 relative z-10">
                <div class="text-center mb-8">
                    <a href="{{ route('landing') }}" class="text-3xl font-bold text-white">
                        OXGN<span class="text-red-600">FASHION</span>
                    </a>
                    <p class="mt-2 text-gray-300">
                        @if(request()->routeIs('login'))
                            Sign in to your account
                        @else
                            Create a new account
                        @endif
                    </p>
                </div>

                <div class="bg-gray-800 rounded-lg shadow-2xl overflow-hidden">
                    <div class="p-6">
                        @yield('content')
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('landing') }}" class="text-gray-400 hover:text-white transition duration-300">
                        &larr; Back to Home
                    </a>
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
                            <li><a href="#" class="text-gray-400 hover:text-white transition">New Arrivals</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Best Sellers</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Sale</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Collections</a></li>
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
                    <p>&copy; 2023 OXGN FASHION. All rights reserved.</p>
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
                    
                    // Send request to add to cart
                    fetch('/cart/add', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            quantity: 1
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update cart count in header
                            const cartCounts = document.querySelectorAll('.cart-count');
                            cartCounts.forEach(cartCount => {
                                cartCount.textContent = data.cart_count;
                            });
                            
                            // Show success message
                            alert('Product added to cart successfully!');
                        } else {
                            alert('Failed to add product to cart: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while adding the product to cart.');
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
    </body>
</html>
