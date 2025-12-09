@extends('layouts.landing')

@section('content')
<div class="relative min-h-screen bg-black text-white">
    <!-- Cart Content -->
    <div class="pb-12">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl md:text-3xl font-bold text-white mb-6 md:mb-8">Shopping Cart</h1>
            
            @if($items->count() > 0)
                <div class="bg-gray-900 shadow overflow-hidden sm:rounded-lg">
                    <ul class="divide-y divide-gray-800">
                        @foreach($items as $item)
                            <li>
                                <div class="px-4 py-6 sm:px-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-20 h-20 md:w-24 md:h-24 bg-gray-800 rounded-md overflow-hidden">
                                            @if($item->product->cover_image)
                                                <img src="{{ asset('images/' . $item->product->cover_image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="bg-gray-800 border-2 border-dashed border-gray-700 rounded-xl w-full h-full flex items-center justify-center">
                                                    <svg class="h-6 w-6 md:h-8 md:w-8 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-3 md:ml-4 flex-1">
                                            <div>
                                                <div class="flex justify-between">
                                                    <h3 class="text-base md:text-lg font-medium text-white">
                                                        <a href="#">{{ $item->product->name }}</a>
                                                    </h3>
                                                    <p class="ml-2 md:ml-4 text-base md:text-lg font-medium text-white">${{ number_format($item->product->price, 2) }}</p>
                                                </div>
                                                <p class="mt-1 text-xs md:text-sm text-gray-400">{{ $item->product->category->name }}</p>
                                            </div>
                                            <div class="flex flex-wrap items-center mt-2 gap-2">
                                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center">
                                                    @csrf
                                                    @method('PUT')
                                                    <label for="quantity-{{ $item->id }}" class="mr-2 text-xs md:text-sm text-gray-400">Qty:</label>
                                                    <input type="number" name="quantity" id="quantity-{{ $item->id }}" value="{{ $item->quantity }}" min="0" class="w-14 md:w-16 rounded-md bg-gray-800 border-gray-700 text-white shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm py-1 md:py-2 px-2 md:px-3">
                                                    <button type="submit" class="ml-2 text-xs md:text-sm font-medium text-red-600 hover:text-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 rounded px-2 py-1">Update</button>
                                                </form>
                                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="ml-0 md:ml-4">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-xs md:text-sm font-medium text-red-600 hover:text-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 rounded px-2 py-1">Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    
                    <div class="border-t border-gray-800 px-4 py-6 sm:px-6">
                        <div class="flex justify-between text-base md:text-lg font-medium text-white">
                            <p>Subtotal</p>
                            <p>${{ number_format($total, 2) }}</p>
                        </div>
                        <p class="mt-1 text-xs md:text-sm text-gray-400">Shipping and taxes calculated at checkout.</p>
                        <div class="mt-6">
                            <a href="{{ route('checkout.index') }}" class="flex items-center justify-center rounded-md border border-transparent bg-red-600 px-5 py-3 md:px-6 md:py-3 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-300 active:scale-95">
                                Checkout
                            </a>
                        </div>
                        <div class="mt-4 md:mt-6 flex justify-center text-sm text-gray-400">
                            <p>
                                or <a href="{{ route('shop') }}" class="font-medium text-red-600 hover:text-red-500 focus:outline-none focus:underline">Continue Shopping<span aria-hidden="true"> &rarr;</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-white">Your cart is empty</h3>
                    <p class="mt-1 text-sm text-gray-400">Start adding some products to your cart.</p>
                    <div class="mt-6">
                        <a href="{{ route('shop') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 active:scale-95">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-black py-8 border-t border-gray-800 mt-auto">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-4">OXGN<span class="text-red-600">FASHION</span></h3>
                    <p class="text-gray-400 text-sm md:text-base">
                        Urban fashion redefined. Premium quality streetwear for the modern lifestyle.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Shop</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition text-sm md:text-base">New Arrivals</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition text-sm md:text-base">Best Sellers</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition text-sm md:text-base">Sale</a></li>
                        <li><a href="#collections" class="text-gray-400 hover:text-white transition text-sm md:text-base">Collections</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm md:text-base">Contact Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm md:text-base">Shipping Info</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm md:text-base">Returns</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm md:text-base">FAQ</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Connect</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition focus:outline-none focus:ring-2 focus:ring-red-500 rounded-full p-1">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition focus:outline-none focus:ring-2 focus:ring-red-500 rounded-full p-1">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition focus:outline-none focus:ring-2 focus:ring-red-500 rounded-full p-1">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.477 2 2 6.477 2 12c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.523-4.477-10-10-10zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm-2-12c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2zm4 8H8v-1c0-1.324 1.945-2 4-2s4 .676 4 2v1z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p class="text-sm md:text-base">&copy; {{ date('Y') }} OXGN FASHION. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>
@endsection