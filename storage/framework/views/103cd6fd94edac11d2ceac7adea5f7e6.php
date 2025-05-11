

<?php $__env->startSection('title', 'User Profile'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/profile.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/products.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="store-name text-center overlay-text">
    <a href="<?php echo e(route('homepage')); ?>">
        Maui Surf
    </a>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4 order-sm-2">               
            <h2><?php echo e($user->name); ?></h2>

            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button class="odhlasit_btn">Log out</button>
            </form>

            <button class="edit_profile_btn" >
                <i class="fas fa-edit"></i>Edit Profile
            </button>
            <button class="edit_profile_btn">Change password</button> 

            <div class="card my_card">
                    <div class="card-body">
                        <h5 class="card-title">Profile details</h5>
                        <ul class="list-unstyled">
                            <li><strong>Email:</strong> <?php echo e($user->email); ?></li>
                            <li><strong>Phone:</strong> <?php echo e($user->phone_number); ?></li>
                            <li><strong>Country:</strong> <?php echo e($user->country); ?></li>
                        </ul>
                    </div>
            </div>
                
            <div class="profil_info">
                <img src="images/surf images videos/pc1.jpg" alt="Profile image" class="profile-img mb-3">
            </div>

        </div>

        <!-- Historia objednávok -->
        <div class="col-sm-8">
            <div class="">
                <h3 >Your orders</h3>
                <ul class="list-group">
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center">
                                    <?php
                                        $product = \App\Models\Product::with(['mainImage', 'images'])->find($item->product_id);
                                    ?>
                                    <?php if($product && $product->mainImage): ?>
                                        <a href="<?php echo e(route('product_detail', ['id' => $product->id])); ?>" class="link_neviditelny darker">
                                            <img src="<?php echo e(asset($product->mainImage->image_path)); ?>" alt="<?php echo e($product->name); ?>" class="product_order_image">
                                        </a>
                                    <?php elseif($product && $product->images->isNotEmpty()): ?>
                                        <a href="<?php echo e(route('product_detail', ['id' => $product->id])); ?>" class="link_neviditelny darker">
                                            <img src="<?php echo e(asset($product->images->first()->image_path)); ?>" alt="<?php echo e($product->name); ?>" class="product_order_image">
                                        </a>
                                    <?php else: ?> 
                                        <img src="/images/sold_out.png" alt="Product is not available anymore" class="product_order_image">
                                    <?php endif; ?>

                                    <div>
                                        <p class="order_title"><?php echo e($item->product_name); ?></p>
                                        <p class="order_details">
                                            Size: <strong><?php echo e($item->size ?? 'N/A'); ?></strong> | 
                                            Amount: <strong><?php echo e($item->quantity); ?> pc</strong>
                                        </p>
                                        <p class="order_details">
                                            Prize: <strong>$<?php echo e(number_format($item->unit_price * $item->quantity, 2)); ?></strong>
                                        </p>
                                    </div>
                                    <!-- <span class="badge 
                                        <?php if($order->status == 'Delivered'): ?> bg-success 
                                        <?php elseif($order->status == 'Cancelled'): ?> bg-danger 
                                        <?php else: ?> bg-warning 
                                        <?php endif; ?>">
                                        <?php echo e($order->status); ?>

                                    </span> -->
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>

                <ul class="list-group">
                </ul>
                
            </div>
        </div>
    </div>
</div>

<div class="motivation">
    <img src="images/surf images videos/pc5.jpg" alt="Motivation Picture" class="motivation_img">
    <div class="citat">"You cant't stop the waves but you can learn to surf"</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alemu\OneDrive - Slovenská technická univerzita v Bratislave\Pracovná plocha\4.semester\WTECH\moj-projekt\resources\views/profile.blade.php ENDPATH**/ ?>