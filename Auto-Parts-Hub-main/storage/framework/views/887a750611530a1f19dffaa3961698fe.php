<?php $__env->startSection('content'); ?>
<main>
    <section class="swiper-container js-swiper-slider swiper-number-pagination slideshow" data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'>
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="overflow-hidden position-relative h-100">
            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
              <img loading="lazy" src="<?php echo e(asset('assets/images/home/slideshow-engine.png')); ?>" width="542" height="733"
                alt="High Performance Engine Parts"
                class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
              <div class="character_markup type2">
                <p class="text-uppercase font-sofia mark-grey-color animate animate_fade animate_btt animate_delay-10 mb-0">
                  Engine Parts</p>
              </div>
            </div>
            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
              <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                New Arrivals</h6>
              <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Premium</h2>
              <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Engine Parts</h2>
              <a href="<?php echo e(route('shop.category', ['slug' => 'engine-parts'])); ?>"
                class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
                Now</a>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="overflow-hidden position-relative h-100">
            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
              <img loading="lazy" src="<?php echo e(asset('assets/images/home/slideshow-brake.png')); ?>" width="400" height="733"
                alt="Brake System Components" 
                class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
              <div class="character_markup">
                <p class="text-uppercase font-sofia fw-bold animate animate_fade animate_rtl animate_delay-10">
                  Brake System</p>
              </div>
            </div>
            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
              <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                Featured Products</h6>
              <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">High Performance</h2>
              <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Brake Systems</h2>
              <a href="<?php echo e(route('shop.category', ['slug' => 'brake-system'])); ?>"
                class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
                Now</a>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="overflow-hidden position-relative h-100">
            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
              <img loading="lazy" src="<?php echo e(asset('assets/images/home/slideshow-electrical.png')); ?>" width="400" height="690"
                alt="Electrical System Parts"
                class="slideshow-character__img animate animate_fade animate_rtl animate_delay-10 w-auto h-auto" />
            </div>
            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
              <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                Special Offers</h6>
              <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Quality</h2>
              <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">Electrical Parts</h2>
              <a href="<?php echo e(route('shop.category', ['slug' => 'electrical-system'])); ?>"
                class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
                Now</a>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5">
        </div>
      </div>
    </section>

    <div class="container mw-1620 bg-white border-radius-10">
      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

    <!-- Categories Grid -->
    <section class="category-carousel container">
      <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">Popular Categories</h2>

      <div class="position-relative">
        <div class="swiper-container js-swiper-slider" data-settings='{
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": 8,
            "slidesPerGroup": 1,
            "effect": "none",
            "loop": true,
            "navigation": {
              "nextEl": ".products-carousel__next-1",
              "prevEl": ".products-carousel__prev-1"
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 2,
                "slidesPerGroup": 2,
                "spaceBetween": 15
              },
              "768": {
                "slidesPerView": 4,
                "slidesPerGroup": 4,
                "spaceBetween": 30
              },
              "992": {
                "slidesPerView": 6,
                "slidesPerGroup": 1,
                "spaceBetween": 45,
                "pagination": false
              },
              "1200": {
                "slidesPerView": 8,
                "slidesPerGroup": 1,
                "spaceBetween": 60,
                "pagination": false
              }
            }
          }'>
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img loading="lazy" class="w-100 h-auto mb-3" src="<?php echo e(asset('assets/images/categories/engine.png')); ?>" width="124"
                height="124" alt="Engine Parts" />
              <div class="text-center">
                <a href="<?php echo e(route('shop.category', ['slug' => 'engine-parts'])); ?>" class="menu-link fw-medium">Engine<br />Parts</a>
              </div>
            </div>
            <div class="swiper-slide">
              <img loading="lazy" class="w-100 h-auto mb-3" src="<?php echo e(asset('assets/images/categories/transmission.png')); ?>" width="124"
                height="124" alt="Transmission" />
              <div class="text-center">
                <a href="<?php echo e(route('shop.category', ['slug' => 'transmission'])); ?>" class="menu-link fw-medium">Transmission<br />Parts</a>
              </div>
            </div>
            <div class="swiper-slide">
              <img loading="lazy" class="w-100 h-auto mb-3" src="<?php echo e(asset('assets/images/categories/brake.png')); ?>" width="124"
                height="124" alt="Brake System" />
              <div class="text-center">
                <a href="<?php echo e(route('shop.category', ['slug' => 'brake-system'])); ?>" class="menu-link fw-medium">Brake<br />System</a>
              </div>
            </div>
            <div class="swiper-slide">
              <img loading="lazy" class="w-100 h-auto mb-3" src="<?php echo e(asset('assets/images/categories/suspension.png')); ?>" width="124"
                height="124" alt="Suspension" />
              <div class="text-center">
                <a href="<?php echo e(route('shop.category', ['slug' => 'suspension'])); ?>" class="menu-link fw-medium">Suspension<br />Parts</a>
              </div>
            </div>
            <div class="swiper-slide">
              <img loading="lazy" class="w-100 h-auto mb-3" src="<?php echo e(asset('assets/images/categories/electrical.png')); ?>" width="124"
                height="124" alt="Electrical" />
              <div class="text-center">
                <a href="<?php echo e(route('shop.category', ['slug' => 'electrical-system'])); ?>" class="menu-link fw-medium">Electrical<br />System</a>
              </div>
            </div>
            <div class="swiper-slide">
              <img loading="lazy" class="w-100 h-auto mb-3" src="<?php echo e(asset('assets/images/categories/exhaust.png')); ?>" width="124"
                height="124" alt="Exhaust" />
              <div class="text-center">
                <a href="<?php echo e(route('shop.category', ['slug' => 'exhaust'])); ?>" class="menu-link fw-medium">Exhaust<br />System</a>
              </div>
            </div>
            <div class="swiper-slide">
              <img loading="lazy" class="w-100 h-auto mb-3" src="<?php echo e(asset('assets/images/categories/filters.png')); ?>" width="124"
                height="124" alt="Filters" />
              <div class="text-center">
                <a href="<?php echo e(route('shop.category', ['slug' => 'filters'])); ?>" class="menu-link fw-medium">Filters &<br />Fluids</a>
              </div>
            </div>
            <div class="swiper-slide">
              <img loading="lazy" class="w-100 h-auto mb-3" src="<?php echo e(asset('assets/images/categories/body.png')); ?>" width="124"
                height="124" alt="Body Parts" />
              <div class="text-center">
                <a href="<?php echo e(route('shop.category', ['slug' => 'body-parts'])); ?>" class="menu-link fw-medium">Body<br />Parts</a>
              </div>
            </div>
          </div>
        </div>

        <div class="products-carousel__prev products-carousel__prev-1 position-absolute top-50 d-flex align-items-center justify-content-center">
          <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_prev_md" />
          </svg>
        </div>
        <div class="products-carousel__next products-carousel__next-1 position-absolute top-50 d-flex align-items-center justify-content-center">
          <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_next_md" />
          </svg>
        </div>
      </div>
    </section>

    <!-- Featured Products -->
    <section class="featured-products container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Featured Auto Parts</h2>
            <a href="<?php echo e(route('shop.index')); ?>" class="btn btn-link">View All Parts</a>
        </div>
        
        <div class="swiper-container js-swiper-slider" data-settings='{
            "slidesPerView": 4,
            "spaceBetween": 30,
            "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
            },
            "breakpoints": {
                "320": { "slidesPerView": 1 },
                "576": { "slidesPerView": 2 },
                "992": { "slidesPerView": 3 },
                "1200": { "slidesPerView": 4 }
            }
        }'>
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                    <div class="product-card">
                        <div class="product-card-image position-relative">
                            <a href="<?php echo e(route('shop.product.details', ['slug' => $product->slug])); ?>">
                                <img src="<?php echo e(asset('uploads/products/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>" class="w-100">
                            </a>
                            <?php if($product->discount_percentage > 0): ?>
                            <div class="product-badge bg-danger text-white position-absolute top-0 end-0 m-3">
                                Save <?php echo e($product->discount_percentage); ?>%
                            </div>
                            <?php endif; ?>
                            <div class="product-actions position-absolute start-0 bottom-0 w-100 p-3">
                                <button class="btn btn-primary w-100 mb-2 add-to-cart" 
                                    data-product-id="<?php echo e($product->id); ?>"
                                    data-product-name="<?php echo e($product->name); ?>"
                                    data-product-price="<?php echo e($product->sale_price ?? $product->regular_price); ?>">
                                    Add to Cart
                                </button>
                                <button class="btn btn-outline-light w-100 add-to-wishlist" data-product-id="<?php echo e($product->id); ?>">
                                    <i class="far fa-heart"></i> Save for Later
                                </button>
                            </div>
                        </div>
                        <div class="product-card-content p-3">
                            <h3 class="product-title fs-5 mb-2">
                                <a href="<?php echo e(route('shop.product.details', ['slug' => $product->slug])); ?>" class="text-dark text-decoration-none">
                                    <?php echo e($product->name); ?>

                                </a>
                            </h3>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="product-price">
                                    <?php if($product->discount_percentage > 0): ?>
                                    <del class="text-muted me-2">$<?php echo e(number_format($product->regular_price, 2)); ?></del>
                                    <span class="text-danger">$<?php echo e(number_format($product->sale_price, 2)); ?></span>
                                    <?php else: ?>
                                    <span>$<?php echo e(number_format($product->regular_price, 2)); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="product-rating">
                                    <i class="fas fa-star text-warning"></i>
                                    <span><?php echo e(number_format($product->rating, 1)); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- Promotional Banners -->
    <section class="promo-banners container py-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="promo-banner position-relative">
                    <img src="<?php echo e(asset('assets/images/banners/performance-parts.jpg')); ?>" alt="Performance Parts" class="w-100">
                    <div class="promo-content position-absolute start-0 top-50 translate-middle-y p-4">
                        <h3 class="text-white mb-3">Performance Upgrades</h3>
                        <p class="text-white mb-3">Boost your vehicle's power and performance</p>
                        <a href="<?php echo e(route('shop.category', ['slug' => 'performance-parts'])); ?>" class="btn btn-light">Shop Performance</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="promo-banner position-relative">
                    <img src="<?php echo e(asset('assets/images/banners/maintenance-parts.jpg')); ?>" alt="Maintenance Parts" class="w-100">
                    <div class="promo-content position-absolute start-0 top-50 translate-middle-y p-4">
                        <h3 class="text-white mb-3">Maintenance Essentials</h3>
                        <p class="text-white mb-3">Keep your vehicle in top condition</p>
                        <a href="<?php echo e(route('shop.category', ['slug' => 'maintenance'])); ?>" class="btn btn-light">Shop Maintenance</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="services bg-light py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-5">
                    <div class="service-card text-center">
                        <i class="fas fa-store fa-3x mb-3 text-primary"></i>
                        <h4>Store Pickup</h4>
                        <p>Convenient local pickup available at our service centers</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="service-card text-center">
                        <i class="fas fa-shield-alt fa-3x mb-3 text-primary"></i>
                        <h4>Quality Guarantee</h4>
                        <p>All parts tested and verified for your vehicle</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hot-deals container">
        <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Special Offers</h2>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-20per d-flex align-items-center flex-column justify-content-center py-4 align-items-md-start">
                <h2>Summer Sale</h2>
                <h2 class="fw-bold">Up to 40% Off</h2>

                <div class="position-relative d-flex align-items-center text-center pt-xxl-4 js-countdown mb-3"
                    data-date="18-3-2024" data-time="06:50">
                    <div class="day countdown-unit">
                        <span class="countdown-num d-block"></span>
                        <span class="countdown-word text-uppercase text-secondary">Days</span>
                    </div>

                    <div class="hour countdown-unit">
                        <span class="countdown-num d-block"></span>
                        <span class="countdown-word text-uppercase text-secondary">Hours</span>
                    </div>

                    <div class="min countdown-unit">
                        <span class="countdown-num d-block"></span>
                        <span class="countdown-word text-uppercase text-secondary">Mins</span>
                    </div>

                    <div class="sec countdown-unit">
                        <span class="countdown-num d-block"></span>
                        <span class="countdown-word text-uppercase text-secondary">Sec</span>
                    </div>
                </div>

                <a href="<?php echo e(route('shop.category', ['slug' => 'special-offers'])); ?>" class="btn-link default-underline text-uppercase fw-medium mt-3">View All Offers</a>
            </div>
            <div class="col-md-6 col-lg-8 col-xl-80per">
                <div class="position-relative">
                    <div class="swiper-container js-swiper-slider" data-settings='{
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": 4,
                        "slidesPerGroup": 4,
                        "effect": "none",
                        "loop": false,
                        "breakpoints": {
                            "320": {
                                "slidesPerView": 2,
                                "slidesPerGroup": 2,
                                "spaceBetween": 14
                            },
                            "768": {
                                "slidesPerView": 2,
                                "slidesPerGroup": 3,
                                "spaceBetween": 24
                            },
                            "992": {
                                "slidesPerView": 3,
                                "slidesPerGroup": 1,
                                "spaceBetween": 30,
                                "pagination": false
                            },
                            "1200": {
                                "slidesPerView": 4,
                                "slidesPerGroup": 1,
                                "spaceBetween": 30,
                                "pagination": false
                            }
                        }
                    }'>
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $popularProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide product-card product-card_style3">
                                <div class="pc__img-wrapper">
                                    <a href="<?php echo e(route('shop.product.details', ['slug' => $product->slug])); ?>">
                                        <img loading="lazy" src="<?php echo e(asset('uploads/products/'.$product->image)); ?>" width="330" height="400"
                                            alt="<?php echo e($product->name); ?>" class="pc__img">
                                    </a>
                                    <?php if($product->discount_percentage > 0): ?>
                                    <div class="product-label bg-red text-white right-0 top-0 left-auto mt-2 mx-2">-<?php echo e($product->discount_percentage); ?>%</div>
                                    <?php endif; ?>
                                </div>

                                <div class="pc__info position-relative">
                                    <h6 class="pc__title"><a href="<?php echo e(route('shop.product.details', ['slug' => $product->slug])); ?>"><?php echo e($product->name); ?></a></h6>
                                    <div class="product-card__price d-flex align-items-center">
                                        <?php if($product->discount_percentage > 0): ?>
                                        <span class="money price-old">$<?php echo e(number_format($product->regular_price, 2)); ?></span>
                                        <span class="money price text-secondary">$<?php echo e(number_format($product->sale_price, 2)); ?></span>
                                        <?php else: ?>
                                        <span class="money price text-secondary">$<?php echo e(number_format($product->regular_price, 2)); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                                        <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart"
                                            data-product-id="<?php echo e($product->id); ?>" title="Add To Cart">Add To Cart</button>
                                        <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-quick-view"
                                            data-bs-toggle="modal" data-bs-target="#quickView" data-product-id="<?php echo e($product->id); ?>" title="Quick view">
                                            <span class="d-none d-xxl-block">Quick View</span>
                                            <span class="d-block d-xxl-none">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <use href="#icon_view" />
                                                </svg>
                                            </span>
                                        </button>
                                        <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist" 
                                            data-product-id="<?php echo e($product->id); ?>" title="Add To Wishlist">
                                            <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_heart" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="category-banner container">
      <div class="row">
        <div class="col-md-6">
          <div class="category-banner__item border-radius-10 mb-5">
            <img loading="lazy" class="h-auto" src="<?php echo e(asset('assets/images/banners/performance-parts.jpg')); ?>" width="690" height="665"
              alt="Performance Parts" />
            <div class="category-banner__item-mark">
              Starting at $99
            </div>
            <div class="category-banner__item-content">
              <h3 class="mb-0">Performance Parts</h3>
              <a href="<?php echo e(route('shop.category', ['slug' => 'performance-parts'])); ?>" class="btn-link default-underline text-uppercase fw-medium">Shop Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="category-banner__item border-radius-10 mb-5">
            <img loading="lazy" class="h-auto" src="<?php echo e(asset('assets/images/banners/maintenance.jpg')); ?>" width="690" height="665"
              alt="Maintenance Parts" />
            <div class="category-banner__item-mark">
              Starting at $29
            </div>
            <div class="category-banner__item-content">
              <h3 class="mb-0">Maintenance Parts</h3>
              <a href="<?php echo e(route('shop.category', ['slug' => 'maintenance'])); ?>" class="btn-link default-underline text-uppercase fw-medium">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

