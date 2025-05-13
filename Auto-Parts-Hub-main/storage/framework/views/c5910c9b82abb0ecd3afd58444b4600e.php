

<?php $__env->startSection('content'); ?>
<!-- Hero Slider -->
<section class="hero-slider">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button type="button" 
                        data-bs-target="#heroCarousel" 
                        data-bs-slide-to="<?php echo e($key); ?>" 
                        class="<?php echo e($key === 0 ? 'active' : ''); ?>"
                        aria-current="<?php echo e($key === 0 ? 'true' : 'false'); ?>"
                        aria-label="Slide <?php echo e($key + 1); ?>">
                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="carousel-inner">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e($key === 0 ? 'active' : ''); ?>">
                    <img src="<?php echo e(asset('storage/' . $slider->image)); ?>" 
                         class="d-block w-100" 
                         alt="<?php echo e($slider->title); ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4 fw-bold"><?php echo e($slider->title); ?></h2>
                        <?php if($slider->subtitle): ?>
                            <p class="lead"><?php echo e($slider->subtitle); ?></p>
                        <?php endif; ?>
                        <?php if($slider->link && $slider->button_text): ?>
                            <a href="<?php echo e($slider->link); ?>" class="btn btn-primary btn-lg">
                                <?php echo e($slider->button_text); ?>

                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($sliders->count() > 1): ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        <?php endif; ?>
    </div>
</section>

<!-- Featured Products Section -->
<section class="featured-products py-5">
    <div class="container">
        <h2 class="section-title text-center mb-4">Featured Products</h2>
        <div class="row">
            <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <?php if($product->image): ?>
                            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" 
                                 class="card-img-top" 
                                 alt="<?php echo e($product->name); ?>"
                                 style="height: 200px; object-fit: cover;">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($product->name); ?></h5>
                            <p class="card-text text-muted"><?php echo e(Str::limit($product->description, 100)); ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0">$<?php echo e(number_format($product->price, 2)); ?></span>
                                <a href="<?php echo e(route('shop.product.details', $product->slug)); ?>" 
                                   class="btn btn-primary">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Auto-Parts-Hub-main\resources\views/home/index.blade.php ENDPATH**/ ?>