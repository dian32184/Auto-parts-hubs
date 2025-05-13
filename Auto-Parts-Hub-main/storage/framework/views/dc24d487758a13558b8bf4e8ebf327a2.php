<?php $__env->startSection('content'); ?>
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Stock Out</h3>
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
                    <div class="text-tiny">Stock Out</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <form class="form-style-1" action="<?php echo e(route('admin.inventory.stock-out')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <fieldset class="name">
                    <div class="body-title">Product <span class="tf-color-1">*</span></div>
                    <div class="select-wrapper">
                        <select class="form-select flex-grow" id="product_id" name="product_id" required>
                            <option value="">Select Product</option>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>">
                                    <?php echo e($product->name); ?> (Current: <?php echo e($product->inventory->quantity ?? 0); ?>)
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <i class="icon-chevron-down select-arrow"></i>
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
                    <div class="body-title">Quantity to Remove <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="number" id="quantity" name="quantity" 
                           placeholder="Enter quantity" min="1" required>
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
                    <div class="body-title">Note (Optional)</div>
                    <textarea class="flex-grow ht-150" id="note" name="note" 
                              placeholder="Enter reason for stock out"></textarea>
                </fieldset>
                <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="bot">
                    <div></div>
                    <button class="tf-button style-3 w208" type="submit">
                        <i class="icon-arrow-up"></i> Remove Stock
                    </button>
                    <a href="<?php echo e(route('admin.inventory.index')); ?>" class="tf-button style-2 w208">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .select-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }
    .form-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        padding-right: 30px;
        width: 100%;
    }
    .select-arrow {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
    }
    .ht-150 {
        height: 150px;
    }
    .tf-button.style-3 {
        background-color: #f44336;
        color: white;
    }
    .tf-button.style-3:hover {
        background-color: #d32f2f;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        // Validate quantity doesn't exceed available stock
        $('form').submit(function(e) {
            const productId = $('#product_id').val();
            const quantity = parseInt($('#quantity').val());
            const currentStock = parseInt($('#product_id option:selected').text().match(/Current: (\d+)/)[1]);
            
            if (quantity > currentStock) {
                e.preventDefault();
                alert('Cannot remove more stock than available! Current stock: ' + currentStock);
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Auto-Parts-Hub-main\resources\views\admin\inventory\stock-out.blade.php ENDPATH**/ ?>