</main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
.slideshow {
    height: 600px;
}

.slideshow-bg::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
}

.category-card {
    overflow: hidden;
    border-radius: 8px;
    height: 400px;
}

.category-card img {
    transition: transform 0.3s;
    height: 100%;
    object-fit: cover;
}

.category-card:hover img {
    transform: scale(1.1);
}

.category-card-content {
    background: linear-gradient(to top, rgba(0,0,0,0.9), rgba(0,0,0,0.4), transparent);
    width: 100%;
}

.product-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: box-shadow 0.3s;
}

.product-card:hover {
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.product-card-image {
    overflow: hidden;
    padding-top: 100%;
    position: relative;
}

.product-card-image img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.product-card:hover .product-card-image img {
    transform: scale(1.1);
}

.product-actions {
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    opacity: 0;
    transition: opacity 0.3s;
}

.product-card:hover .product-actions {
    opacity: 1;
}

.promo-banner {
    overflow: hidden;
    border-radius: 8px;
    height: 300px;
}

.promo-banner img {
    transition: transform 0.3s;
    height: 100%;
    object-fit: cover;
}

.promo-banner:hover img {
    transform: scale(1.1);
}

.promo-content {
    z-index: 1;
}

.promo-banner::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, rgba(0,0,0,0.8), transparent);
}

