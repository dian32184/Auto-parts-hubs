
<?php $__env->startSection("content"); ?>
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="tf-section-2 mb-30">
            <div class="flex gap20 flex-wrap-mobile">
                <div class="w-half">
                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Total Orders</div>
                                    <h4><?php echo e($totalOrders); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Total Amount</div>
                                    <h4>₱<?php echo e(number_format($totalRevenue, 2)); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Pending Orders</div>
                                    <h4><?php echo e($pendingOrders); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Pending Orders Amount</div>
                                    <h4>₱<?php echo e(number_format($pendingOrdersAmount ?? 0, 2)); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-half">
                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Delivered Orders</div>
                                    <h4><?php echo e($completedOrders); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Delivered Orders Amount</div>
                                    <h4>₱<?php echo e(number_format($completedOrdersAmount ?? 0, 2)); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Canceled Orders</div>
                                    <h4><?php echo e($cancelledOrders ?? 0); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Canceled Orders Amount</div>
                                    <h4>₱<?php echo e(number_format($cancelledOrdersAmount ?? 0, 2)); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Earnings revenue</h5>
                    <div class="dropdown default">
                        <button class="btn btn-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="javascript:void(0);">This Week</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Last Week</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-wrap gap40">
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t1"></div>
                                <div class="text-tiny">Revenue</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>₱<?php echo e(number_format($monthlyRevenue, 2)); ?></h4>
                            <div class="box-icon-trending up">
                                <i class="icon-trending-up"></i>
                                <div class="body-title number"><?php echo e(number_format($revenueGrowth ?? 0.56, 2)); ?>%</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t2"></div>
                                <div class="text-tiny">Order</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4><?php echo e($totalOrders); ?></h4>
                            <div class="box-icon-trending up">
                                <i class="icon-trending-up"></i>
                                <div class="body-title number"><?php echo e(number_format($orderGrowth ?? 0.56, 2)); ?>%</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="line-chart-8"></div>
            </div>
        </div>

        <div class="tf-section mb-30">
            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Recent orders</h5>
                    <div class="dropdown default">
                        <a class="btn btn-secondary dropdown-toggle" href="<?php echo e(route('admin.orders.index')); ?>">
                            <span class="view-all">View all</span>
                        </a>
                    </div>
                </div>
                <div class="wg-table table-all-user">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 80px">OrderNo</th>
                                    <th>Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Subtotal</th>
                                    <th class="text-center">Tax</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Order Date</th>
                                    <th class="text-center">Total Items</th>
                                    <th class="text-center">Delivered On</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($order->id); ?></td>
                                    <td class="text-center"><?php echo e($order->user->name); ?></td>
                                    <td class="text-center"><?php echo e($order->user->mobile); ?></td>
                                    <td class="text-center">₱<?php echo e(number_format($order->subtotal, 2)); ?></td>
                                    <td class="text-center">₱<?php echo e(number_format($order->tax, 2)); ?></td>
                                    <td class="text-center">₱<?php echo e(number_format($order->total, 2)); ?></td>
                                    <td class="text-center"><?php echo e($order->status); ?></td>
                                    <td class="text-center"><?php echo e($order->created_at->format('Y-m-d H:i:s')); ?></td>
                                    <td class="text-center"><?php echo e($order->items->count()); ?></td>
                                    <td class="text-center"><?php echo e($order->delivered_at ? $order->delivered_at->format('Y-m-d H:i:s') : ''); ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>">
                                            <div class="list-icon-function view-icon">
                                                <div class="item eye">
                                                    <i class="icon-eye"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
<script>
    // Revenue Chart
    var options = {
        series: [{
            name: "Revenue",
            data: <?php echo json_encode($monthlyRevenueChart->pluck('revenue')); ?>

        }],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'],
                opacity: 0.5
            },
        },
        xaxis: {
            categories: <?php echo json_encode($monthlyRevenueChart->map(function($item) { return date('M Y', mktime(0, 0, 0, $item->month, 1, $item->year)); })); ?>

        }
    };

    var chart = new ApexCharts(document.querySelector("#line-chart-8"), options);
    chart.render();
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make("layouts.admin", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Auto-Parts-Hub-main\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>