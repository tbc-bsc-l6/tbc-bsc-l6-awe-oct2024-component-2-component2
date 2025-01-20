<?php $__env->startSection('content'); ?>
<?php if(session('alert-type') == 'success'): ?>
<div class="alert alert-success" id="success-alert">
    <?php echo e(session('message')); ?>

</div>

<script>
    setTimeout(function() {
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
    }, 2000);
</script>

<?php endif; ?>
<section class="page-section">
    <div class="container mt-5">
        <div class="row">

            <div class="col-lg-3 blog-form cl pt-2">
                <h3 class="blog-sidebar-title"><b>Categories</b></h3>
                <hr />

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p class="blog-sidebar-list">
                    <a href="<?php echo e(route('products.searchSort', ['category' => $category->id])); ?>"
                        style="color: chocolate; text-decoration: none;">
                        <b class="">
                            <li> <?php echo e($category->name); ?></li>

                        </b>
                    </a>
                </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div>&nbsp;</div>
                <div>&nbsp;</div>

                <h3 class="blog-sidebar-title"><b>Filter</b></h3>
                <hr />

                <form action="<?php echo e(route('products.searchSort')); ?>" method="get">
                    <div class="form-group">
                        <label for="minPrice">Min Price:</label>
                        <input type="number" class="form-control" id="minPrice" name="min_price" min="1"
                            placeholder="Enter Min Price" value="<?php echo e(request('min_price')); ?>" step="1">
                    </div>

                    <div class="form-group">
                        <label for="maxPrice">Max Price:</label>
                        <input type="number" class="form-control" id="maxPrice" name="max_price" min="1"
                            placeholder="Enter Max Price" value="<?php echo e(request('max_price')); ?>" step="1">
                    </div>

                    <button type="submit" class="btn btn-dark bt1 btn-md">Filter</button>
                </form>



            </div>

            <div class="col-lg-9" style="padding-left: 30px;">




                <div class="row border p-4 ">

                    <div class="mt-3" id="searchResults">
                        <div class="container">
                            <div class="row align-items-center">
                                <p class="mb-0">
                                    <?php if(isset($searchQuery)): ?>
                                    Search results for: <strong>"<?php echo e($searchQuery); ?>"</strong>
                                    <?php else: ?>
                                    Showing all products
                                    <?php endif; ?>
                                </p>
                                <button type="button" class="btn btn-secondary btn-sm mb-2 ml-3" id="resetButton"
                                    style="max-width: 100px;">Clear</button>
                            </div>
                        </div>
                    </div>














                    <form id="searchSortForm" action="<?php echo e(route('products.searchSort')); ?>" method="GET"
                        class="form-inline">
                        <div class="form-group">
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" class="form-control" id="search" name="search"
                                placeholder="Search" value="<?php echo e(request('search')); ?>">
                        </div>
                        <button type="submit" class="btn btn-secondary  bt1 ml-2">Search</button>

                        <div class="form-group mx-2">
                            <label for="sort" class="sr-only">Sort</label>
                            <select class="form-control" id="sort" name="sort">
                                <option value="" selected>Sort</option>
                                <option value="desc">Sort Price(high-low)</option>
                                <option value="asc">Sort Price(low-high)</option>
                                <option value="latest">Sort Newest Product</option>
                                <option value="oldest">Sort Oldest Product</option>
                            </select>
                        </div>

                        <div class="form-group mx-2">
                            <label class="mr-2">Type:</label>
                            <select class="form-control" id="foodType" name="food_type">
                                <option value="" <?php echo e(request('food_type') === '' ? 'selected' : ''); ?>>All</option>
                                <option value="veg" <?php echo e(request('food_type') === 'veg' ? 'selected' : ''); ?>>Veg
                                </option>
                                <option value="non-veg" <?php echo e(request('food_type') === 'nonVeg' ? 'selected' : ''); ?>>
                                    Non-Veg</option>
                            </select>
                        </div>



                        <input type="hidden" id="category" name="category" value="<?php echo e(request('category')); ?>">




                    </form>
                </div>
                <div class="d-flex justify-content-end w-min ">
                    <p class="text-right mt-4 border p-2 " style="width:max-content  ">Showing <?php echo e($viewproducts->firstItem()); ?> - <?php echo e($viewproducts->lastItem()); ?>

                        of <?php echo e($viewproducts->total()); ?> results</p>
                </div>




                <script>
                    $('#sort, #foodType').change(function() {
                        $('#searchSortForm').submit();
                    });
                    $(document).ready(function() {
                        $('.category-link').click(function(e) {

                        });

                        function resetForm() {
                            $('#search, #sort, #category, #foodType').val('');

                            $('#searchSortForm').submit();
                        }

                        $('#resetButton').click(function() {
                            $('#resetButton').click(function() {
                                $('#search').val('');
                                $('#sort, #foodType').prop('selectedIndex', 0);
                                $('#category').val('');
                                $('#searchSortForm').submit();
                            });
                        });
                    });

                    $(document).ready(function() {
                        toggleShowingAllProducts();

                        $('#resetButton').click(function() {
                            $('#search').val('');
                            toggleShowingAllProducts();
                        });

                        function toggleShowingAllProducts() {
                            var hasSearchQuery = '<?php echo e(isset($searchQuery)); ?>';
                            if (hasSearchQuery) {
                                $('#searchResults').show();
                            } else {
                                $('#searchResults').hide();
                            }
                        }
                    });
                </script>

                <div class="row">

                    <?php $__empty_1 = true; $__currentLoopData = $viewproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-sm-3 col-md-2 col-lg-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="#" data-toggle="modal"
                                    data-target="#productModal<?php echo e($product->id); ?>">
                                    <img src="<?php echo e(asset('storage/' . $product->product_image)); ?>"
                                        class="product-image">
                                </a>
                                <h5 class="card-title"><b><?php echo e($product->name); ?></b></h5>
                                <p class="card-text small description-limit"><?php echo e($product->description); ?></p>
                                <p class="price-tag"> Rs.<?php echo e($product->price); ?></p>

                                <form action="<?php echo e(url('/addcart', $product->id)); ?>" method="post"
                                    class="add-to-cart-form">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                    <div class="input-group">
                                        <input type="number" name="quantity" value="1" min="1"
                                            max="10" required class="form-control quantity-input">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-success bt1">Add to Cart</button>
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
                                    <h5 class="modal-title" id="productModalLabel<?php echo e($product->id); ?>">
                                        <?php echo e($product->name); ?>

                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?php echo e(asset('storage/' . $product->product_image)); ?>"
                                        class="img-fluid" alt="Product Image">
                                    <p style="font-weight: 500"><?php echo e($product->description); ?></p>
                                    <p style="color: chocolate; font-weight: 800"">Price: Rs.<?php echo e($product->price); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class=" col-12 text-center mt-5">
                                    <p>No products found. Try searching another one</p>
                                </div>
                                <?php endif; ?>


                            </div>
                            <div class="d-flex justify-content-end">

                                <div class="pagination">
                                    <?php echo e($viewproducts->appends([
                                    'sort' => $sortOption,
                                    'search' => $searchQuery,
                                    'food_type' => $foodType,
                                    'category' => $categoryId,
                                ])->links('')); ?>



                                </div>
                            </div>

                        </div>

                    </div>
                </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProject\laravel_1st\resources\views/frontend/allproducts.blade.php ENDPATH**/ ?>