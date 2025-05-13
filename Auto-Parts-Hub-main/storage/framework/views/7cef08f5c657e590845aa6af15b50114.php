

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Orders Management</h4>
                </div>
                <div class="card-body">
                    <!-- Order Statistics -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Orders</h5>
                                    <h3><?php echo e($totalOrders); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Completed Orders</h5>
                                    <h3><?php echo e($completedOrders); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Pending</h5>
                                    <h3><?php echo e($pendingOrders); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Processing</h5>
                                    <h3><?php echo e($processingOrders); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Cancelled</h5>
                                    <h3><?php echo e($cancelledOrders); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Table -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>#<?php echo e($order->id); ?></td>
                                    <td><?php echo e($order->user->name); ?></td>
                                    <td><?php echo e($order->items->count()); ?></td>
                                    <td>$<?php echo e(number_format($order->total, 2)); ?></td>
                                    <td>
                                        <span class="badge bg-info">
                                            <?php echo e(ucfirst($order->payment_method)); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <?php if($order->transaction): ?>
                                            <span class="badge bg-success">
                                                <?php echo e(ucfirst($order->transaction->payment_status)); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-warning">
                                                Pending
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-<?php echo e($order->status == 'completed' ? 'success' : ($order->status == 'cancelled' ? 'danger' : ($order->status == 'processing' ? 'info' : 'warning'))); ?>">
                                            <?php echo e(ucfirst($order->status)); ?>

                                        </span>
                                    </td>
                                    <td><?php echo e($order->created_at->format('M d, Y h:i A')); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" 
                                               class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <button type="button" 
                                                    class="btn btn-sm btn-primary dropdown-toggle" 
                                                    data-bs-toggle="dropdown">
                                                Status
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <form action="<?php echo e(route('admin.orders.update-status', $order->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <input type="hidden" name="status" value="pending">
                                                        <button type="submit" class="dropdown-item">Pending</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="<?php echo e(route('admin.orders.update-status', $order->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <input type="hidden" name="status" value="processing">
                                                        <button type="submit" class="dropdown-item">Processing</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="<?php echo e(route('admin.orders.update-status', $order->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <input type="hidden" name="status" value="ready">
                                                        <button type="submit" class="dropdown-item">Ready</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="<?php echo e(route('admin.orders.update-status', $order->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <input type="hidden" name="status" value="completed">
                                                        <button type="submit" class="dropdown-item">Completed</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="<?php echo e(route('admin.orders.update-status', $order->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <input type="hidden" name="status" value="cancelled">
                                                        <button type="submit" class="dropdown-item text-danger">Cancelled</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="9" class="text-center">No orders found.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-center mt-4">
                        <?php echo e($orders->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Add any JavaScript for order management here
</script>
<?php $__env->stopPush(); ?> 
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Auto-Parts-Hub-main\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>