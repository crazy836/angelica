@extends('admin.layouts.app')

@section('content')
<div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center mb-8">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-white" data-aos="fade-right">Edit Product</h1>
            <p class="mt-2 text-lg text-gray-300" data-aos="fade-right" data-aos-delay="100">Update product information</p>
        </div>
    </div>

    <div class="mt-8">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')
            
            <div class="bg-black bg-opacity-55 rounded-xl shadow-lg p-8" data-aos="fade-up">
                <div class="md:grid md:grid-cols-3 md:gap-8">
                    <div class="md:col-span-1">
                        <h3 class="text-xl font-bold leading-6 text-white">Product Information</h3>
                        <p class="mt-2 text-base text-gray-300">Update general information about the product</p>
                    </div>
                    
                    <div class="mt-6 md:mt-0 md:col-span-2">
                        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Product Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="w-full rounded-lg border-gray-600 bg-gray-800 text-white shadow-sm focus:border-red-500 focus:ring-red-500 py-3 px-4">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="category_id" class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                                <select id="category_id" name="category_id" class="w-full rounded-lg border-gray-600 bg-gray-800 text-white shadow-sm focus:border-red-500 focus:ring-red-500 py-3 px-4">
                                    <option value="">Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="sm:col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                                <textarea id="description" name="description" rows="4" class="w-full rounded-lg border-gray-600 bg-gray-800 text-white shadow-sm focus:border-red-500 focus:ring-red-500 py-3 px-4">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-300 mb-2">Price</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-400 sm:text-sm">$</span>
                                    </div>
                                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" class="block w-full pl-7 pr-12 rounded-lg border-gray-600 bg-gray-800 text-white focus:border-red-500 focus:ring-red-500 py-3 px-4">
                                </div>
                                @error('price')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="stock" class="block text-sm font-medium text-gray-300 mb-2">Stock Quantity</label>
                                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" min="0" class="w-full rounded-lg border-gray-600 bg-gray-800 text-white shadow-sm focus:border-red-500 focus:ring-red-500 py-3 px-4">
                                @error('stock')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="sm:col-span-2">
                                <label for="cover_image" class="block text-sm font-medium text-gray-300 mb-2">Cover Image</label>
                                <input type="file" name="cover_image" id="cover_image" class="w-full text-sm text-gray-400 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-base file:font-medium file:bg-red-900 file:bg-opacity-50 file:text-red-300 hover:file:bg-red-800 hover:file:bg-opacity-50">
                                @error('cover_image')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                                
                                @if($product->cover_image)
                                    <div class="mt-4">
                                        <img src="{{ asset('images/' . $product->cover_image) }}" alt="{{ $product->name }}" class="h-24 w-24 object-cover rounded-lg">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.products.index') }}" class="bg-gray-700 bg-opacity-50 py-3 px-6 border border-gray-600 rounded-lg shadow-sm text-base font-medium text-gray-300 hover:bg-gray-600 hover:bg-opacity-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300">
                    Cancel
                </a>
                <button type="submit" class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 transform hover:scale-105">
                    Update Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection