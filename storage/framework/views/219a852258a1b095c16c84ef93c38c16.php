 
<?php $__env->startSection('content'); ?>

    <?php if(session('alert-type') == 'success'): ?>
    <div class="alert alert-success" id="success-alert">
        <?php echo e(session('message')); ?>

    </div>

    <script>
        setTimeout(function(){
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }, 2000); 
    </script>

    <?php endif; ?>

    <?php echo $__env->make('frontend.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->make('frontend.categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->make('frontend.bestproducts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProject\laravel_1st\resources\views/frontend/home.blade.php ENDPATH**/ ?>