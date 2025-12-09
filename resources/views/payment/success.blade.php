@extends('layouts.landing')

@section('content')
<div class="relative min-h-screen bg-black text-white pt-20">
    <div class="pb-12">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                <div class="bg-gray-900 rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-12 text-center">
                        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-900">
                            <svg class="h-8 w-8 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        
                        <h1 class="mt-6 text-4xl font-bold text-white">Payment Successful!</h1>
                        <p class="mt-4 text-xl text-gray-400">Thank you for your order.</p>
                        
                        <div class="mt-10 bg-gray-800 rounded-lg p-6 text-left">
                            <h2 class="text-2xl font-bold text-white mb-6">Order Details</h2>
                            
                            <div class="space-y-4">
                                <div class="flex justify-between">
                                    <p class="text-gray-400">Order Number</p>
                                    <p class="font-medium text-white">#{{ $order->id }}</p>
                                </div>
                                
                                <div class="flex justify-between">
                                    <p class="text-gray-400">Date</p>
                                    <p class="font-medium text-white">{{ $order->created_at->format('M d, Y') }}</p>
                                </div>
                                
                                <div class="flex justify-between">
                                    <p class="text-gray-400">Total</p>
                                    <p class="font-medium text-white">${{ number_format($order->total_amount, 2) }}</p>
                                </div>
                                
                                <div class="flex justify-between">
                                    <p class="text-gray-400">Status</p>
                                    <p class="font-medium text-green-400">{{ ucfirst($order->status) }}</p>
                                </div>
                                
                                <div class="flex justify-between">
                                    <p class="text-gray-400">Payment Status</p>
                                    <p class="font-medium text-white">{{ ucfirst($order->payment_status) }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-10">
                            <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300">
                                Continue Shopping
                            </a>
                            
                            <a href="{{ route('profile.orders') }}" class="ml-4 inline-flex items-center px-6 py-3 border border-gray-700 text-base font-medium rounded-md shadow-sm text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300">
                                View Order History
                            </a>
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
@endsection