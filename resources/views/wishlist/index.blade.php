@extends('layouts.app')

@section('title', 'Wishlist - Dahlan Property')

@section('styles')
    @include('partials.css.wishlist-css')
@endsection

@section('content')
<div class="wishlist-container">
    <div class="container">
        <!-- Header -->
        <div class="wishlist-header">
            <h1>
                <i class="fas fa-heart"></i> 
                Properti Favorit
                @if(isset($wishlists) && $wishlists->count() > 0)
                    <span class="wishlist-count">{{ $wishlists->count() }} Properti</span>
                @endif
            </h1>
            <p>Properti yang Anda simpan untuk dilihat nanti</p>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Content -->
        @if(isset($wishlists) && $wishlists->count() > 0)
            <div class="property-grid">
                @foreach($wishlists as $wishlist)
                    <div class="wishlist-card">
                        <div class="card-image">
                            <img src="{{ $wishlist->property->image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994' }}" 
                                 alt="{{ $wishlist->property->title }}">
                            <span class="card-badge">{{ $wishlist->property->type }}</span>
                            
                            <form action="{{ route('wishlist.destroy', $wishlist) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="remove-btn" title="Hapus dari wishlist">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </div>
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $wishlist->property->title }}</h5>
                            
                            <div class="card-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $wishlist->property->city }}</span>
                            </div>
                            
                            <div class="card-price">
                                Rp {{ number_format($wishlist->property->price, 0, ',', '.') }}
                            </div>
                            
                            <div class="property-features">
                                @if($wishlist->property->bedrooms)
                                    <span>
                                        <i class="fas fa-bed"></i> {{ $wishlist->property->bedrooms }} KT
                                    </span>
                                @endif
                                
                                @if($wishlist->property->bathrooms)
                                    <span>
                                        <i class="fas fa-bath"></i> {{ $wishlist->property->bathrooms }} KM
                                    </span>
                                @endif
                                
                                @if($wishlist->property->area)
                                    <span>
                                        <i class="fas fa-vector-square"></i> {{ $wishlist->property->area }} m²
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <a href="{{ route('properties.show', $wishlist->property) }}" class="btn-detail">
                                <span>Lihat Detail</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            
                            <span class="time-ago">
                                {{ $wishlist->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="empty-wishlist">
                <div class="empty-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Belum Ada Properti Favorit</h3>
                <p>Jelajahi properti kami dan klik ikon ❤️ untuk menyimpan properti incaran Anda</p>
                <a href="{{ route('properties.index') }}" class="btn-explore">
                    <span>Jelajahi Properti</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
    @include('partials.js.wishlist-js')
@endsection