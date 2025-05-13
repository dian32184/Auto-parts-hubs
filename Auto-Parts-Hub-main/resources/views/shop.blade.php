@extends('layouts.app')
@section('content')

<header id="header" class="header header-fullwidth bg-white">
  <div class="container">
    <div class="header-desk header-desk_type_1">
      <div class="logo">
        <a href="{{ route('home.index') }}">
          <img src="{{asset('assets/images/logo.png')}}" alt="Uomo" class="logo__image d-block" />
        </a>
      </div>

      <nav class="navigation">
        <ul class="navigation__list list-unstyled d-flex">
          <li class="navigation__item">
            <a href="{{ route('home.index') }}" class="navigation__link">Home</a>
          </li>
          <li class="navigation__item">
            <a href="{{ route('shop.index') }}" class="navigation__link">Shop</a>
          </li>
          <li class="navigation__item">
            <a href="{{ route('cart.index') }}" class="navigation__link">Cart</a>
          </li>
          <li class="navigation__item">
            <a href="{{ route('about.index') }}" class="navigation__link">About</a>
          </li>
          <li class="navigation__item">
            <a href="{{ route('contact.index') }}" class="navigation__link">Contact</a>
          </li>
        </ul>
      </nav>

      <div class="header-tools d-flex align-items-center">
        <div class="header-tools__item hover-container">
          <div class="js-hover__open position-relative">
            <a class="js-search-popup search-field__actor" href="#">
              <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_search" />
              </svg>
              <i class="btn-icon btn-close-lg"></i>
            </a>
          </div>

          <div class="search-popup js-hidden-content">
            <form action="{{ route('shop.search') }}" method="GET" class="search-field container">
              <p class="text-uppercase text-secondary fw-medium mb-4">What are you looking for?</p>
              <div class="position-relative">
                <input class="search-field__input search-popup__input w-100 fw-medium" type="text"
                  name="search-keyword" placeholder="Search products" required />
                <button class="btn-icon search-popup__submit" type="submit">
                  <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_search" />
                  </svg>
                </button>
                <button class="btn-icon btn-close-lg search-popup__reset" type="reset"></button>
              </div>
            </form>
          </div>
        </div>

        @guest
        <div class="header-tools__item hover-container">
          <a href="{{ route('login') }}" class="header-tools__item">
            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_user" />
            </svg>
          </a>
        </div>
        @else     
        <div class="header-tools__item hover-container">
          <a href="{{ Auth::user()->utype === 'ADM' ? route('admin.index'): route('user.index')}}" class="header-tools__item">
            <span class="pr-6px">{{ Auth::user()->name }}</span>
            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_user" />
            </svg>
          </a>
        </div>
        @endguest

        <a href="{{ route('wishlist.index') }}" class="header-tools__item header-tools__cart">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_heart" />
          </svg>
          @if (Cart::instance('wishlist')->content()->count() > 0)
          <span class="cart-amount d-block position-absolute js-cart-items-count">{{Cart::instance('wishlist')->content()->count() }}</span>
          @endif
        </a>

        <a href="{{ route('cart.index') }}" class="header-tools__item header-tools__cart">
          <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_cart" />
          </svg>
          @if (Cart::instance('cart')->content()->count()>0)
          <span class="cart-amount d-block position-absolute js-cart-items-count">{{Cart::instance('cart')->content()->count()}}</span>
          @endif
        </a>
      </div>
    </div>
  </div>
</header>

<div class="container mx-auto px-4 py-8">
    <!-- Popular Categories -->
    <h2 class="text-3xl font-bold text-center mb-8">Popular Categories</h2>
    <div class="flex overflow-x-auto pb-6 mb-12 gap-6 scrollbar-hide">
        @foreach($systemCategories as $category)
        <div class="category-card flex-none w-72">
            <h3 class="text-xl font-semibold mb-2">{{ $category['name'] }}</h3>
            <p class="text-gray-600 mb-4">{{ $category['description'] }}</p>
            <div class="h-48 rounded-lg overflow-hidden mb-4">
                <img src="{{ asset($category['image']) }}" alt="{{ $category['name'] }}" class="w-full h-full object-cover">
            </div>
            <a href="{{ route('shop.category', ['type' => $category['type'], 'slug' => $category['slug']]) }}" 
               class="text-blue-600 hover:text-blue-800">Browse {{ strtolower($category['name']) }}</a>
        </div>
        @endforeach
    </div>

    <!-- Main Categories -->
    <h2 class="text-3xl font-bold text-center mb-8">Main Categories</h2>
    <div class="flex gap-8 mb-12">
        <!-- Motor Parts -->
        <div class="main-category-card relative overflow-hidden rounded-lg h-80 flex-1">
            <img src="{{ asset('images/categories/motor-parts-bg.jpg') }}" alt="Motor Parts" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-blue-900/50 flex items-center justify-center">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-white mb-4">Motor<br>Parts</h2>
                    <a href="{{ route('shop.category', ['type' => 'motor', 'slug' => 'all']) }}" 
                       class="inline-block bg-white text-blue-900 px-6 py-2 rounded-full hover:bg-blue-100 transition">View All</a>
                </div>
            </div>
        </div>

        <!-- Vehicle Parts -->
        <div class="main-category-card relative overflow-hidden rounded-lg h-80 flex-1">
            <img src="{{ asset('images/categories/vehicle-parts-bg.jpg') }}" alt="Vehicle Parts" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-white mb-4">Vehicle<br>Parts</h2>
                    <a href="{{ route('shop.category', ['type' => 'vehicle', 'slug' => 'all']) }}" 
                       class="inline-block bg-white text-gray-900 px-6 py-2 rounded-full hover:bg-gray-100 transition">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.category-card {
    @apply bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition duration-300;
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

/* Hide scrollbar for Chrome, Safari and Opera */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.scrollbar-hide {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}

.header {
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
</style>
@endsection

@push('scripts')
<script>
   $(function(){
    $("#pagesize").on("change",function(){
      $("#size").val($("#pagesize option:selected").val());
      $("#frmfilter").submit();
    });

    $("#orderby").on("change",function(){                    
    $("#order").val($("#orderby option:selected").val());
    $("#frmfilter").submit(); 
    });

    $("input[name='brands']").on("change",function(){
      var brands = "";
      $("input[name='brands']:checked").each(function(){
        if(brands == "")
      {
        brands += $(this).val();
      }
      else
      {
        brands  += "," + $(this).val();
      }
      });
      $("#hdnBrands").val(brands);
      $("#frmfilter").submit(); 
    });

    $("input[name='categories']").on("change",function(){
      var categories = "";
      $("input[name='categories']:checked").each(function(){
        if(categories == "")
      {
        categories += $(this).val();
      }
      else
      {
        categories  += "," + $(this).val();
      }
      });
      $("#hdnCategories").val(categories);
      $("#frmfilter").submit(); 
    });
     $("[name='price_range']").on("change",function(){
      var min = $(this).val().split(',')[0];
      var max = $(this).val().split(',')[1];
      $("#hdnMinPrice").val(min);
      $("#hdnMaxPrice").val(max);
      setTimeout(() => {
        $("#frmfilter").submit();
      }, 2000);
     })
   });
</script>
@endpush
