<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm py-2" id="mainNavbar">
    <div class="container">
        <!-- Brand/Logo -->
        <a class="navbar-brand" href="/">
            <div class="d-flex align-items-center">
                <div class="brand-icon me-2 shadow-sm">
                    <i class="fas fa-building"></i>
                </div>
                <div>
                    <span class="brand-text brand-text-dark">Dahlan</span>
                    <span class="brand-text brand-text-primary">Property</span>
                    <small class="d-block brand-subtitle">Marketplace Properti</small>
                </div>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto align-items-center">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                    <i class="fas fa-home"></i> Beranda
                </a>
                
                <a class="nav-link {{ request()->is('properties') ? 'active' : '' }}" href="/properties">
                    <i class="fas fa-search"></i> Jelajahi
                </a>
                
                <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">
                    <i class="fas fa-info-circle"></i> Tentang
                </a>
                
                <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">
                    <i class="fas fa-envelope"></i> Kontak
                </a>
                
                <div class="vr mx-2 d-none d-lg-block" style="height: 18px;"></div>
                
                @auth
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                            <li><a class="dropdown-item" href="/profile"><i class="fas fa-user me-2"></i>Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>Keluar
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a class="nav-link" href="/login">
                        <i class="fas fa-sign-in-alt"></i> Masuk
                    </a>
                    
                    <a class="btn btn-primary btn-glow btn-premium" href="/register">
                        <i class="fas fa-plus-circle me-1"></i> Pasang Iklan
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>