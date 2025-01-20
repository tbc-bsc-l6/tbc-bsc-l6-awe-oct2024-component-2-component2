<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-3 align-items-center">
            <div class="col-md-6">
                <h1 class="text-primary">Create Category</h1>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="<?php echo e(route('admin.category')); ?>" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <form method="POST" action="<?php echo e(route('admin.storecategory')); ?>" enctype="multipart/form-data" class="needs-validation" novalidate>
            <?php echo csrf_field(); ?>
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Category Details</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <!-- Category Name -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="name" id="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Category Name" value="<?php echo e(old('name')); ?>">
                                <label for="name">Category Name</label>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Category Icon -->
                        <div class="col-md-6">
                            <label for="category_icon" class="form-label">Category Icon</label>
                            <input type="file" name="category_icon" id="category_icon" class="form-control <?php $__errorArgs = ['category_icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="image/*">
                            <?php $__errorArgs = ['category_icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <button class="btn btn-success" type="submit">
                        <i class="fas fa-save"></i> Create
                    </button>
                    <a href="<?php echo e(route('admin.category')); ?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProject\laravel_1st\resources\views/admin/category/addcategory.blade.php ENDPATH**/ ?>