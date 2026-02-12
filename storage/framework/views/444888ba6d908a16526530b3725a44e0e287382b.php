<?php $__env->startSection('title', 'Daftar Akun - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .auth-container { min-height: calc(100vh - 200px); padding: 80px 0; }
    .auth-card { border-radius: 15px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); }
    .auth-header { background: linear-gradient(90deg, #0d6efd, #6610f2); color: white; padding: 30px; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="auth-card card">
                    <div class="auth-header text-center">
                        <i class="fas fa-user-plus fa-3x mb-3"></i>
                        <h3 class="fw-bold">Daftar Akun Baru</h3>
                    </div>
                    <div class="card-body p-4">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST" action="<?php echo e(route('register')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Nomor Telepon (Opsional)</label>
                                <input type="tel" name="phone" class="form-control" value="<?php echo e(old('phone')); ?>">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="terms" class="form-check-input" required>
                                <label class="form-check-label">Saya menyetujui syarat & ketentuan</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Daftar</button>
                            <div class="text-center mt-3">
                                <a href="<?php echo e(route('login')); ?>">Sudah punya akun? Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/auth/register.blade.php ENDPATH**/ ?>