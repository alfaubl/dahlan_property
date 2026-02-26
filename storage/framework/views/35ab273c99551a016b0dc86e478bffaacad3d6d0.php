

<?php $__env->startSection('title', 'Dahlan Property - Marketplace Properti Terbaik'); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/welcome.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-16 animate-slideIn">
    
    <!-- ===== HERO SECTION ===== -->
    <section class="relative overflow-hidden rounded-3xl soft-shadow min-h-[500px] flex items-center gradient-primary">
        <!-- Animated Background -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-white opacity-10 rounded-full -mr-20 -mt-20 animate-float"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-white opacity-10 rounded-full -ml-20 -mb-20 animate-pulse-slow"></div>
        
        <!-- Hero Content -->
        <div class="relative z-10 container mx-auto px-6 py-16 text-white text-center">
            <div class="max-w-3xl mx-auto">
                <span class="inline-block bg-white/20 backdrop-blur-lg px-6 py-3 rounded-full text-sm font-semibold mb-8 animate-scaleIn">
                    <i class="fas fa-crown text-yellow-300 mr-2"></i>
                    Premium Property Marketplace
                </span>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                    Temukan Properti 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-pink-300">Impian</span>
                    Anda
                </h1>
                
                <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                    Platform properti terpercaya dengan ribuan pilihan rumah, apartemen, ruko, dan villa di seluruh Indonesia
                </p>
                
                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1 relative">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" 
                                   placeholder="Cari properti berdasarkan lokasi, nama, atau tipe..."
                                   class="w-full pl-12 pr-4 py-4 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-white/30 transition-all">
                        </div>
                        <button class="bg-white text-primary px-8 py-4 rounded-xl font-semibold hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                            <i class="fas fa-search"></i>
                            <span>Cari</span>
                        </button>
                    </div>
                </div>

                <!-- Stats Counter -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12">
                    <div class="text-center">
                        <div class="text-3xl font-bold counter-value" data-purecounter-start="0" data-purecounter-end="1500" data-purecounter-duration="3">0</div>
                        <div class="text-white/80 text-sm">Properti</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold counter-value" data-purecounter-start="0" data-purecounter-end="500" data-purecounter-duration="3">0</div>
                        <div class="text-white/80 text-sm">Kota</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold counter-value" data-purecounter-start="0" data-purecounter-end="2500" data-purecounter-duration="3">0</div>
                        <div class="text-white/80 text-sm">Klien</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold counter-value" data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="3">0</div>
                        <div class="text-white/80 text-sm">Tahun</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FITUR SECTION ===== -->
    <section class="py-16">
        <div class="text-center mb-12">
            <span class="gradient-primary text-white px-6 py-2 rounded-full text-sm font-semibold inline-block mb-4">MENGAPA MEMILIH KAMI</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Kenapa Harus DahlanProperty?</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Kami memberikan pengalaman terbaik dalam mencari properti impian Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Fitur 1 -->
            <div class="glass-card rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-300 group">
                <div class="w-20 h-20 gradient-primary rounded-2xl flex items-center justify-center text-white text-3xl mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">100% Terpercaya</h3>
                <p class="text-gray-600 leading-relaxed">Semua properti terverifikasi dan legalitas terjamin. Kami pastikan keamanan transaksi Anda.</p>
            </div>

            <!-- Fitur 2 -->
            <div class="glass-card rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-300 group">
                <div class="w-20 h-20 gradient-success rounded-2xl flex items-center justify-center text-white text-3xl mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">24/7 Layanan</h3>
                <p class="text-gray-600 leading-relaxed">Tim customer service kami siap membantu Anda kapan saja, di mana saja.</p>
            </div>

            <!-- Fitur 3 -->
            <div class="glass-card rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-300 group">
                <div class="w-20 h-20 gradient-warning rounded-2xl flex items-center justify-center text-white text-3xl mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Harga Terbaik</h3>
                <p class="text-gray-600 leading-relaxed">Dapatkan penawaran harga terbaik dan promo menarik untuk setiap transaksi.</p>
            </div>
        </div>
    </section>

    <!-- ===== APEXCHARTS SECTION ===== -->
    <section class="py-16">
        <div class="glass-card rounded-3xl p-8 md:p-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div>
                    <span class="gradient-primary text-white px-6 py-2 rounded-full text-sm font-semibold inline-block mb-4">STATISTIK PROPERTI</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Pertumbuhan Properti di Indonesia</h2>
                    <p class="text-gray-600 mb-8 text-lg leading-relaxed">
                        Pasar properti di Indonesia terus berkembang pesat. Lihat distribusi dan pertumbuhan properti berdasarkan tipe bangunan.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-2 h-2 rounded-full bg-primary"></div>
                            <span class="text-gray-700">Pertumbuhan 25% per tahun</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-2 h-2 rounded-full bg-success"></div>
                            <span class="text-gray-700">Lebih dari 1500 properti tersedia</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-2 h-2 rounded-full bg-warning"></div>
                            <span class="text-gray-700">Tersebar di 500 kota</span>
                        </div>
                    </div>

                    <div class="mt-8 flex gap-4">
                        <a href="<?php echo e(route('properties.index')); ?>" class="gradient-primary text-white px-8 py-4 rounded-xl soft-shadow hover:soft-shadow transition-all duration-300">
                            Lihat Properti
                        </a>
                        <a href="<?php echo e(route('contact')); ?>" class="bg-gray-100 text-gray-700 px-8 py-4 rounded-xl hover:bg-gray-200 transition-all duration-300">
                            Hubungi Kami
                        </a>
                    </div>
                </div>

                <!-- Right Chart - ApexCharts -->
                <div>
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-bold text-gray-900">Distribusi Properti</h3>
                            <span class="text-sm text-gray-500">2024</span>
                        </div>
                        <div id="distributionChart" class="w-full" style="height: 350px;"></div>
                        
                        <!-- Legend -->
                        <div class="flex flex-wrap justify-center gap-4 mt-4">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-sm" style="background: #4361ee;"></span>
                                <span class="text-xs text-gray-600">Rumah</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-sm" style="background: #06d6a0;"></span>
                                <span class="text-xs text-gray-600">Apartemen</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-sm" style="background: #ffb703;"></span>
                                <span class="text-xs text-gray-600">Ruko</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-sm" style="background: #ef476f;"></span>
                                <span class="text-xs text-gray-600">Kantor</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-sm" style="background: #4cc9f0;"></span>
                                <span class="text-xs text-gray-600">Villa</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== PROPERTIES GRID ===== -->
    <section class="py-16">
        <div class="text-center mb-12">
            <span class="gradient-primary text-white px-6 py-2 rounded-full text-sm font-semibold inline-block mb-4">PROPERTI PILIHAN</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Properti Unggulan</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Temukan properti terbaik dengan fasilitas premium</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Property Card 1 -->
            <div class="glass-card rounded-2xl overflow-hidden group cursor-pointer">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994" alt="Property" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-4 py-2 rounded-full">
                        <span class="text-primary font-semibold">Rp 2.5M</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Villa Eksklusif Bali</h3>
                    <p class="text-gray-600 mb-4 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-primary"></i>
                        JL. Raya Uluwatu, Badung
                    </p>
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <span><i class="fas fa-bed text-primary mr-1"></i> 4 KT</span>
                        <span><i class="fas fa-bath text-primary mr-1"></i> 3 KM</span>
                        <span><i class="fas fa-vector-square text-primary mr-1"></i> 250 m²</span>
                    </div>
                </div>
            </div>

            <!-- Property Card 2 -->
            <div class="glass-card rounded-2xl overflow-hidden group cursor-pointer">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00" alt="Property" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-4 py-2 rounded-full">
                        <span class="text-primary font-semibold">Rp 8.5M</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Apartemen Mewah SCBD</h3>
                    <p class="text-gray-600 mb-4 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-primary"></i>
                        Jl. Sudirman, Jakarta Pusat
                    </p>
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <span><i class="fas fa-bed text-primary mr-1"></i> 3 KT</span>
                        <span><i class="fas fa-bath text-primary mr-1"></i> 2 KM</span>
                        <span><i class="fas fa-vector-square text-primary mr-1"></i> 150 m²</span>
                    </div>
                </div>
            </div>

            <!-- Property Card 3 -->
            <div class="glass-card rounded-2xl overflow-hidden group cursor-pointer">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750" alt="Property" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-4 py-2 rounded-full">
                        <span class="text-primary font-semibold">Rp 1.2M</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Rumah Modern BSD</h3>
                    <p class="text-gray-600 mb-4 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-primary"></i>
                        BSD City, Tangerang
                    </p>
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <span><i class="fas fa-bed text-primary mr-1"></i> 4 KT</span>
                        <span><i class="fas fa-bath text-primary mr-1"></i> 3 KM</span>
                        <span><i class="fas fa-vector-square text-primary mr-1"></i> 200 m²</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo e(route('properties.index')); ?>" class="inline-flex items-center gap-2 gradient-primary text-white px-8 py-4 rounded-xl soft-shadow hover:soft-shadow transition-all duration-300">
                <span>Lihat Semua Properti</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- ===== CTA SECTION ===== -->
    <section class="gradient-primary rounded-3xl soft-shadow p-16 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-20 -mt-20 animate-float"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-10 -mb-10 animate-pulse-slow"></div>
        
        <div class="relative z-10 text-center text-white max-w-3xl mx-auto">
            <h2 class="text-4xl font-bold mb-6">Siap Menemukan Properti Impian?</h2>
            <p class="text-xl text-white/90 mb-8">Bergabung dengan ribuan klien yang telah menemukan properti impian mereka bersama kami</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo e(route('register')); ?>" class="bg-white text-primary px-8 py-4 rounded-xl font-semibold hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                    Daftar Sekarang
                </a>
                <a href="<?php echo e(route('contact')); ?>" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-xl font-semibold hover:bg-white hover:text-primary transition-all duration-300">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs@1.5.0/dist/purecounter_vanilla.js"></script>
<script src="<?php echo e(asset('assets/js/welcome.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/welcome.blade.php ENDPATH**/ ?>