

<?php $__env->startSection('title', 'Dahlan Property | Manajemen Properti Modern'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <?php echo $__env->make('components.sections.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Features Section -->
    <?php echo $__env->make('components.sections.features', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Property Types Section -->
    <?php echo $__env->make('components.sections.property-types', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/welcome.blade.php ENDPATH**/ ?>