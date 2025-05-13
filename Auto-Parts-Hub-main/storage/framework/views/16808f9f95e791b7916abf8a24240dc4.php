<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Inventory Item</h1>
    
    <form action="<?php echo e(route('admin.inventory.update', $inventory->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        
        <div class="mb-3">
            <label class="form-label">Product</label>
            <input type="text" class="form-control" value="<?php echo e($inventory->product->name); ?>" readonly>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Current Quantity</label>
            <input type="text" class="form-control" value="<?php echo e($inventory->quantity); ?>" readonly>
        </div>
        
        <div class="mb-3">
            <label for="sku" class="form-label">SKU</label>
            <input type="text" class="form-control" id="sku" name="sku" value="<?php echo e($inventory->sku); ?>">
        </div>
        
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="<?php echo e($inventory->location); ?>">
        </div>
        
        <button type="submit" class="btn btn-primary">Update Inventory</button>
        <a href="<?php echo e(route('admin.inventory.index')); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Auto-Parts-Hub-main\resources\views\admin\inventory\edit.blade.php ENDPATH**/ ?>