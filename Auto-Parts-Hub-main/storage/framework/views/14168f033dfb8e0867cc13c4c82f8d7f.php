<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Inventory Details</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($inventory->product->name); ?></h5>
            <p class="card-text"> 
                <strong>SKU:</strong> <?php echo e($inventory->sku); ?><br>
                <strong>Quantity:</strong> <?php echo e($inventory->quantity); ?><br>
                <strong>Location:</strong> <?php echo e($inventory->location); ?>

            </p>
            <a href="<?php echo e(route('admin.inventory.edit', $inventory->id)); ?>" class="btn btn-primary">Edit</a>
        </div>
    </div>
    
    <h3>Transactions</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Reference</th>
                <th>Note</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($transaction->created_at->format('Y-m-d H:i')); ?></td>
                <td>
                    <?php if($transaction->type == 'stock_in'): ?>
                        <span class="badge bg-success">Stock In</span>
                    <?php else: ?>
                        <span class="badge bg-danger">Stock Out</span>
                    <?php endif; ?>
                </td>
                <td><?php echo e($transaction->quantity); ?></td>
                <td><?php echo e($transaction->reference); ?></td>
                <td><?php echo e($transaction->note); ?></td>
                <td><?php echo e($transaction->user->name); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    
    <?php echo e($transactions->links()); ?>

    
    <a href="<?php echo e(route('admin.inventory.index')); ?>" class="btn btn-secondary">Back to Inventory</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Auto-Parts-Hub-main\resources\views\admin\inventory\show.blade.php ENDPATH**/ ?>