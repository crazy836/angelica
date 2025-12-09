@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center mb-8">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-white" data-aos="fade-right">Orders</h1>
            <p class="mt-2 text-lg text-gray-300" data-aos="fade-right" data-aos-delay="100">Manage customer orders</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-700 bg-opacity-50 px-4 py-2 text-sm font-medium text-gray-300 shadow-sm hover:bg-gray-600 hover:bg-opacity-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto transition duration-300">
                Back to Dashboard
            </a>
        </div>
    </div>

    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-black bg-opacity-55 rounded-xl shadow-lg p-6">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-800">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Order ID</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Customer</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Date</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Amount</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Status</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Payment</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800 bg-gray-900 bg-opacity-50">
                            @forelse ($orders as $order)
                                <tr class="hover:bg-gray-800 hover:bg-opacity-50 transition duration-200">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-6">
                                        #{{ $order->id }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                        {{ $order->user->name }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                        {{ $order->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                        ${{ number_format($order->total_amount, 2) }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm">
                                        <span class="inline-flex rounded-full bg-{{ $order->status === 'completed' ? 'green' : ($order->status === 'processing' ? 'yellow' : ($order->status === 'pending' ? 'blue' : 'red')) }}-100 bg-opacity-20 px-2 text-xs font-semibold leading-5 text-{{ $order->status === 'completed' ? 'green' : ($order->status === 'processing' ? 'yellow' : ($order->status === 'pending' ? 'blue' : 'red')) }}-400">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm">
                                        <span class="inline-flex rounded-full bg-{{ $order->payment_status === 'paid' ? 'green' : ($order->payment_status === 'pending' ? 'yellow' : 'red') }}-100 bg-opacity-20 px-2 text-xs font-semibold leading-5 text-{{ $order->payment_status === 'paid' ? 'green' : ($order->payment_status === 'pending' ? 'yellow' : 'red') }}-400">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="{{ route('admin.orders.show', $order) }}" class="text-red-400 hover:text-red-300 mr-4 transition duration-300">View</a>
                                        <a href="{{ route('admin.orders.edit', $order) }}" class="text-red-400 hover:text-red-300 transition duration-300">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-8 text-center text-lg text-gray-300">
                                        No orders found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-6">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection