@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center mb-8">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-white" data-aos="fade-right">Admin Dashboard</h1>
            <p class="mt-2 text-lg text-gray-300" data-aos="fade-right" data-aos-delay="100">Welcome to the OxgnFashion Admin Panel</p>
        </div>
    </div>
    
    <div class="mt-8 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
        <div class="bg-black bg-opacity-55 rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-red-900 bg-opacity-50 rounded-md p-3">
                    <svg class="h-6 w-6 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-300 truncate">Total Products</dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-white">
                                {{ \App\Models\Product::count() }}
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        
        <div class="bg-black bg-opacity-55 rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-red-900 bg-opacity-50 rounded-md p-3">
                    <svg class="h-6 w-6 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-300 truncate">Total Categories</dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-white">
                                {{ \App\Models\Category::count() }}
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        
        <div class="bg-black bg-opacity-55 rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="300">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-red-900 bg-opacity-50 rounded-md p-3">
                    <svg class="h-6 w-6 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-300 truncate">Total Users</dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-white">
                                {{ \App\Models\User::count() }}
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        
        <div class="bg-black bg-opacity-55 rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="400">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-red-900 bg-opacity-50 rounded-md p-3">
                    <svg class="h-6 w-6 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-300 truncate">Total Revenue</dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-white">
                                ${{ number_format(\App\Models\Order::sum('total_amount'), 2) }}
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Orders Section -->
    <div class="mt-8 bg-black bg-opacity-55 rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="400">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h2 class="text-xl font-bold text-white">Recent Orders</h2>
                <p class="mt-1 text-sm text-gray-300">Latest orders from your customers</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto">
                    View All Orders
                </a>
            </div>
        </div>
        
        <div class="mt-6">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Order ID</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Customer</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Date</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Amount</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800 bg-gray-900 bg-opacity-50">
                        @php
                            $recentOrders = \App\Models\Order::with('user')->latest()->take(5)->get();
                        @endphp
                        @forelse ($recentOrders as $order)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-6">#{{ $order->id }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $order->user->name }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $order->created_at->format('M d, Y') }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">${{ number_format($order->total_amount, 2) }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm">
                                    <span class="inline-flex rounded-full bg-{{ $order->status === 'completed' ? 'green' : ($order->status === 'processing' ? 'yellow' : 'gray') }}-100 bg-opacity-20 px-2 text-xs font-semibold leading-5 text-{{ $order->status === 'completed' ? 'green' : ($order->status === 'processing' ? 'yellow' : 'gray') }}-400">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-4 text-center text-sm text-gray-300">No orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection