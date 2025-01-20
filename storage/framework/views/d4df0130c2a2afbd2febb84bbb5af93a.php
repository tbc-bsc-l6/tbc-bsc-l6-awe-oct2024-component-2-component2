<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <div class="row align-items-center">
            <!-- Contact form on the left side -->
            <div class="col-lg-6 order-lg-1 order-2">
                <div class="contact-form bg-light p-4 rounded shadow">
                    <h1 class="title mb-4">Contact Us</h1>
                    <p class="text-muted mb-4">We're here to help and answer any question you might have. We look forward to hearing from you!</p>
                    <?php if(Session::has('message_sent')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(Session::get('message_sent')); ?>

                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('contact.submit')); ?>" method="post" id="contactForm">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required
                                value="<?php echo e(old('name')); ?>">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Your E-mail Address"
                                required value="<?php echo e(old('email')); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group mb-3">
                            <input type="tel" name="phone" class="form-control" placeholder="Your Phone Number"
                                required value="<?php echo e(old('phone')); ?>">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group mb-4">
                            <textarea name="message" class="form-control" rows="5" placeholder="Your Message" required><?php echo e(old('message')); ?></textarea>
                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Get a Call Back</button>
                    </form>
                </div>
            </div>

            <!-- Map on the right side -->
            <div class="col-lg-6 order-lg-2 order-1 mb-4">
                <div class="map rounded shadow">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.814291421619!2d85.31694337518081!3d27.692134076191305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19b19295555f%3A0xabfe5f4b310f97de!2sThe%20British%20College%2C%20Kathmandu!5e0!3m2!1sen!2snp!4v1703657607458!5m2!1sen!2snp"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProject\laravel_1st\resources\views/contactus/contactus.blade.php ENDPATH**/ ?>