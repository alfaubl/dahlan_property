<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', 'Dahlan Property - Marketplace Properti Terbaik'); ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    
    <!-- CSS Payment -->
    <link rel="stylesheet" href="<?php echo e(asset('css/payment.css')); ?>">

    <!-- Custom CSS -->
    <?php echo $__env->make('layouts.app-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('styles'); ?>

    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('images/favicon.ico')); ?>">
</head>

<body>

    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom JS -->
    <?php echo $__env->make('layouts.app-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Midtrans JS -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo e(config('midtrans.client_key')); ?>"></script>
    
    <!-- Payment JS -->
    <script src="<?php echo e(asset('js/payment.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/layouts/app.blade.php ENDPATH**/ ?>