@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Search Results Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold mb-2">Search Results</h1>
        <p class="text-gray-600">{{ $products->total() }} results found for "{{ $query }}"</p>
    </div>

    @if($products->isEmpty())
        <div class="text-center py-12">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">No products found</h2>
            <p class="text-gray-600 mb-6">Try searching with different keywords or browse our categories</p>
            <a href="{{ route('shop.index') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition">
                Browse All Products
            </a>
        </div>
    @else
        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <a href="{{ route('shop.product.details', ['product_slug' => $product->slug]) }}" class="block">
                    <div class="relative h-48">
                        <img src="{{ asset($product->image_path ?? 'images/products/default.jpg') }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover">
                        @if($product->discount_percent > 0)
                            <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-full text-sm">
                                -{{ $product->discount_percent }}%
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2 text-gray-800">{{ $product->name }}</h3>
                        <div class="flex items-center justify-between">
                            <div>
                                @if($product->discount_percent > 0)
                                    <span class="text-gray-500 line-through text-sm">${{ number_format($product->regular_price, 2) }}</span>
                                    <span class="text-red-600 font-bold ml-2">${{ number_format($product->sale_price, 2) }}</span>
                                @else
                                    <span class="text-gray-800 font-bold">${{ number_format($product->regular_price, 2) }}</span>
                                @endif
                            </div>
                            @if($product->stock_status === 'instock')
                                <span class="text-green-600 text-sm">In Stock</span>
                            @else
                                <span class="text-red-600 text-sm">Out of Stock</span>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->appends(['search-keyword' => $query])->links() }}
        </div>
    @endif
</div>
@endsection 