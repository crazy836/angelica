@extends('admin.layouts.app')

@section('content')
<div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center mb-8">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-white" data-aos="fade-right">Edit Order</h1>
            <p class="mt-2 text-lg text-gray-300" data-aos="fade-right" data-aos-delay="100">Update order #{{ $order->id }}</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-700 bg-opacity-50 px-4 py-2 text-sm font-medium text-gray-300 shadow-sm hover:bg-gray-600 hover:bg-opacity-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto transition duration-300">
                Back to Orders
            </a>
        </div>
    </div>

    <div class="mt-8">
        <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')
            
            <div class="bg-black bg-opacity-55 rounded-xl shadow-lg p-8" data-aos="fade-up">
                <div class="md:grid md:grid-cols-3 md:gap-8">
                    <div class="md:col-span-1">
                        <h3 class="text-xl font-bold leading-6 text-white">Order Information</h3>
                        <p class="mt-2 text-base text-gray-300">Update the status and payment information for this order</p>
                    </div>
                    
                    <div class="mt-6 md:mt-0 md:col-span-2">
                        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-300 mb-2">Order Status</label>
                                <select id="status" name="status" class="w-full rounded-lg border-gray-600 bg-gray-800 text-white shadow-sm focus:border-red-500 focus:ring-red-500 py-3 px-4">
                                    <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ old('status', $order->status) == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="completed" {{ old('status', $order->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ old('status', $order->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                @error('status')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="payment_status" class="block text-sm font-medium text-gray-300 mb-2">Payment Status</label>
                                <select id="payment_status" name="payment_status" class="w-full rounded-lg border-gray-600 bg-gray-800 text-white shadow-sm focus:border-red-500 focus:ring-red-500 py-3 px-4">
                                    <option value="pending" {{ old('payment_status', $order->payment_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="paid" {{ old('payment_status', $order->payment_status) == 'paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="failed" {{ old('payment_status', $order->payment_status) == 'failed' ? 'selected' : '' }}>Failed</option>
                                </select>
                                @error('payment_status')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mt-8">
                            <h4 class="text-lg font-bold text-white mb-4">Order Summary</h4>
                            <div class="bg-gray-800 bg-opacity-50 rounded-xl p-6">
                                <div class="space-y-4">
                                    <div class="flex justify-between">
                                        <span class="text-gray-300">Order ID:</span>
                                        <span class="text-white font-medium">#{{ $order->id }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-300">Customer:</span>
                                        <span class="text-white font-medium">{{ $order->user->name }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-300">Order Date:</span>
                                        <span class="text-white font-medium">{{ $order->created_at->format('M d, Y H:i') }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-300">Total Amount:</span>
                                        <span class="text-white font-bold text-lg">${{ number_format($order->total_amount, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.orders.index') }}" class="bg-gray-700 bg-opacity-50 py-3 px-6 border border-gray-600 rounded-lg shadow-sm text-base font-medium text-gray-300 hover:bg-gray-600 hover:bg-opacity-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300">
                    Cancel
                </a>
                <button type="submit" class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 transform hover:scale-105">
                    Update Order
                </button>
            </div>
        </form>
    </div>
</div>
@endsection