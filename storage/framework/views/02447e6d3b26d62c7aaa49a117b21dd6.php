<div class="cl">
    <div class="container pb-5">
        <div class="dd">

            <h3 class=" category-heading ">Seasonal Specials </h3>
        </div>
    <div class="row">
        <?php $__currentLoopData = $viewproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-3 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-body text-center">
                        <a href="#" data-toggle="modal" data-target="#productModal<?php echo e($product->id); ?>">
                            <img src="<?php echo e(asset('storage/' . $product->product_image)); ?>" class="product-image">
                        </a>
                        <h5 class="card-title"><b><?php echo e($product->name); ?></b></h5>
                        <p class="card-text small description-limit"><?php echo e($product->description); ?></p>
                        <p class="price-tag"> Rs.<?php echo e($product->price); ?></p>
                        <form action="<?php echo e(url('/addcart',$product->id)); ?>" method="post" class="add-to-cart-form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                            <div class="input-group">
                                <input type="number" name="quantity" value="1" min="1" max="10" required class="form-control quantity-input">
                                <div class="input-group-append" style="background-color: #FFC107">
                                    <button type="submit" class="btn btn-">Add to Cart</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

          
            <div class="modal fade" id="productModal<?php echo e($product->id); ?>" tabindex="-1" role="dialog"
                aria-labelledby="productModalLabel<?php echo e($product->id); ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productModalLabel<?php echo e($product->id); ?>"><?php echo e($product->name); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           
                            <img src="<?php echo e(asset('storage/' . $product->product_image)); ?>" class="img-fluid"
                                alt="Product Image">
                            <p style="font-weight: 00"><?php echo e($product->description); ?></p>
                            <p style="color: chocolate; font-weight: 800"">Price: Rs.<?php echo e($product->price); ?></p>
                            <p style="color: <?php echo e($product->item == 'veg' ? 'green' : 'red'); ?>; font-weight: 800;">Item:<?php echo e($product->item); ?></p>


                        </div>
                    </div>
                </div>
            </div>

            <?php if($index == 7): ?>
                <div class="col-12 text-center mt-4">
                    <p><a href="/menu" style="text-decoration: none; color: darkred; font-weight: 600">View More
                            Products.....</a></p>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
</div>
<?php /**PATH F:\LaravelProject\laravel_1st\resources\views/frontend/bestproducts.blade.php ENDPATH**/ ?>