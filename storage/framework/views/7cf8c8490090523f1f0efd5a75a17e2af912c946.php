<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title><?php echo $__env->yieldContent('title', 'Dahlan Property'); ?></title>
    
    <!-- ✅ FIX: Tailwind CSS - Hapus spasi di URL -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- ✅ FIX: Font Awesome - Hapus spasi di URL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- ✅ FIX: Google Font - Hapus spasi di URL -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/navbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/footer.css')); ?>">
    
    <!-- ✅ YIELD STYLES (Untuk CSS per halaman) -->
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <main class="py-8 px-4">
        <div class="max-w-7xl mx-auto">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>
    
    <!-- Scripts -->
    <script src="<?php echo e(asset('assets/js/navbar.js')); ?>"></script>
    
    <!-- ✅ STACK CHARTS (Untuk ApexCharts/Chart.js per halaman) -->
    <?php echo $__env->yieldPushContent('charts'); ?>
    
    <!-- ✅ YIELD SCRIPTS (Untuk JS per halaman) -->
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/layouts/app.blade.php ENDPATH**/ ?>