<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="text-primary">Customer Management</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="<?php echo e(route('admin.addusers')); ?>" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i> New Customer
                </a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Customer List</h5>
                    <div class="input-group" style="width: 300px;">
                        <input type="text" name="table_search" class="form-control" placeholder="Search Customers...">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-light">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-bordered text-center align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th width="60">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th width="100">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(session('alert-type') == 'success'): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e(session('message')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->index + 1); ?></td>
                                <td><?php echo e($u->name); ?></td>
                                <td><?php echo e($u->email); ?></td>
                                <td><?php echo e($u->phone); ?></td>
                                <td><?php echo e($u->address); ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <!-- Edit Button -->
                                        <a href="<?php echo e(url('admin/edituser/' . $u->id)); ?>" class="btn btn-sm btn-warning me-1" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Delete Button -->
                                        <a href="<?php echo e(route('admin.deleteuser', $u->id)); ?>" class="btn btn-sm btn-danger delete-link" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <div class="d-flex justify-content-end">
                    <?php echo e($user->links()); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProject\laravel_1st\resources\views/admin/users/users.blade.php ENDPATH**/ ?>