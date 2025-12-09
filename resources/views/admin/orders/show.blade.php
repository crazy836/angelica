@extends('admin.layouts.app')

@section('content')
<div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center mb-8">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-white" data-aos="fade-right">Order Details</h1>
            <p class="mt-2 text-lg text-gray-300" data-aos="fade-right" data-aos-delay="100">View details for order #{{ $order->id }}</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none flex space-x-3">
            <button onclick="window.print()" class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-600 bg-opacity-80 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 hover:bg-opacity-80 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto transition duration-300 no-print">
                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Print Order
            </button>
            <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-700 bg-opacity-50 px-4 py-2 text-sm font-medium text-gray-300 shadow-sm hover:bg-gray-600 hover:bg-opacity-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto transition duration-300">
                Back to Orders
            </a>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-8 lg:grid-cols-3">
        <!-- Order Details -->
        <div class="bg-black bg-opacity-55 rounded-xl shadow-lg p-8" data-aos="fade-up">
            <h2 class="text-2xl font-bold text-white mb-6">Order Items</h2>
            
            <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-10 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800">
                        <tr>
                            <th scope="col" class="py-4 pl-6 pr-4 text-left text-base font-semibold text-white">Product</th>
                            <th scope="col" class="px-4 py-4 text-left text-base font-semibold text-white">Price</th>
                            <th scope="col" class="px-4 py-4 text-left text-base font-semibold text-white">Quantity</th>
                            <th scope="col" class="px-4 py-4 text-left text-base font-semibold text-white">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800 bg-gray-900 bg-opacity-50">
                        @foreach ($order->items as $item)
                            <tr class="hover:bg-gray-800 hover:bg-opacity-30">
                                <td class="py-5 pl-6 pr-4 text-base font-medium text-white">
                                    <div class="max-w-md break-words">{{ $item->product->name }}</div>
                                </td>
                                <td class="px-4 py-5 text-base text-gray-200 whitespace-nowrap">
                                    ${{ number_format($item->price, 2) }}
                                </td>
                                <td class="px-4 py-5 text-base text-gray-200 whitespace-nowrap">
                                    {{ $item->quantity }}
                                </td>
                                <td class="px-4 py-5 text-base font-medium text-white whitespace-nowrap">
                                    ${{ number_format($item->price * $item->quantity, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gray-800">
                        <tr>
                            <th colspan="3" scope="row" class="py-4 pl-6 pr-4 text-right text-base font-semibold text-gray-200">Subtotal</th>
                            <td class="py-4 px-4 text-right text-base text-gray-200 whitespace-nowrap">${{ number_format($order->subtotal, 2) }}</td>
                        </tr>
                        <tr>
                            <th colspan="3" scope="row" class="py-4 pl-6 pr-4 text-right text-base font-semibold text-gray-200">Tax</th>
                            <td class="py-4 px-4 text-right text-base text-gray-200 whitespace-nowrap">${{ number_format($order->tax_amount, 2) }}</td>
                        </tr>
                        <tr>
                            <th colspan="3" scope="row" class="py-4 pl-6 pr-4 text-right text-base font-semibold text-gray-200">Shipping</th>
                            <td class="py-4 px-4 text-right text-base text-gray-200 whitespace-nowrap">${{ number_format($order->shipping_cost, 2) }}</td>
                        </tr>
                        <tr>
                            <th colspan="3" scope="row" class="py-5 pl-6 pr-4 text-right text-lg font-bold text-white">Total</th>
                            <td class="py-5 px-4 text-right text-lg font-bold text-white whitespace-nowrap">${{ number_format($order->total_amount, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        
        <!-- Customer Information -->
        <div class="bg-black bg-opacity-55 rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-2xl font-bold text-white mb-6">Customer Information</h2>
            
            <div class="space-y-5">
                <div>
                    <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Name</p>
                    <p class="mt-2 text-lg text-white">{{ $order->user->name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Email</p>
                    <p class="mt-2 text-lg text-white break-all">{{ $order->user->email }}</p>
                </div>
                @if($order->shipping_address)
                <div>
                    <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Shipping Address</p>
                    <p class="mt-2 text-base text-white whitespace-pre-line break-words">{{ $order->shipping_address }}</p>
                </div>
                @endif
                @if($order->billing_address && $order->billing_address !== $order->shipping_address)
                <div>
                    <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Billing Address</p>
                    <p class="mt-2 text-base text-white whitespace-pre-line break-words">{{ $order->billing_address }}</p>
                </div>
                @endif
            </div>
        </div>
        
        <!-- Order Information -->
        <div class="bg-black bg-opacity-55 rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-2xl font-bold text-white mb-6">Order Information</h2>
            
            <div class="space-y-5">
                <div>
                    <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Order ID</p>
                    <p class="mt-2 text-lg text-white">#{{ $order->id }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Order Date</p>
                    <p class="mt-2 text-lg text-white">{{ $order->created_at->format('M d, Y H:i') }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Status</p>
                    <div class="mt-2">
                        <span class="inline-flex rounded-full bg-{{ $order->status === 'completed' ? 'green' : ($order->status === 'processing' ? 'yellow' : ($order->status === 'pending' ? 'blue' : 'red')) }}-100 bg-opacity-20 px-4 py-2 text-base font-semibold leading-5 text-{{ $order->status === 'completed' ? 'green' : ($order->status === 'processing' ? 'yellow' : ($order->status === 'pending' ? 'blue' : 'red')) }}-400">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Payment Status</p>
                    <div class="mt-2">
                        <span class="inline-flex rounded-full bg-{{ $order->payment_status === 'paid' ? 'green' : ($order->payment_status === 'pending' ? 'yellow' : 'red') }}-100 bg-opacity-20 px-4 py-2 text-base font-semibold leading-5 text-{{ $order->payment_status === 'paid' ? 'green' : ($order->payment_status === 'pending' ? 'yellow' : 'red') }}-400">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </div>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Payment Method</p>
                    <p class="mt-2 text-lg text-white break-words">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
    <style>
        @media print {
            /* Hide elements that shouldn't appear in print */
            .no-print, nav, footer, button, .sidebar, .header-actions {
                display: none !important;
            }
            
            /* Adjust layout for print */
            body {
                background-color: white !important;
                color: black !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            
            .bg-black, .bg-gray-900, .bg-gray-800, .bg-black.bg-opacity-55 {
                background-color: white !important;
                color: black !important;
                border: 1px solid #ddd;
            }
            
            /* Ensure good contrast for text */
            .text-white, .text-gray-300, .text-gray-200, .text-gray-400 {
                color: black !important;
            }
            
            /* Remove shadows and animations */
            * {
                box-shadow: none !important;
                animation: none !important;
                transition: none !important;
                background-image: none !important;
            }
            
            /* Make sure images are visible */
            img {
                filter: none !important;
                opacity: 1 !important;
            }
            
            /* Add some padding for better print layout */
            .max-w-[1400px] {
                max-width: 100% !important;
                padding: 20px !important;
            }
            
            /* Force page breaks for better organization */
            .page-break {
                page-break-before: always;
            }
            
            /* Ensure tables are readable */
            table {
                border-collapse: collapse !important;
            }
            
            th, td {
                border: 1px solid #000 !important;
                padding: 8px !important;
            }
            
            /* Remove rounded corners */
            .rounded-xl, .rounded-md, .rounded-lg {
                border-radius: 0 !important;
            }
        }
    </style>
@endsection