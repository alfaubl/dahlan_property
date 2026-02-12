@extends('layouts.app')

@section('title', 'Dashboard - Dahlan Property')

@section('styles')
<style>
    .dashboard-hero {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
        color: white;
        padding: 60px 0 40px;
        margin-top: 76px;
        border-radius: 0 0 30px 30px;
    }
    
    .stats-card {
        border-radius: 15px;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        height: 100%;
    }
    
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        border-color: #0d6efd;
    }
    
    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 15px;
    }
    
    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        line-height: 1;
    }
    
    .quick-actions .btn {
        border-radius: 12px;
        padding: 12px 20px;
        font-weight: 500;
    }
    
    .recent-properties .property-item {
        border-radius: 12px;
        transition: all 0.3s ease;
        padding: 15px;
    }
    
    .recent-properties .property-item:hover {
        background: #f8f9fa;
        transform: translateX(5px);
    }
    
    .badge-status {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    @media (max-width: 768px) {
        .dashboard-hero {
            padding: 40px 0 30px;
            border-radius: 0 0 20px 20px;
        }
        
        .stats-number {
            font-size: 2rem;
        }
    }
</style>
@endsection

@section('content')
<!-- ========== HERO SECTION ========== -->
<section class="dashboard-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-3">Selamat Datang, {{ Auth::user()->name }}! 👋</h1>
                <p class="lead mb-0">Kelola properti Anda dan temukan peluang baru di platform kami.</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('properties.create') }}" class="btn btn-light btn-glow">
                    <i class="fas fa-plus-circle me-2"></i>Tambah Properti Baru
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ========== MAIN DASHBOARD CONTENT ========== -->
<section class="py-5">
    <div class="container">
        <!-- Stats Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="stats-card p-4 border text-center">
                    <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="stats-number mb-2">{{ $properties->total() }}</div>
                    <h5 class="text-muted mb-0">Total Properti</h5>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="stats-card p-4 border text-center">
                    <div class="stats-icon bg-success bg-opacity-10 text-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stats-number mb-2">{{ $properties->where('status', 'available')->count() }}</div>
                    <h5 class="text-muted mb-0">Tersedia</h5>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="stats-card p-4 border text-center">
                    <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stats-number mb-2">{{ $properties->where('status', 'pending')->count() }}</div>
                    <h5 class="text-muted mb-0">Menunggu</h5>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="stats-card p-4 border text-center">
                    <div class="stats-icon bg-info bg-opacity-10 text-info">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="stats-number mb-2">{{ $properties->sum('views') ?? 0 }}</div>
                    <h5 class="text-muted mb-0">Total Views</h5>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="row mb-5">
            <div class="col-12">
                <h3 class="fw-bold mb-4">Aksi Cepat</h3>
                <div class="quick-actions d-flex flex-wrap gap-3">
                    <a href="{{ route('properties.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Properti
                    </a>
                    <a href="{{ route('properties.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-search me-2"></i>Jelajahi Properti
                    </a>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-user-edit me-2"></i>Edit Profil
                    </a>
                    <a href="/contact" class="btn btn-outline-success">
                        <i class="fas fa-headset me-2"></i>Bantuan
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Recent Properties -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h4 class="fw-bold mb-0">Properti Terbaru Anda</h4>
                    </div>
                    <div class="card-body p-0">
                        @if($properties->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Properti</th>
                                            <th>Tipe</th>
                                            <th>Lokasi</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($properties as $property)
                                            <tr class="property-item">
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-3">
                                                            @if($property->images && count(json_decode($property->images)) > 0)
                                                                <img src="{{ json_decode($property->images)[0] }}" 
                                                                     alt="{{ $property->title }}" 
                                                                     class="rounded" 
                                                                     style="width: 60px; height: 60px; object-fit: cover;">
                                                            @else
                                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                                     style="width: 60px; height: 60px;">
                                                                    <i class="fas fa-home text-muted"></i>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <h6 class="fw-bold mb-1">{{ Str::limit($property->title, 30) }}</h6>
                                                            <small class="text-muted">ID: {{ $property->property_code }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @switch($property->type)
                                                        @case('house')
                                                            <span class="badge bg-success">Rumah</span>
                                                            @break
                                                        @case('apartment')
                                                            <span class="badge bg-info">Apartemen</span>
                                                            @break
                                                        @case('land')
                                                            <span class="badge bg-warning">Tanah</span>
                                                            @break
                                                        @default
                                                            <span class="badge bg-secondary">{{ $property->type }}</span>
                                                    @endswitch
                                                </td>
                                                <td>
                                                    <small class="text-muted">
                                                        <i class="fas fa-map-marker-alt me-1"></i>
                                                        {{ $property->city }}
                                                    </small>
                                                </td>
                                                <td class="fw-bold">
                                                    Rp {{ number_format($property->price, 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    @if($property->status == 'available')
                                                        <span class="badge-status bg-success text-white">Tersedia</span>
                                                    @elseif($property->status == 'sold')
                                                        <span class="badge-status bg-danger text-white">Terjual</span>
                                                    @elseif($property->status == 'rented')
                                                        <span class="badge-status bg-primary text-white">Disewa</span>
                                                    @else
                                                        <span class="badge-status bg-secondary text-white">{{ $property->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ route('properties.show', $property) }}" 
                                                           class="btn btn-outline-info" title="Lihat">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('properties.edit', $property) }}" 
                                                           class="btn btn-outline-warning" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('properties.destroy', $property) }}" 
                                                              method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" 
                                                                    class="btn btn-outline-danger" 
                                                                    title="Hapus"
                                                                    onclick="return confirm('Hapus properti ini?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <!-- Empty State -->
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <i class="fas fa-home fa-4x text-muted opacity-25"></i>
                                </div>
                                <h5 class="fw-bold mb-3">Belum Ada Properti</h5>
                                <p class="text-muted mb-4">
                                    Anda belum menambahkan properti apapun. Mulai dengan menambahkan properti pertama Anda.
                                </p>
                                <a href="{{ route('properties.create') }}" class="btn btn-primary btn-glow px-4">
                                    <i class="fas fa-plus-circle me-2"></i>Tambah Properti Pertama
                                </a>
                            </div>
                        @endif
                    </div>
                    @if($properties->count() > 0)
                        <div class="card-footer bg-white border-0 py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">
                                        Menampilkan {{ $properties->count() }} dari {{ $properties->total() }} properti
                                    </small>
                                </div>
                                <div>
                                    <a href="{{ route('properties.index') }}" class="btn btn-outline-primary btn-sm">
                                        Lihat Semua Properti <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Activity Summary -->
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0"><i class="fas fa-chart-line me-2 text-primary"></i>Ringkasan Aktivitas</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3 d-flex justify-content-between">
                                <span class="text-muted">Properti Ditambahkan</span>
                                <span class="fw-bold">{{ $properties->count() }}</span>
                            </li>
                            <li class="mb-3 d-flex justify-content-between">
                                <span class="text-muted">Login Terakhir</span>
                                <span class="fw-bold">{{ Auth::user()->last_login_at ? Auth::user()->last_login_at->diffForHumans() : 'Baru saja' }}</span>
                            </li>
                            <li class="mb-3 d-flex justify-content-between">
                                <span class="text-muted">Member Sejak</span>
                                <span class="fw-bold">{{ Auth::user()->created_at->format('d M Y') }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="text-muted">Email Terverifikasi</span>
                                <span class="fw-bold">
                                    @if(Auth::user()->email_verified_at)
                                        <i class="fas fa-check-circle text-success"></i>
                                    @else
                                        <a href="#" class="text-primary">Verifikasi Sekarang</a>
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0"><i class="fas fa-bullhorn me-2 text-warning"></i>Tips & Update</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info bg-light border-0">
                            <h6 class="fw-bold"><i class="fas fa-lightbulb me-2"></i>Tips Menjual Cepat</h6>
                            <p class="mb-2 small">Tambahkan foto berkualitas tinggi untuk meningkatkan minat pembeli hingga 40%.</p>
                        </div>
                        <div class="alert alert-success bg-light border-0">
                            <h6 class="fw-bold"><i class="fas fa-chart-bar me-2"></i>Statistik Market</h6>
                            <p class="mb-0 small">Harga properti di {{ Auth::user()->city ?? 'Jakarta' }} naik 15% dalam 3 bulan terakhir.</p>
                        </div>
                        <div class="text-center mt-3">
                            <a href="/blog" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-newspaper me-1"></i>Baca Artikel Lainnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Update last active time
        function updateLastActive() {
            const now = new Date();
            const options = { hour: '2-digit', minute: '2-digit' };
            document.getElementById('lastActive').textContent = now.toLocaleTimeString('id-ID', options);
        }
        
        // Update every minute
        setInterval(updateLastActive, 60000);
        updateLastActive(); // Initial call
    });
</script>
@endsection