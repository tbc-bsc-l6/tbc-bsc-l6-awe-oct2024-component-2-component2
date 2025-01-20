<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid my-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="fw-bold">Foods</h1>
                </div>
                <div class="col-md-6 text-md-end text-center">
                    <a href="<?php echo e(route('admin.addproducts')); ?>" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> New Product
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light">
                    <div class="d-flex justify-content-end">
                        <div class="input-group w-25">
                            <input type="text" name="table_search" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn btn-outline-secondary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Item</th>
                                <th>Category</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td>
                                        <?php if($item->product_image): ?>
                                            <img src="<?php echo e(asset('storage/' . $item->product_image)); ?>" alt="Image"
                                                class="rounded-circle border" style="width: 50px; height: 50px;">
                                        <?php else: ?>
                                            <span class="text-muted">No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td>Rs.<?php echo e(number_format($item->price, 2)); ?></td>
                                    <td><?php echo e($item->item); ?></td>
                                    <td><?php echo e($item->category->name); ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo e(url('admin/editproduct/' . $item->id)); ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?php echo e(route('admin.deleteproduct', $item->id)); ?>" 
                                           class="btn btn-sm btn-outline-danger delete-link" 
                                           id="delete">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-light">
                    <div class="d-flex justify-content-end">
                        <?php echo e($products->links('pagination::bootstrap-5')); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(session('alert-type') == 'success'): ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div class="toast align-items-center text-white bg-success border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        <?php echo e(session('message')); ?>

                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        </div>

        <script>
            const toastEl = document.querySelector('.toast');
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProject\laravel_1st\resources\views/admin/products/products.blade.php ENDPATH**/ ?>