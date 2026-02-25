<nav>
    <div class="nav-container">
        <div class="nav-wrapper">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="logo-link">
                <div class="logo-icon animate-float">
                    <i class="fas fa-home"></i>
                </div>
                <span class="logo-text">
                    Dahlan<span class="logo-highlight">Property</span>
                </span>
            </a>

            <!-- Navigation Links -->
            <div class="nav-links">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('properties.index') }}" class="nav-link">Properties</a>
                <a href="{{ route('about') }}" class="nav-link">About</a>
                <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                
                @auth
                    <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                @endauth
            </div>

            <!-- User Menu -->
            <div class="user-menu-wrapper">
                @auth
                    <div class="relative group">
                        <button class="user-menu">
                            <div class="user-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <span class="user-name">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down chevron-icon"></i>
                        </button>
                        
                        <div class="dropdown-menu">
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <i class="fas fa-user-edit w-5"></i> Profile
                            </a>
                            <a href="{{ route('booking.index') }}" class="dropdown-item">
                                <i class="fas fa-calendar-check w-5"></i> My Bookings
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item logout">
                                    <i class="fas fa-sign-out-alt w-5"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="auth-buttons">
                        <a href="{{ route('login') }}" class="login-link">Login</a>
                        <a href="{{ route('register') }}" class="register-btn">Register</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>