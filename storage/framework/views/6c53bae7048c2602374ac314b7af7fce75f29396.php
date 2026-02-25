<nav>
    <div class="nav-container">
        <div class="nav-wrapper">
            <!-- Logo -->
            <a href="<?php echo e(route('home')); ?>" class="logo-link">
                <div class="logo-icon animate-float">
                    <i class="fas fa-home"></i>
                </div>
                <span class="logo-text">
                    Dahlan<span class="logo-highlight">Property</span>
                </span>
            </a>

            <!-- Navigation Links -->
            <div class="nav-links">
                <a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a>
                <a href="<?php echo e(route('properties.index')); ?>" class="nav-link">Properties</a>
                <a href="<?php echo e(route('about')); ?>" class="nav-link">About</a>
                <a href="<?php echo e(route('contact')); ?>" class="nav-link">Contact</a>
                
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="nav-link">Dashboard</a>
                <?php endif; ?>
            </div>

            <!-- User Menu -->
            <div class="user-menu-wrapper">
                <?php if(auth()->guard()->check()): ?>
                    <div class="relative group">
                        <button class="user-menu">
                            <div class="user-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <span class="user-name"><?php echo e(Auth::user()->name); ?></span>
                            <i class="fas fa-chevron-down chevron-icon"></i>
                        </button>
                        
                        <div class="dropdown-menu">
                            <a href="<?php echo e(route('profile.edit')); ?>" class="dropdown-item">
                                <i class="fas fa-user-edit w-5"></i> Profile
                            </a>
                            <a href="<?php echo e(route('booking.index')); ?>" class="dropdown-item">
                                <i class="fas fa-calendar-check w-5"></i> My Bookings
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item logout">
                                    <i class="fas fa-sign-out-alt w-5"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="auth-buttons">
                        <a href="<?php echo e(route('login')); ?>" class="login-link">Login</a>
                        <a href="<?php echo e(route('register')); ?>" class="register-btn">Register</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>