.service-card {
    padding: 2rem;
    background: white;
    border-radius: 8px;
    transition: transform 0.3s;
    height: 100%;
}

.service-card:hover {
    transform: translateY(-10px);
}

.section-title {
    position: relative;
    padding-bottom: 15px;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: var(--bs-primary);
}

.text-center .section-title::after {
    left: 50%;
    transform: translateX(-50%);
}

.product-rating {
    font-size: 0.9rem;
}

.swiper-button-next,
.swiper-button-prev {
    background: rgba(255, 255, 255, 0.9);
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.swiper-button-next::after,
.swiper-button-prev::after {
    font-size: 1.2rem;
    color: var(--bs-primary);
}

.category-card {
    @apply bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition duration-300;
}

.main-category-card {
    @apply transform hover:scale-105 transition duration-300 cursor-pointer shadow-xl;
}

.main-category-card img {
    @apply transition duration-400;
}

.main-category-card:hover img {
    @apply scale-110;
}

.slideshow-character {
    z-index: 2;
}

.character_markup {
    position: absolute;
    bottom: 20%;
    right: 10%;
    background: rgba(255, 255, 255, 0.9);
    padding: 10px 20px;
    border-radius: 5px;
}

.character_markup.type2 {
    bottom: 30%;
    right: 15%;
}

.mark-grey-color {
    color: #666;
}

.text_dash {
    position: relative;
    padding-left: 65px;
}

.text_dash::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    width: 50px;
    height: 2px;
    background: currentColor;
    transform: translateY(-50%);
}

