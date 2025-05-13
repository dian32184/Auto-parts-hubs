@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Popular Categories -->
    <h2 class="text-3xl font-bold text-center mb-12">Popular Categories</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        <!-- Engine Parts -->
        <div class="category-card">
            <h3 class="text-2xl font-semibold mb-2">Engine Parts</h3>
            <p class="text-gray-600 mb-4">High-quality engine components for optimal performance.</p>
            <div class="h-64 rounded-lg overflow-hidden mb-4">
                <img src="{{ asset('images/categories/engine-parts.jpg') }}" alt="Engine Parts" 
                     class="w-full h-full object-cover transform hover:scale-105 transition duration-300">
            </div>
            <a href="{{ route('shop.category', ['slug' => 'engine-parts']) }}" 
               class="text-blue-600 hover:text-blue-800">Browse engine parts</a>
        </div>

        <!-- Brake System -->
        <div class="category-card">
            <h3 class="text-2xl font-semibold mb-2">Brake System</h3>
            <p class="text-gray-600 mb-4">Premium brake parts for maximum safety and reliability.</p>
            <div class="h-64 rounded-lg overflow-hidden mb-4">
                <img src="{{ asset('images/categories/brake-system.jpg') }}" alt="Brake System" 
                     class="w-full h-full object-cover transform hover:scale-105 transition duration-300">
            </div>
            <a href="{{ route('shop.category', ['slug' => 'brake-system']) }}" 
               class="text-blue-600 hover:text-blue-800">Browse brake system</a>
        </div>

        <!-- Electrical System -->
        <div class="category-card">
            <h3 class="text-2xl font-semibold mb-2">Electrical System</h3>
            <p class="text-gray-600 mb-4">Superior electrical systems for dependable power and protection.</p>
            <div class="h-64 rounded-lg overflow-hidden mb-4">
                <img src="{{ asset('images/categories/electrical-system.jpg') }}" alt="Electrical System" 
                     class="w-full h-full object-cover transform hover:scale-105 transition duration-300">
            </div>
            <a href="{{ route('shop.category', ['slug' => 'electrical-system']) }}" 
               class="text-blue-600 hover:text-blue-800">Browse electrical system</a>
        </div>
    </div>

    <!-- Main Categories -->
    <h2 class="text-3xl font-bold text-center mb-8">Main Categories</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <!-- Motor Parts -->
        <div class="main-category-card relative overflow-hidden rounded-lg h-96">
            <img src="{{ asset('images/categories/motor-parts-bg.jpg') }}" alt="Motor Parts" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-blue-900/50 flex items-center justify-center">
                <div class="text-center">
                    <h2 class="text-5xl font-bold text-white mb-4">Motor<br>Parts</h2>
                    <a href="{{ route('shop.category', ['slug' => 'motor-parts']) }}" 
                       class="inline-block bg-white text-blue-900 px-8 py-3 rounded-full hover:bg-blue-100 transition">View All</a>
                </div>
            </div>
        </div>

        <!-- Vehicle Parts -->
        <div class="main-category-card relative overflow-hidden rounded-lg h-96">
            <img src="{{ asset('images/categories/vehicle-parts-bg.jpg') }}" alt="Vehicle Parts" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                <div class="text-center">
                    <h2 class="text-5xl font-bold text-white mb-4">Vehicle<br>Parts</h2>
                    <a href="{{ route('shop.category', ['slug' => 'vehicle-parts']) }}" 
                       class="inline-block bg-white text-gray-900 px-8 py-3 rounded-full hover:bg-gray-100 transition">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.category-card {
    @apply bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition duration-300 w-full;
}

.main-category-card {
    @apply transform hover:scale-105 transition duration-300 cursor-pointer shadow-xl;
}

.main-category-card img {
    @apply transition duration-300;
}

.main-category-card:hover img {
    @apply scale-110;
}
</style>
@endsection

@push('scripts')
@vite('resources/js/shop.js')
@endpush 