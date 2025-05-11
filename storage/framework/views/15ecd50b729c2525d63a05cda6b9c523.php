

<?php $__env->startSection('title', 'Log In'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/products.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="store-name text-center overlay-text">
    <a href="<?php echo e(route('homepage')); ?>" aria-label="Homepage">
        Maui Surf
    </a>
</div>


<main class="prihlasovacky">
    <div class="background-image"></div>
    <div class="row justify-content-center">    
        <!-- Log In-->
        <div class="prihlasovacky_box col-md-5 p-5 rounded shadow-sm">
            <h2 class="text-center">LOG IN</h2>
            <?php if($errors->login->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->login->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form  method="POST" action="<?php echo e(route('login')); ?>">  <!--prihlasovacie udaje-->
                <?php echo csrf_field(); ?>
                <div class="mb-2">
                    <input type="email" name='email' class="form-control" placeholder="e-mail..." required>
                </div>
                <div class="mb-2">
                    <input type="password" name='password' class="form-control" placeholder="password..." required>
                </div>
                <button type="submit" class="button_prihlasenie">Log In</button>
                <a href="#" class="forgotten_password">Forgotten password</a>
            </form>
        </div>

        <!-- Register-->
        <div class="prihlasovacky_box col-md-5 p-5 rounded shadow-sm ms-md-4 mt-4 mt-md-0">
            <h2 class="text-center">REGISTER</h2>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-2 ">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="mb-2">
                    <input type="email" name="email" class="form-control" placeholder="e-mail" required>
                </div>
                <div class="mb-2">
                    <input type="tel" name="phone_number" class="form-control" placeholder="Phone number" required>
                </div>
                <div class="mb-2">
                    <input type="text" name="country" class="form-control" placeholder="Country" required>
                </div>
                <div class="mb-2">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="mb-2">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="button_prihlasenie">Register</button>
            </form>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alemu\OneDrive - Slovenská technická univerzita v Bratislave\Pracovná plocha\4.semester\WTECH\moj-projekt\resources\views/login.blade.php ENDPATH**/ ?>