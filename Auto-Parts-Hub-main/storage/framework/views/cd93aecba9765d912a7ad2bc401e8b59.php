<?php $__env->startSection('content'); ?>
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Inventory Information</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="<?php echo e(route('admin.index')); ?>"><div class="text-tiny">Dashboard</div></a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.inventory.index')); ?>"><div class="text-tiny">Inventory</div></a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">New Inventory</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <form class="form-new-product form-style-1" action="<?php echo e(route('admin.inventory.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <fieldset class="name">
                    <div class="body-title">Product <span class="tf-color-1">*</span></div>
                    <div class="select">
                        <select class="flex-grow" name="product_id" tabindex="0" aria-required="true" required>
                            <option value="">Select Product</option>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>" <?php echo e(old('product_id') == $product->id ? 'selected' : ''); ?>>
                                    <?php echo e($product->name); ?> (<?php echo e($product->sku); ?>)
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </fieldset>
                <?php $__errorArgs = ['product_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <fieldset class="name">
                    <div class="body-title">Initial Quantity <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="number" placeholder="Enter initial quantity" 
                           name="quantity" tabindex="0" value="<?php echo e(old('quantity', 0)); ?>" 
                           min="0" aria-required="true" required>
                </fieldset>
                <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <fieldset class="name">
                    <div class="body-title">SKU</div>
                    <input class="flex-grow" type="text" placeholder="Enter SKU (optional)" 
                           name="sku" tabindex="0" value="<?php echo e(old('sku')); ?>">
                </fieldset>
                <?php $__errorArgs = ['sku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <fieldset class="name">
                    <div class="body-title">Location</div>
                    <input class="flex-grow" type="text" placeholder="Enter location (optional)" 
                           name="location" tabindex="0" value="<?php echo e(old('location')); ?>">
                </fieldset>
                <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(function(){
        // Auto-generate SKU when product is selected
        $('select[name="product_id"]').change(function() {
            const productId = $(this).val();
            if (productId && !$('input[name="sku"]').val()) {
                const product = <?php echo json_encode($products->keyBy('id'), 15, 512) ?>;
                $('input[name="sku"]').val(product[productId].sku + '-INV');
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Auto-Parts-Hub-main\resources\views\admin\inventory\create.blade.php ENDPATH**/ ?>