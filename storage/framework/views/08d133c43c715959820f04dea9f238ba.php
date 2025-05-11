<?php $__env->startSection('title', 'Confirmation'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/shopping_cart3.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/shopping_cart1.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="confirmation">
        <p class="thanks">Thank you for your purchase!</p>
        <p class="email-info">You got a confirmation email<br>Your order is on its way to you!</p>
        <div class="van-line">
            <div class="line"></div>
            <img src="images/van.png" alt="image of a van carrying your package" class="van">
        </div>
        <div class="button">
            <a href="<?php echo e(route('products')); ?>"><button class="shop-button">Continue Shopping</button></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alemu\OneDrive - Slovenská technická univerzita v Bratislave\Pracovná plocha\4.semester\WTECH\moj-projekt\resources\views/confirmation.blade.php ENDPATH**/ ?>