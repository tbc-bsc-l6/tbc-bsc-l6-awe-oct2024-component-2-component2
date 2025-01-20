<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-primary">Order Management</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <!-- Optional additional actions can go here -->
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Orders List</h5>
                        <div class="input-group" style="width: 300px;">
                            <input type="text" name="table_search" class="form-control" placeholder="Search Orders...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-light">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped table-bordered text-center align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th>Order #</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Total</th>
                                <th>Date Purchased</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e(route('admin.viewOrder', ['id' => $order->id])); ?>" class="text-primary">
                                            <?php echo e($order->tracking_no); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e($order->fname); ?></td>
                                    <td><?php echo e($order->email); ?></td>
                                    <td><?php echo e($order->phone); ?></td>
                                    <td>
                                        <?php if($order->status == 0): ?>
                                            <span class="badge badge-warning">Processing</span>
                                        <?php elseif($order->status == 1): ?>
                                            <span class="badge badge-success">Delivered</span>
                                        <?php elseif($order->status == 2): ?>
                                            <span class="badge badge-danger">Cancelled</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($order->payment == 'cash_on_delivery'): ?>
                                            <span class="badge badge-info">Cash on Delivery</span>
                                        <?php elseif($order->payment == 'paypal'): ?>
                                            <span class="badge badge-primary">PayPal</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>Rs. <?php echo e($order->totalPrice); ?></td>
                                    <td><?php echo e(date('Y-m-d', strtotime($order->created_at))); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('admin.updateStatus', ['order' => $order->id])); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <div class="d-flex align-items-center">
                                                <select name="status" class="form-control form-control-sm me-2">
                                                    <option value="0" <?php echo e($order->status == 0 ? 'selected' : ''); ?>>Processing</option>
                                                    <option value="1" <?php echo e($order->status == 1 ? 'selected' : ''); ?>>Delivered</option>
                                                    <option value="2" <?php echo e($order->status == 2 ? 'selected' : ''); ?>>Cancelled</option>
                                                </select>
                                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <?php echo e($orders->links()); ?>

                </div>
            </div>
        </div>
    </section>

    <?php if(session('alert-type') == 'success'): ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <?php echo e(session('message')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProject\laravel_1st\resources\views/admin/orders/orders.blade.php ENDPATH**/ ?>