.btn-link_lg {
    font-size: 1.125rem;
}

.default-underline {
    position: relative;
    display: inline-block;
}

.default-underline::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 100%;
    height: 2px;
    background: currentColor;
    transform: scaleX(0);
    transform-origin: right;
    transition: transform 0.3s ease;
}

.default-underline:hover::after {
    transform: scaleX(1);
    transform-origin: left;
}

.countdown-unit {
    text-align: center;
    margin: 0 15px;
}

.countdown-num {
    font-size: 2rem;
    font-weight: bold;
    color: var(--bs-primary);
}

.countdown-word {
    font-size: 0.875rem;
}

.category-banner__item {
    position: relative;
    overflow: hidden;
}

.category-banner__item img {
    transition: transform 0.6s ease;
}

.category-banner__item:hover img {
    transform: scale(1.1);
}

.category-banner__item-mark {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(255, 255, 255, 0.9);
    padding: 5px 15px;
    border-radius: 20px;
    font-weight: 500;
}

.category-banner__item-content {
    position: absolute;
    bottom: 30px;
    left: 30px;
    color: white;
}

.anim_appear-bottom {
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.product-card:hover .anim_appear-bottom {
    transform: translateY(0);
}

.animate {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease;
}

.animate_fade {
    opacity: 1;
}

.animate_btt {
    transform: translateY(0);
}

.animate_rtl {
    transform: translateX(0);
}

.animate_delay-3 {
    transition-delay: 0.3s;
}

.animate_delay-5 {
    transition-delay: 0.5s;
}

.animate_delay-7 {
    transition-delay: 0.7s;
}

.animate_delay-9 {
    transition-delay: 0.9s;
}

.animate_delay-10 {
    transition-delay: 1s;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/js/shop.js'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add to Cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const productName = this.dataset.productName;
            const productPrice = this.dataset.productPrice;

            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: 1
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart count
                    const cartCount = document.querySelector('.cart-count');
                    if (cartCount) {
                        cartCount.textContent = data.cartCount;
                    }
                    
                    // Show success message
                    Swal.fire({
                        title: 'Added to Cart!',
                        text: `${productName} has been added to your cart`,
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                } else {
                    throw new Error(data.message || 'Failed to add item to cart');
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'Error!',
                    text: error.message,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        });
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Auto-Parts-Hub-main\resources\views/index.blade.php ENDPATH**/ ?>