@extends('layouts.app')

@section('title', 'Dashboard - Dahlan Property')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
<div class="space-y-8 animate-slideIn">
    
    <!-- Greeting Card -->
    <div class="gradient-primary rounded-3xl soft-shadow p-8 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-20 -mt-20 animate-float"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-10 -mb-10 animate-pulse-slow"></div>
        
        <div class="relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-lg">
                        <i class="fas fa-user-circle text-4xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold mb-2">Selamat Datang, {{ $user->name }}! 👋</h1>
                        <div class="flex flex-wrap gap-3">
                            <span class="bg-white/20 backdrop-blur-lg px-4 py-2 rounded-full text-sm">
                                <i class="far fa-calendar mr-2"></i>{{ now()->format('l, d F Y') }}
                            </span>
                            <span class="bg-white/20 backdrop-blur-lg px-4 py-2 rounded-full text-sm">
                                <i class="fas fa-building mr-2"></i>{{ $totalProperties ?? 0 }} Properti
                            </span>
                            <span class="bg-white/20 backdrop-blur-lg px-4 py-2 rounded-full text-sm">
                                <i class="fas fa-star mr-2"></i>Member since {{ $user->created_at->format('M Y') }}
                            </span>
                        </div>
                    </div>
                </div>
                <span class="bg-white/20 backdrop-blur-lg px-6 py-3 rounded-full">
                    <i class="fas fa-crown mr-2"></i>Akun Premium
                </span>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Properti -->
        <div class="glass-card rounded-2xl soft-shadow p-6 stat-card animate-scaleIn" style="animation-delay: 0.1s">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 gradient-primary rounded-xl flex items-center justify-center text-white">
                    <i class="fas fa-building text-2xl"></i>
                </div>
                <div>
                    <span class="text-sm text-gray-500 block mb-1">Total Properti</span>
                    <span class="text-3xl font-bold text-gray-900 counter-value" data-purecounter-start="0" data-purecounter-end="{{ $totalProperties ?? 0 }}" data-purecounter-duration="2">0</span>
                    <span class="text-xs text-green-500 block mt-1"><i class="fas fa-arrow-up"></i> Terdaftar</span>
                </div>
            </div>
        </div>

        <!-- Tersedia -->
        <div class="glass-card rounded-2xl soft-shadow p-6 stat-card animate-scaleIn" style="animation-delay: 0.2s">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 gradient-success rounded-xl flex items-center justify-center text-white">
                    <i class="fas fa-check-circle text-2xl"></i>
                </div>
                <div>
                    <span class="text-sm text-gray-500 block mb-1">Tersedia</span>
                    <span class="text-3xl font-bold text-gray-900">0</span>
                    <span class="text-xs text-gray-500 block mt-1"><i class="fas fa-clock"></i> Siap disewa</span>
                </div>
            </div>
        </div>

        <!-- Disewa -->
        <div class="glass-card rounded-2xl soft-shadow p-6 stat-card animate-scaleIn" style="animation-delay: 0.3s">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 gradient-warning rounded-xl flex items-center justify-center text-white">
                    <i class="fas fa-clock text-2xl"></i>
                </div>
                <div>
                    <span class="text-sm text-gray-500 block mb-1">Disewa</span>
                    <span class="text-3xl font-bold text-gray-900">0</span>
                    <span class="text-xs text-gray-500 block mt-1"><i class="fas fa-calendar"></i> Dalam masa sewa</span>
                </div>
            </div>
        </div>

        <!-- Pendapatan -->
        <div class="glass-card rounded-2xl soft-shadow p-6 stat-card animate-scaleIn" style="animation-delay: 0.4s">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 gradient-info rounded-xl flex items-center justify-center text-white">
                    <i class="fas fa-dollar-sign text-2xl"></i>
                </div>
                <div>
                    <span class="text-sm text-gray-500 block mb-1">Pendapatan</span>
                    <span class="text-3xl font-bold text-gray-900">Rp {{ number_format($totalSpending ?? 0, 0, ',', '.') }}</span>
                    <span class="text-xs text-green-500 block mt-1"><i class="fas fa-chart-line"></i> Bulan ini</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Distribution Chart -->
        <div class="glass-card rounded-2xl soft-shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 gradient-primary rounded-lg flex items-center justify-center text-white">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900">Distribusi Properti</h3>
                </div>
                <span class="bg-gray-100 px-4 py-2 rounded-full text-sm font-medium">5 Tipe Bangunan</span>
            </div>
            <div id="distributionChart" style="height: 300px;"></div>
        </div>

        <!-- Status Chart -->
        <div class="glass-card rounded-2xl soft-shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 gradient-success rounded-lg flex items-center justify-center text-white">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900">Status Properti</h3>
                </div>
                <span class="bg-gray-100 px-4 py-2 rounded-full text-sm font-medium">Real-time</span>
            </div>
            <div id="statusChart" style="height: 300px;"></div>
        </div>
    </div>

    <!-- Property Types -->
    <div class="glass-card rounded-2xl soft-shadow p-6">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 gradient-warning rounded-lg flex items-center justify-center text-white">
                    <i class="fas fa-tags"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-900">Portfolio Bangunan Premium</h3>
            </div>
            <span class="bg-gray-100 px-4 py-2 rounded-full text-sm font-medium">
                <i class="fas fa-star text-yellow-500 mr-1"></i>5 Tipe
            </span>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
            <!-- Rumah -->
            <div class="bg-gray-50 rounded-xl p-4 text-center hover:soft-shadow transition-all duration-300">
                <i class="fas fa-home text-3xl text-blue-600 mb-2"></i>
                <h4 class="font-semibold text-gray-900">Rumah</h4>
                <span class="text-2xl font-bold text-gray-900 block">0</span>
                <span class="text-xs text-gray-500">UNIT</span>
            </div>
            
            <!-- Apartemen -->
            <div class="bg-gray-50 rounded-xl p-4 text-center hover:soft-shadow transition-all duration-300">
                <i class="fas fa-building text-3xl text-cyan-600 mb-2"></i>
                <h4 class="font-semibold text-gray-900">Apartemen</h4>
                <span class="text-2xl font-bold text-gray-900 block">0</span>
                <span class="text-xs text-gray-500">UNIT</span>
            </div>
            
            <!-- Ruko -->
            <div class="bg-gray-50 rounded-xl p-4 text-center hover:soft-shadow transition-all duration-300">
                <i class="fas fa-store text-3xl text-green-600 mb-2"></i>
                <h4 class="font-semibold text-gray-900">Ruko</h4>
                <span class="text-2xl font-bold text-gray-900 block">0</span>
                <span class="text-xs text-gray-500">UNIT</span>
            </div>
            
            <!-- Kantor -->
            <div class="bg-gray-50 rounded-xl p-4 text-center hover:soft-shadow transition-all duration-300">
                <i class="fas fa-briefcase text-3xl text-yellow-600 mb-2"></i>
                <h4 class="font-semibold text-gray-900">Kantor</h4>
                <span class="text-2xl font-bold text-gray-900 block">0</span>
                <span class="text-xs text-gray-500">UNIT</span>
            </div>
            
            <!-- Villa -->
            <div class="bg-gray-50 rounded-xl p-4 text-center hover:soft-shadow transition-all duration-300">
                <i class="fas fa-umbrella-beach text-3xl text-orange-600 mb-2"></i>
                <h4 class="font-semibold text-gray-900">Villa</h4>
                <span class="text-2xl font-bold text-gray-900 block">0</span>
                <span class="text-xs text-gray-500">UNIT</span>
            </div>
        </div>
    </div>

    <!-- Bookings Section -->
    <div class="glass-card rounded-2xl soft-shadow p-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 gradient-info rounded-lg flex items-center justify-center text-white">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div>
                    <h3 class="font-bold text-lg text-gray-900">Riwayat Booking</h3>
                    <p class="text-sm text-gray-500">Total {{ $totalBookings ?? 0 }} booking</p>
                </div>
            </div>
            <a href="{{ route('properties.index') }}" class="gradient-primary text-white px-6 py-3 rounded-xl soft-shadow hover:soft-shadow transition-all duration-300 flex items-center gap-2">
                <i class="fas fa-plus"></i>
                <span>Booking Baru</span>
            </a>
        </div>

        <!-- Booking Stats -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-gray-50 rounded-xl p-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 gradient-primary rounded-lg flex items-center justify-center text-white">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500 block">Total</span>
                        <span class="text-2xl font-bold text-gray-900 counter-value" data-purecounter-start="0" data-purecounter-end="{{ $totalBookings ?? 0 }}" data-purecounter-duration="2">0</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 gradient-warning rounded-lg flex items-center justify-center text-white">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500 block">Pending</span>
                        <span class="text-2xl font-bold text-gray-900 counter-value" data-purecounter-start="0" data-purecounter-end="{{ $pendingBookings ?? 0 }}" data-purecounter-duration="2">0</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 gradient-success rounded-lg flex items-center justify-center text-white">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500 block">Selesai</span>
                        <span class="text-2xl font-bold text-gray-900 counter-value" data-purecounter-start="0" data-purecounter-end="{{ $successBookings ?? 0 }}" data-purecounter-duration="2">0</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 gradient-danger rounded-lg flex items-center justify-center text-white">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500 block">Gagal</span>
                        <span class="text-2xl font-bold text-gray-900">0</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking Chart -->
        <div class="mb-6">
            <div id="bookingChart" style="height: 300px;"></div>
        </div>

        <!-- Booking Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">ID</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Property</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Tanggal</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Total</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Status</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentBookings ?? [] as $booking)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 text-sm">#{{ $booking->id }}</td>
                        <td class="px-4 py-3">
                            <div class="font-medium">{{ $booking->property->title ?? '-' }}</div>
                            <div class="text-xs text-gray-500">{{ $booking->property->location ?? '-' }}</div>
                        </td>
                        <td class="px-4 py-3 text-sm">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                        <td class="px-4 py-3 text-sm font-medium text-green-600">Rp {{ number_format($booking->total_price ?? 0, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">
                            @php
                                $statusClass = '';
                                $statusText = '';
                                if($booking->status == 'pending') {
                                    $statusClass = 'badge-warning';
                                    $statusText = 'Pending';
                                } elseif($booking->status == 'success') {
                                    $statusClass = 'badge-success';
                                    $statusText = 'Sukses';
                                } elseif($booking->status == 'cancelled') {
                                    $statusClass = 'badge-danger';
                                    $statusText = 'Dibatalkan';
                                } else {
                                    $statusClass = 'badge-primary';
                                    $statusText = $booking->status ?? 'Unknown';
                                }
                            @endphp
                            <span class="badge {{ $statusClass }}">{{ $statusText }}</span>
                        </td>
                        <td class="px-4 py-3">
                            {{-- ✅ DIPERBAIKI: bookings.show → booking.show --}}
                            <a href="{{ route('booking.show', $booking->id) }}" class="text-blue-600 hover:text-blue-800 transition-colors">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                            <i class="fas fa-calendar-times text-4xl mb-3"></i>
                            <p>Belum ada booking</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="glass-card rounded-2xl soft-shadow p-6 flex flex-col sm:flex-row justify-between items-center gap-4">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 gradient-warning rounded-xl flex items-center justify-center text-white animate-float">
                <i class="fas fa-bolt text-xl"></i>
            </div>
            <div>
                <h4 class="font-bold text-gray-900">Akses Cepat</h4>
                <p class="text-sm text-gray-500">Kelola properti Anda dengan cepat dan mudah</p>
            </div>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('properties.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-300 flex items-center gap-2">
                <i class="fas fa-list"></i>
                <span>Semua Properti</span>
            </a>
            <a href="{{ route('properties.create') }}" class="gradient-primary text-white px-6 py-3 rounded-xl soft-shadow hover:soft-shadow transition-all duration-300 flex items-center gap-2">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Properti</span>
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        initDashboardCharts();
        initCounters();
    });
</script>
@endsection