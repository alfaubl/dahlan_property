<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'property_code', 'title', 'slug', 'type', 'description', 'address',
        'city', 'province', 'postal_code', 'price', 'area', 'bedrooms',
        'bathrooms', 'garages', 'year_built', 'amenities', 'images',
        'status', 'purpose', 'user_id', 'featured', 'views'
    ];

    protected $casts = [
        'amenities' => 'array',
        'images' => 'array',
        'price' => 'decimal:2',
        'area' => 'decimal:2',
        'featured' => 'boolean',
    ];

    // ✅ Relationships (TAMBAH wishlists)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ✅ TAMBAH INI untuk Wishlist
    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    // ✅ Scopes (TETAP SAMA - TIDAK DIUBAH)
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeForSale($query)
    {
        return $query->where('purpose', 'sale')->orWhere('purpose', 'both');
    }

    public function scopeForRent($query)
    {
        return $query->where('purpose', 'rent')->orWhere('purpose', 'both');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    // ✅ Mutators (TETAP SAMA - TIDAK DIUBAH)
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getMainImageAttribute()
    {
        $images = $this->images ?? [];
        return !empty($images) ? $images[0] : asset('images/default-property.jpg');
    }

    // ✅ TAMBAH INI untuk Wishlist (Helper Method)
    public function isFavorite($userId)
    {
        return $this->wishlists()->where('user_id', $userId)->exists();
    }

    public function favoriteCount()
    {
        return $this->wishlists()->count();
    }
}