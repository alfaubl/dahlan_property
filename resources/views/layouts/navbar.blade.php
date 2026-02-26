<nav class="navbar">
    <div class="nav-container">
        <div class="nav-wrapper">
            
            <!-- Logo Kiri -->
            <a href="{{ route('home') }}" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-home"></i>
                </div>
                <span class="logo-text">
                    Dahlan<span class="logo-highlight">Property</span>
                </span>
            </a>

            <!-- Menu Tengah -->
            <div class="nav-menu">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>
                <a href="{{ route('properties.index') }}" class="nav-link {{ request()->routeIs('properties.*') ? 'active' : '' }}">
                    Properties
                </a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    About
                </a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    Contact
                </a>
                
                @auth
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                @endauth
            </div>

            <!-- Bagian Kanan -->
            <div class="nav-right">
                @auth
                    <!-- User sudah login -->
                    <div class="dropdown">
                        <button class="dropdown-trigger">
                            <div class="avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <span class="username">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down chevron"></i>
                        </button>
                        
                        <div class="dropdown-menu">
                            <div class="dropdown-header">
                                <p class="user-name">{{ Auth::user()->name }}</p>
                                <p class="user-email">{{ Auth::user()->email }}</p>
                            </div>
                            
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <div class="item-icon profile">
                                    <i class="fas fa-user-edit"></i>
                                </div>
                                <div class="item-text">
                                    <p class="item-title">Profile</p>
                                    <p class="item-desc">Edit profil Anda</p>
                                </div>
                            </a>
                            
                            <a href="{{ route('booking.index') }}" class="dropdown-item">
                                <div class="item-icon booking">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                                <div class="item-text">
                                    <p class="item-title">My Bookings</p>
                                    <p class="item-desc">Lihat booking Anda</p>
                                </div>
                            </a>
                            
                            <div class="dropdown-divider"></div>
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item logout-btn">
                                    <div class="item-icon logout">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </div>
                                    <div class="item-text">
                                        <p class="item-title">Logout</p>
                                        <p class="item-desc">Akhiri sesi Anda</p>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- User belum login -->
                    <div class="auth-buttons">
                        <a href="{{ route('login') }}" class="login-link">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="register-btn">
                            <i class="fas fa-user-plus"></i>Register
                        </a>
                    </div>
                @endauth

                <!-- Mobile Menu Button -->
                <button class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu hidden">
        <div class="mobile-menu-content">
            <a href="{{ route('home') }}" class="mobile-link">Home</a>
            <a href="{{ route('properties.index') }}" class="mobile-link">Properties</a>
            <a href="{{ route('about') }}" class="mobile-link">About</a>
            <a href="{{ route('contact') }}" class="mobile-link">Contact</a>
            @auth
                <a href="{{ route('dashboard') }}" class="mobile-link">Dashboard</a>
                <div class="mobile-divider"></div>
                <a href="{{ route('profile.edit') }}" class="mobile-link">
                    <i class="fas fa-user-edit mr-2"></i> Profile
                </a>
                <a href="{{ route('booking.index') }}" class="mobile-link">
                    <i class="fas fa-calendar-check mr-2"></i> My Bookings
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="mobile-link text-red-600">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>