<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <div class="card shadow-lg border-0">
            <div class="card-header d-flex justify-content-between align-items-center bg-light">
                <div>
                    <?php
                        $cartCount = App\Helpers\CartHelper::CartCount();
                    ?>
                    <h3 class="text-dark mb-0">Shopping Cart</h3>
                </div>
                <div>
                    <p class="text-muted mb-0"><?php echo e($cartCount); ?> items</p>
                </div>
            </div>

            <?php
                $totalPrice = 0;
            ?>

            <div class="card-body">
                <?php if(count($cartData) > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center" style="min-width: 400px;">Product Name & Details</th>
                                    <th class="text-right" style="width: 100px;">Price</th>
                                    <th class="text-center" style="width: 120px;">Quantity</th>
                                    <th class="text-right" style="width: 100px;">Total</th>
                                    <th class="text-center" style="width: 40px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $cartData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="p-4">
                                            <div class="media align-items-center">
                                                <img src="<?php echo e(asset('storage/' . $cartItem->product_image)); ?>"
                                                    class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                                <div class="media-body">
                                                    <a class="d-block text-dark"><?php echo e($cartItem->name); ?></a>
                                                    <small class="text-muted"><?php echo e($cartItem->description); ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right font-weight-semibold align-middle p-4">
                                            Rs.<?php echo e($cartItem->price); ?></td>
                                        <td class="text-center font-weight-semibold align-middle p-4">
                                            <?php echo e($cartItem->quantity); ?></td>
                                        <td class="text-right font-weight-semibold align-middle p-4">
                                            Rs.<?php echo e($cartItem->price * $cartItem->quantity); ?></td>
                                        <td class="text-center align-middle p-4">
                                            <a href="<?php echo e(url('/remove', $cartItem->id)); ?>"
                                                class="text-danger" title="Remove">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <?php
                                        $totalPrice += $cartItem->price * $cartItem->quantity;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <div class="text-right">
                            <label class="text-muted font-weight-normal mr-2">Total Price</label>
                            <div class="text-large"><strong>Rs.<?php echo e($totalPrice); ?></strong></div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <a href="<?php echo e(url('menu')); ?>" class="btn btn-outline-secondary btn-sm mr-2">Continue Ordering</a>
                        <a href="<?php echo e(url('checkout')); ?>"
                            class="btn btn-success btn-sm ml-3 <?php if($totalPrice === 0): ?> disabled <?php endif; ?>">Checkout</a>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info text-center mt-4" role="alert">
                        Your cart is empty. Start adding items <a href="<?php echo e(url('menu')); ?>" class="btn btn-link">here</a>.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<style>
    body {
        background: #f8f9fa;
        margin-top: 20px;
    }

    .card {
        border-radius: 8px;
    }

    .ui-w-40 {
        width: 40px !important;
        height: auto;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .card-header {
        background-color: #f7f7f7;
        border-bottom: 2px solid #e5e5e5;
    }

    .btn-outline-secondary {
        color: #6c757d;
        border-color: #6c757d;
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: #fff;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }
</style>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProject\laravel_1st\resources\views/user/cart.blade.php ENDPATH**/ ?>