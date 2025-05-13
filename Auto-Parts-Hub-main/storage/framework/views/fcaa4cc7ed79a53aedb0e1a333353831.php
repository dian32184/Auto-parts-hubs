<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="flex mb-8 text-gray-600" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="<?php echo e(route('shop.index')); ?>" class="hover:text-blue-600">Shop</a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="<?php echo e(route('shop.category', $mainCategory->slug)); ?>" class="ml-1 hover:text-blue-600"><?php echo e($mainCategory->name); ?></a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ml-1"><?php echo e($subcategory->name); ?></span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Subcategory Header -->
    <div class="mb-12">
        <h1 class="text-4xl font-bold mb-4"><?php echo e($subcategory->name); ?></h1>
        <p class="text-gray-600"><?php echo e($subcategory->description); ?></p>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="relative h-64">
                <img src="<?php echo e(asset($product->image_path)); ?>" alt="<?php echo e($product->name); ?>" 
                     class="w-full h-full object-cover">
                <?php if($product->stock_status === 'instock'): ?>
                    <span class="absolute top-2 right-2 bg-green-500 text-white px-2 py-1 rounded-full text-sm">In Stock</span>
                <?php else: ?>
                    <span class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-full text-sm">Out of Stock</span>
                <?php endif; ?>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-semibold mb-2"><?php echo e($product->name); ?></h3>
                <p class="text-gray-600 mb-4 line-clamp-2"><?php echo e($product->short_description); ?></p>
                <div class="flex items-center justify-between mb-4">
                    <span class="text-2xl font-bold text-blue-600">$<?php echo e(number_format($product->regular_price, 2)); ?></span>
                    <span class="text-sm text-gray-500">SKU: <?php echo e($product->SKU); ?></span>
                </div>
                
                <?php if($product->stock_status === 'instock'): ?>
                <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="add-to-cart-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                    <div class="flex items-center gap-4">
                        <div class="flex-1">
                            <input type="number" name="quantity" value="1" min="1" max="<?php echo e($product->quantity); ?>"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                        <button type="submit" 
                                class="flex-1 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                            </svg>
                            Add to Cart
                        </button>
                    </div>
                </form>
                <?php else: ?>
                <button disabled class="w-full bg-gray-300 text-gray-500 px-6 py-2 rounded-lg cursor-not-allowed">
                    Out of Stock
                </button>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Pagination -->
    <div class="mt-12">
        <?php echo e($products->links()); ?>

    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const addToCartForms = document.querySelectorAll('.add-to-cart-form');
    
    addToCartForms.forEach(form => {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        product_id: form.querySelector('[name="product_id"]').value,
                        quantity: form.querySelector('[name="quantity"]').value
                    })
                });

                const data = await response.json();
                
                if (response.ok) {
                    // Show success message
                    alert('Product added to cart successfully!');
                    // Update cart count if you have one in the navbar
                    if (data.cartCount) {
                        document.querySelector('.cart-count').textContent = data.cartCount;
                    }
                } else {
                    throw new Error(data.message || 'Error adding product to cart');
                }
            } catch (error) {
                alert(error.message);
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>

<style>
.product-card {
    @apply transform hover:shadow-2xl transition duration-300;
}

.product-card img {
    @apply transform hover:scale-105 transition duration-300;
}
</style>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Auto-Parts-Hub-main\resources\views/shop/subcategory.blade.php ENDPATH**/ ?>