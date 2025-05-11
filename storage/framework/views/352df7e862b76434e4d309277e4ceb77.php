<?php $__env->startSection('title', 'Maui Surf'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/homepage.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/homepage.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!--Banner-->
    <div class="banner-container">
        <video src="images/surf images videos/surfisti_na_vlne.mp4" class="img-fluid w-100" autoplay loop muted playsinline></video>
        <div class="overlay-text">Maui Surf</div>
        <div class="banner-text">
            <div class="text_on_banner">The waves are calling - ride them in style! Find the best surf gear here.</div>
        </div>
        
        <form method="GET" action="<?php echo e(route('products')); ?>" class="search-bar">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder=" Search...">
            <button type="submit" class="neviditelny-button"><i class="bi bi-search"></i></button>
        </form>

    </div>

    <div class="nav">
        <a href="<?php echo e(route('products.byCategory', ['category' => 'Surfboards'])); ?>"><h2>SURFBOARDS</h2></a>
        <a href="<?php echo e(route('products.byCategory', ['category' => 'Equipment'])); ?>"><h2>EQUIPMENT</h2></a>
        <a href="<?php echo e(route('products.byCategory', ['category' => 'Accessories'])); ?>"><h2>ACCESSORIES</h2></a>
    </div>
    
    <!-- Products -->
    <div class="products">
        <!-- Surfboards Section -->
        <div class="product_left">
            <?php if($surfboards->isNotEmpty()): ?>
                <?php
                    $firstProduct = $surfboards[0];
                    $firstImage = $firstProduct->mainImage ?? $firstProduct->images->first();
                ?>
                <a href="<?php echo e(route('product_detail', ['id' => $firstProduct->id])); ?>" class="link_neviditelny">
                    <?php if($firstImage): ?>
                        <img src="<?php echo e(asset($firstImage->image_path)); ?>" alt="<?php echo e($firstProduct->name); ?>" class="surfboard_picture darker">
                    <?php endif; ?>
                </a>
            <?php endif; ?>

            <div class="surfboard_products">
                <div class="three_products">
                    <?php $__currentLoopData = $surfboards->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $image = $product->mainImage ?? $product->images->first();
                        ?>
                        <a href="<?php echo e(route('product_detail', ['id' => $product->id])); ?>" class="link_neviditelny">
                            <?php if($image): ?>
                                <img src="<?php echo e(asset($image->image_path)); ?>" alt="<?php echo e($product->name); ?>" class="surfboard_product darker">
                            <?php endif; ?>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($surfboards->count() < 4): ?>
                        <?php $__currentLoopData = $surfboards->take(4 - $surfboards->count()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $image = $product->mainImage ?? $product->images->first();
                            ?>
                            <a href="<?php echo e(route('product_detail', ['id' => $product->id])); ?>" class="link_neviditelny">
                                <?php if($image): ?>
                                    <img src="<?php echo e(asset($image->image_path)); ?>" alt="<?php echo e($product->name); ?>" class="surfboard_product darker">
                                <?php endif; ?>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="pretty-box">
                        <p class="pretty-text">Surfboards</p>
                    </div>
                </div>

                <div class="surfboard_button">
                    <a href="<?php echo e(route('products.byCategory', ['category' => 'Surfboards'])); ?>">
                        <button class="custom-btn">More</button>
                    </a>
                </div>
            </div>
        </div>


        <!-- Equipment Section -->
        <div class="product_right">
            <?php if($equipment->isNotEmpty()): ?>
                <?php
                    $firstProduct = $equipment[0];
                    $firstImage = $firstProduct->mainImage ?? $firstProduct->images->first();
                ?>
                <a href="<?php echo e(route('product_detail', ['id' => $firstProduct->id])); ?>" class="link_neviditelny">
                    <?php if($firstImage): ?>
                        <img src="<?php echo e(asset($firstImage->image_path)); ?>" alt="<?php echo e($firstProduct->name); ?>" class="equipment_picture darker">
                    <?php endif; ?>
                </a>
            <?php endif; ?>

            <div class="equipment_products">
                <div class="three_products">
                    <?php $__currentLoopData = $equipment->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $image = $product->mainImage ?? $product->images->first();
                        ?>
                        <a href="<?php echo e(route('product_detail', ['id' => $product->id])); ?>" class="link_neviditelny">
                            <?php if($image): ?>
                                <img src="<?php echo e(asset($image->image_path)); ?>" alt="<?php echo e($product->name); ?>" class="equipment_product darker">
                            <?php endif; ?>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($equipment->count() < 4): ?>
                        <?php $__currentLoopData = $equipment->take(4 - $equipment->count()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $image = $product->mainImage ?? $product->images->first();
                            ?>
                            <a href="<?php echo e(route('product_detail', ['id' => $product->id])); ?>" class="link_neviditelny">
                                <?php if($image): ?>
                                    <img src="<?php echo e(asset($image->image_path)); ?>" alt="<?php echo e($product->name); ?>" class="equipment_product darker">
                                <?php endif; ?>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>

                <div class="surfboard_button">
                    <a href="<?php echo e(route('products.byCategory', ['category' => 'Equipment'])); ?>">
                        <button class="equipment-custom-btn">More</button>
                    </a>
                    <div class="pretty-box-reverse">
                        <p class="pretty-text">Equipment</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Accessories Section -->
        <div class="product_left">
            <?php if($accessories->isNotEmpty()): ?>
                <?php
                    $firstProduct = $accessories[0];
                    $firstImage = $firstProduct->mainImage ?? $firstProduct->images->first();
                ?>
                <a href="<?php echo e(route('product_detail', ['id' => $firstProduct->id])); ?>" class="link_neviditelny">
                    <?php if($firstImage): ?>
                        <img src="<?php echo e(asset($firstImage->image_path)); ?>" alt="<?php echo e($firstProduct->name); ?>" class="surfboard_picture darker">
                    <?php endif; ?>
                </a>
            <?php endif; ?>

            <div class="surfboard_products">
                <div class="three_products">
                    <?php $__currentLoopData = $accessories->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $image = $product->mainImage ?? $product->images->first();
                        ?>
                        <a href="<?php echo e(route('product_detail', ['id' => $product->id])); ?>" class="link_neviditelny">
                            <?php if($image): ?>
                                <img src="<?php echo e(asset($image->image_path)); ?>" alt="<?php echo e($product->name); ?>" class="surfboard_product darker">
                            <?php endif; ?>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($accessories->count() < 4): ?>
                        <?php $__currentLoopData = $accessories->take(4 - $accessories->count()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $image = $product->mainImage ?? $product->images->first();
                            ?>
                            <a href="<?php echo e(route('product_detail', ['id' => $product->id])); ?>" class="link_neviditelny">
                                <?php if($image): ?>
                                    <img src="<?php echo e(asset($image->image_path)); ?>" alt="<?php echo e($product->name); ?>" class="surfboard_product darker">
                                <?php endif; ?>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="pretty-box">
                        <p class="pretty-text">Accessories</p>
                    </div>
                </div>

                <div class="surfboard_button">
                    <a href="<?php echo e(route('products.byCategory', ['category' => 'Accessories'])); ?>">
                        <button class="custom-btn">More</button>
                    </a>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alemu\OneDrive - Slovenská technická univerzita v Bratislave\Pracovná plocha\4.semester\WTECH\moj-projekt\resources\views/homepage.blade.php ENDPATH**/ ?>