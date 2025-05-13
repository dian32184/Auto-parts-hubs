

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="relative h-[400px] overflow-hidden">
        <img src="<?php echo e(asset($category->image_path ?? 'images/categories/default-category.jpg')); ?>" 
             alt="<?php echo e($category->name); ?>" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 to-black/40">
            <div class="container mx-auto px-4 h-full flex items-center">
                <div class="max-w-2xl">
                    <!-- Breadcrumb -->
                    <nav class="flex mb-6 text-gray-300" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="<?php echo e(route('shop.index')); ?>" class="hover:text-white transition">Shop</a>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="ml-1 text-white font-medium"><?php echo e($category->name); ?></span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="text-5xl font-bold text-white mb-4"><?php echo e($category->name); ?></h1>
                    <?php if($category->description): ?>
                        <p class="text-xl text-gray-200"><?php echo e($category->description); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-12">
        <!-- Section Title -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Browse <?php echo e($category->name); ?> Categories</h2>
            <p class="mt-4 text-gray-600">Select from our wide range of high-quality parts and components</p>
        </div>

        <!-- Subcategories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('shop.category', ['slug' => $subcategory->slug])); ?>" 
               class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">
                <div class="relative h-56">
                    <img src="<?php echo e(asset($subcategory->image_path ?? 'images/categories/default-subcategory.jpg')); ?>" 
                         alt="<?php echo e($subcategory->name); ?>" 
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent">
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-2xl font-bold text-white mb-2"><?php echo e($subcategory->name); ?></h3>
                            <?php if($subcategory->products_count): ?>
                                <span class="inline-flex items-center text-white/90 text-sm">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/>
                                    </svg>
                                    <?php echo e($subcategory->products_count); ?> Products Available
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4 line-clamp-2"><?php echo e($subcategory->description); ?></p>
                    <div class="flex items-center text-blue-600 group-hover:text-blue-700 transition">
                        <span class="font-semibold">View Collection</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<style>
/* Custom hover effects */
.group:hover .group-hover\:scale-105 {
    transform: scale(1.05);
}

.group:hover .group-hover\:translate-x-1 {
    transform: translateX(0.25rem);
}

/* Smooth transitions */
.transition {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 300ms;
}

/* Text truncation */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Auto-Parts-Hub-main\resources\views/shop/category.blade.php ENDPATH**/ ?>