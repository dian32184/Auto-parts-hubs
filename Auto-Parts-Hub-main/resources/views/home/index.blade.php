@extends('layouts.app')

@section('content')
<!-- Hero Slider -->
<section class="hero-slider">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($sliders as $key => $slider)
                <button type="button" 
                        data-bs-target="#heroCarousel" 
                        data-bs-slide-to="{{ $key }}" 
                        class="{{ $key === 0 ? 'active' : '' }}"
                        aria-current="{{ $key === 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $key + 1 }}">
                </button>
            @endforeach
        </div>

        <div class="carousel-inner">
            @foreach($sliders as $key => $slider)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $slider->image) }}" 
                         class="d-block w-100" 
                         alt="{{ $slider->title }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4 fw-bold">{{ $slider->title }}</h2>
                        @if($slider->subtitle)
                            <p class="lead">{{ $slider->subtitle }}</p>
                        @endif
                        @if($slider->link && $slider->button_text)
                            <a href="{{ $slider->link }}" class="btn btn-primary btn-lg">
                                {{ $slider->button_text }}
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        @if($sliders->count() > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        @endif
    </div>
</section>

<!-- Featured Products Section -->
<section class="featured-products py-5">
    <div class="container">
        <h2 class="section-title text-center mb-4">Featured Products</h2>
        <div class="row">
            @foreach($featuredProducts as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $product->name }}"
                                 style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0">${{ number_format($product->price, 2) }}</span>
                                <a href="{{ route('shop.product.details', $product->slug) }}" 
                                   class="btn btn-primary">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.hero-slider {
    margin-top: -24px; /* Adjust based on your navbar height */
}

.carousel-item {
    height: 600px;
    background-color: #000;
}

.carousel-item img {
    object-fit: cover;
    height: 100%;
    width: 100%;
}

.carousel-caption {
    background: rgba(0, 0, 0, 0.5);
    padding: 2rem;
    border-radius: 10px;
    max-width: 80%;
    margin: 0 auto;
}

.carousel-caption h2 {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.carousel-caption p {
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}

.section-title {
    position: relative;
    padding-bottom: 15px;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 3px;
    background-color: var(--bs-primary);
}
</style>
@endsection 