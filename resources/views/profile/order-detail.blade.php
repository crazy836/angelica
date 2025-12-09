@extends('layouts.landing')

@section('content')
<div class="relative min-h-screen bg-black text-white pt-20">
    <div class="pb-12">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between mb-8">
                <a href="{{ route('profile.orders') }}" class="flex items-center text-red-500 hover:text-red-400 transition duration-300 no-print">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Orders
                </a>
                <button onclick="window.print()" class="flex items-center bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-300 no-print">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    Print Order
                </button>
            </div>

            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fade-in-down">
                    Order Details
                </h1>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto animate-fade-in-up">
                    Order #{{ $order->id }} - Placed on {{ $order->created_at->format('M d, Y') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Order Items -->
                <div class="lg:col-span-2">
                    <div class="bg-gray-900 rounded-lg shadow-md overflow-hidden">
                        <div class="px-6 py-8">
                            <h2 class="text-2xl font-bold text-white mb-6">Order Items</h2>

                            <div class="space-y-6">
                                @foreach($order->items as $item)
                                    <div class="flex items-center py-4 border-b border-gray-800">
                                        <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-md bg-gray-800">
                                            @if($item->product->cover_image)
                                                <img src="{{ asset('images/' . $item->product->cover_image) }}" alt="{{ $item->product->name }}" class="h-full w-full object-cover">
                                            @else
                                                <div class="bg-gray-800 border-2 border-dashed border-gray-700 rounded-xl w-full h-full flex items-center justify-center">
                                                    <svg class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-4 flex flex-1 flex-col">
                                            <div>
                                                <div class="flex justify-between text-base font-medium text-white">
                                                    <h3>Product #{{ $item->product_id }}</h3>
                                                    <p class="ml-4">${{ number_format($item->product->price * $item->quantity, 2) }}</p>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-400">{{ $item->product->category->name }}</p>
                                            </div>
                                            <div class="flex flex-1 items-end justify-between text-sm mt-2">
                                                <p class="text-gray-400">Qty {{ $item->quantity }}</p>
                                                <p class="text-gray-400">${{ number_format($item->product->price, 2) }} each</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <!-- Product Names and Descriptions -->
                            <div class="mt-8 pt-6 border-t border-gray-800">
                                <h3 class="text-xl font-bold text-white mb-4">Product Details</h3>
                                <div class="space-y-4">
                                    @foreach($order->items as $item)
                                        <div class="bg-gray-800 rounded-lg p-4">
                                            <h4 class="text-lg font-semibold text-white">{{ $item->product->name }}</h4>
                                            @if($item->product->description)
                                                <p class="mt-2 text-gray-300">{{ $item->product->description }}</p>
                                            @endif
                                            <div class="mt-2 text-sm text-gray-400">
                                                <span>Category: {{ $item->product->category->name }}</span>
                                                <span class="mx-2">•</span>
                                                <span>Price: ${{ number_format($item->product->price, 2) }}</span>
                                                <span class="mx-2">•</span>
                                                <span>Quantity: {{ $item->quantity }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div>
                    <div class="bg-gray-900 rounded-lg shadow-md overflow-hidden sticky top-24">
                        <div class="px-6 py-8">
                            <h2 class="text-2xl font-bold text-white mb-6">Order Summary</h2>

                            <div class="space-y-4">
                                <div class="flex justify-between text-gray-400">
                                    <p>Subtotal</p>
                                    <p>${{ number_format($order->total_amount, 2) }}</p>
                                </div>
                                <div class="flex justify-between text-gray-400">
                                    <p>Shipping</p>
                                    <p>Free</p>
                                </div>
                                <div class="flex justify-between text-gray-400">
                                    <p>Tax</p>
                                    <p>$0.00</p>
                                </div>
                                <div class="border-t border-gray-800 pt-4">
                                    <div class="flex justify-between text-xl font-bold text-white">
                                        <p>Total</p>
                                        <p>${{ number_format($order->total_amount, 2) }}</p>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <h3 class="text-lg font-bold text-white mb-4">Order Status</h3>
                                    <div class="flex items-center">
                                        <span class="inline-flex rounded-full bg-{{ $order->status === 'completed' ? 'green' : ($order->status === 'cancelled' ? 'red' : 'yellow') }}-900 px-3 py-1 text-sm font-semibold leading-5 text-{{ $order->status === 'completed' ? 'green' : ($order->status === 'cancelled' ? 'red' : 'yellow') }}-300">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <h3 class="text-lg font-bold text-white mb-4">Shipping Address</h3>
                                    <div class="text-gray-400 text-sm">
                                        <p>{{ $order->shipping_address }}</p>
                                        <p>{{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_zip }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <li><a href="{{ route('shop') }}" class="text-gray-400 hover:text-white transition">New Arrivals</a></li>
                        <li><a href="{{ route('shop') }}" class="text-gray-400 hover:text-white transition">Best Sellers</a></li>
                        <li><a href="{{ route('shop') }}" class="text-gray-400 hover:text-white transition">Sale</a></li>
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
    </footer>
</div>
    <style>
        @media print {
            /* Hide elements that shouldn't appear in print */
            .no-print, nav, footer, button, .back-to-orders, .print-button {
                display: none !important;
            }
            
            /* Adjust layout for print */
            body {
                background-color: white !important;
                color: black !important;
            }
            
            .bg-black, .bg-gray-900, .bg-gray-800 {
                background-color: white !important;
                color: black !important;
                border: 1px solid #ddd;
            }
            
            /* Ensure good contrast for text */
            .text-white, .text-gray-300, .text-gray-400 {
                color: black !important;
            }
            
            /* Remove shadows and animations */
            * {
                box-shadow: none !important;
                animation: none !important;
                transition: none !important;
            }
            
            /* Make sure images are visible */
            img {
                filter: none !important;
                opacity: 1 !important;
            }
            
            /* Add some padding for better print layout */
            .container {
                max-width: 100% !important;
                padding: 20px !important;
            }
            
            /* Force page breaks for better organization */
            .page-break {
                page-break-before: always;
            }
        }
    </style>
@endsection