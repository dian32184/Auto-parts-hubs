<?php $__env->startSection('content'); ?>
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Inventory Management</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="<?php echo e(route('admin.index')); ?>">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Inventory</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Search inventory..." class="" name="search"
                                tabindex="2" value="<?php echo e(request('search')); ?>" aria-required="true">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="flex gap10">
                    <a class="tf-button style-1 w208" href="<?php echo e(route('admin.inventory.create')); ?>">
                        <i class="icon-plus"></i>Add New
                    </a>
                    <a class="tf-button style-2 w208" href="<?php echo e(route('admin.inventory.stock-in.form')); ?>">
                        <i class="icon-arrow-down"></i>Stock In
                    </a>
                    <a class="tf-button style-3 w208" href="<?php echo e(route('admin.inventory.stock-out.form')); ?>">
                        <i class="icon-arrow-up"></i>Stock Out
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <?php if(Session::has('status')): ?>
                    <p class="alert alert-success"><?php echo e(Session::get('status')); ?></p>
                <?php endif; ?>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>SKU</th>
                            <th>Quantity</th>
                            <th>Location</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>
                            <td class="pname">
                                <?php if($item->product->image): ?>
                                <div class="image">
                                    <img src="<?php echo e(asset('uploads/products/thumbnails')); ?>/<?php echo e($item->product->image); ?>" alt="<?php echo e($item->product->name); ?>" class="image">
                                </div>
                                <?php endif; ?>
                                <div class="name">
                                    <a href="<?php echo e(route('admin.inventory.show', $item->id)); ?>" class="body-title-2"><?php echo e($item->product->name); ?></a>
                                    <div class="text-tiny mt-3"><?php echo e($item->product->sku); ?></div>
                                </div>
                            </td>
                            <td><?php echo e($item->sku); ?></td>
                            <td>
                                <span class="badge <?php echo e($item->quantity > 10 ? 'bg-success' : 'bg-warning'); ?>">
                                    <?php echo e($item->quantity); ?>

                                </span>
                            </td>
                            <td><?php echo e($item->location); ?></td>
                            <td>
                                <div class="list-icon-function">
                                    <a href="<?php echo e(route('admin.inventory.show', $item->id)); ?>">
                                        <div class="item eye">
                                            <i class="icon-eye"></i>
                                        </div>
                                    </a>
                                    <a href="<?php echo e(route('admin.inventory.edit', $item->id)); ?>">
                                        <div class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </div>
                                    </a>
                                    <form action="<?php echo e(route('admin.inventory.destroy', $item->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <div class="item text-danger delete">
                                            <i class="icon-trash-2"></i>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                <?php echo e($inventory->links('pagination::bootstrap-5')); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(function(){
            $(".delete").on('click',function(e){
                e.preventDefault();
                var selectedForm = $(this).closest('form');
                swal({
                    title: "Are you sure?",
                    text: "You want to delete this inventory item?",
                    type: "warning",
                    buttons: ["No!", "Yes!"],
                    confirmButtonColor: '#dc3545'
                }).then(function (result) {
                    if (result) {
                        selectedForm.submit();  
                    }
                });                             
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Auto-Parts-Hub-main\resources\views\admin\inventory\index.blade.php ENDPATH**/ ?>