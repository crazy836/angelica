@extends('admin.layouts.app')

@section('content')
<div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center mb-8">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-white" data-aos="fade-right">Products</h1>
            <p class="mt-2 text-lg text-gray-300" data-aos="fade-right" data-aos-delay="100">Manage your product inventory</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('admin.products.create') }}" class="inline-flex items-center justify-center rounded-lg border border-transparent bg-red-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto transition duration-300 transform hover:scale-105">
                Add Product
            </a>
        </div>
    </div>

    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-xl bg-black bg-opacity-55 rounded-xl shadow-lg p-6">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-800">
                            <tr>
                                <th scope="col" class="py-4 pl-6 pr-4 text-left text-base font-semibold text-white">Image</th>
                                <th scope="col" class="px-4 py-4 text-left text-base font-semibold text-white">Name</th>
                                <th scope="col" class="px-4 py-4 text-left text-base font-semibold text-white">Category</th>
                                <th scope="col" class="px-4 py-4 text-left text-base font-semibold text-white">Price</th>
                                <th scope="col" class="px-4 py-4 text-left text-base font-semibold text-white">Stock</th>
                                <th scope="col" class="relative py-4 pl-4 pr-6 text-right text-base font-semibold text-white">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800 bg-gray-900 bg-opacity-50">
                            @forelse ($products as $product)
                                <tr class="hover:bg-gray-800 hover:bg-opacity-50 transition duration-200">
                                    <td class="whitespace-nowrap py-5 pl-6 pr-4">
                                        @if ($product->cover_image)
                                            <img src="{{ asset('images/' . $product->cover_image) }}" alt="{{ $product->name }}" class="h-12 w-12 rounded-lg object-cover">
                                        @else
                                            <div class="h-12 w-12 rounded-lg bg-gray-700 flex items-center justify-center">
                                                <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-5 text-base font-medium text-white">
                                        {{ $product->name }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-5 text-base text-gray-300">
                                        {{ $product->category->name ?? 'N/A' }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-5 text-base text-gray-300">
                                        ${{ number_format($product->price, 2) }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-5 text-base text-gray-300">
                                        {{ $product->stock }}
                                    </td>
                                    <td class="relative whitespace-nowrap py-5 pl-4 pr-6 text-right text-base font-medium">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="text-red-400 hover:text-red-300 mr-6 transition duration-300">Edit</a>
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300 transition duration-300">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-12 text-center text-xl text-gray-300">
                                        No products found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection