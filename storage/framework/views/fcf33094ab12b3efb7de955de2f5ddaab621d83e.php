<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <form method="POST" action="<?php echo e(route('register')); ?>">
        <?php echo csrf_field(); ?>
        
        <div class="form-group">
            <label class="form-label" for="name">Full Name</label>
            <input 
                id="name" 
                class="form-input" 
                type="text" 
                name="name" 
                value="<?php echo e(old('name')); ?>" 
                required 
                autofocus 
                placeholder="Enter your full name"
            >
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Email Address</label>
            <input 
                id="email" 
                class="form-input" 
                type="email" 
                name="email" 
                value="<?php echo e(old('email')); ?>" 
                required 
                placeholder="Enter your email"
            >
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <div class="password-wrapper">
                <input 
                    id="password" 
                    class="form-input" 
                    type="password" 
                    name="password" 
                    required 
                    placeholder="Create a password"
                >
                <button type="button" class="password-toggle">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="password_confirmation">Confirm Password</label>
            <div class="password-wrapper">
                <input 
                    id="password_confirmation" 
                    class="form-input" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    placeholder="Confirm your password"
                >
                <button type="button" class="password-toggle">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <button type="submit" class="btn-primary">
            <i class="fas fa-user-plus"></i> Create Account
        </button>

        <div class="register-link">
            Already have an account? 
            <a href="<?php echo e(route('login')); ?>">Sign in</a>
        </div>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\dahlan_project\resources\views/auth/register.blade.php ENDPATH**/ ?>