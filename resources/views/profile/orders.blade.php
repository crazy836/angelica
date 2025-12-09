@extends('layouts.landing')

@section('content')
<div class="relative min-h-screen bg-black text-white pt-20">
    <div class="pb-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">
                    Order History
                </h1>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto animate-fade-in-up">
                    View your past orders and track your purchases
                </p>
            </div>
            
            <div class="bg-gray-900 rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-8">
                    <h2 class="text-2xl font-bold text-white mb-6">Your Orders</h2>
                    
                    @if($orders->count() > 0)
                        <div class="mt-6">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-800">
                                    <thead class="bg-gray-800">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Order #</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Date</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Items</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Total</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Status</th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">View</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-800 bg-gray-900">
                                        @foreach($orders as $order)
                                            <tr class="hover:bg-gray-800 transition duration-150">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-6">#{{ $order->id }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $order->created_at->format('M d, Y') }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $order->items->sum('quantity') }} items</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-white">${{ number_format($order->total_amount, 2) }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                                    <span class="inline-flex rounded-full bg-{{ $order->status === 'completed' ? 'green' : ($order->status === 'cancelled' ? 'red' : 'yellow') }}-900 px-2 text-xs font-semibold leading-5 text-{{ $order->status === 'completed' ? 'green' : ($order->status === 'cancelled' ? 'red' : 'yellow') }}-300">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                </td>
                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                    <a href="{{ route('profile.order.show', $order->id) }}" class="text-red-500 hover:text-red-400 transition duration-300 flex items-center">
                                                        View
                                                        <!-- Smaller arrow icon as per user preference -->
                                                        <svg class="ml-1 h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="mt-6">
                                {{ $orders->links() }}
                            </div>
                        </div>
                    @else
                        <div class="mt-6 text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-white">No orders yet</h3>
                            <p class="mt-1 text-gray-400">You haven't placed any orders yet.</p>
                            <div class="mt-6">
                                <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300">
                                    Start Shopping
                                </a>
                            </div>
                        </div>
                    @endif
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