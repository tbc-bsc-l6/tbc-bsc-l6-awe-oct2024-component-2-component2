<?php $__env->startSection('content'); ?>


<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Category "<?php echo e($category->name); ?>"</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href=<?php echo e(route('admin.category')); ?> class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->



<section class="content">
   

    <!-- Default box -->
    <div class="container-fluid">
        <form method="POST" action=<?php echo e(url('admin/updatecategory/' . $category->id)); ?> enctype="multipart/form-data">

            <?php echo csrf_field(); ?>
        
            <?php echo method_field('PUT'); ?>
            <div class="card">
                <div class="card-body">	
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" value="<?php echo e($category->name); ?>" id="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Category Name">	
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                
                            <div class="mb-">
                                <label for="category_icon">Category Icon</label>
                                <input type="file" name="category_icon" id="category_icon" class="form-control <?php $__errorArgs = ['category_icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__errorArgs = ['category_icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                </div>							
            </div>
        
            <div class="pb-5 pt-3">
                <button class="btn btn-primary" type="submit">Edit</button>
                <a href="<?php echo e(route('admin.category')); ?>" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
        
        
   
    </div>
    <!-- /.card -->
</section>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProject\laravel_1st\resources\views/admin/category/editcategory.blade.php ENDPATH**/ ?>