<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Property extends Model
{
    use HasFactory, SoftDeletes;

     protected $fillable = [
        'property_code', 'name', 'type', 'address', 'city', 'province', 
        'postal_code', 'price', 'rental_price', 'area', 'bedrooms', 
        'bathrooms', 'floors', 'year_built', 'amenities', 'images', 
        'description', 'status', 'listing_type', 'owner_id', 'managed_by'
    ];

    protected $casts = [
        'amenities' => 'array',
        'images' => 'array',
        'price' => 'decimal:2',
        'rental_price' => 'decimal:2',
        'area' => 'decimal:2'
    ];

    // Relationship dengan Owner
    public function owner()
    {
        return $this->belongsTo(\App\Models\User::class, 'owner_id');
    }

    // Relationship dengan Manager
    public function manager()
    {
        return $this->belongsTo(\App\Models\User::class, 'managed_by');
    }

    // Relationship dengan Tenants (melalui leases)
    public function leases()
    {
        return $this->hasMany(Lease::class);
    }

    // Relationship dengan Payments
    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Lease::class);
    }

    // Scope untuk properti tersedia
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    // Scope untuk properti dijual
    public function scopeForSale($query)
    {
        return $query->where('listing_type', 'sale')->orWhere('listing_type', 'both');
    }

    // Scope untuk properti disewa
    public function scopeForRent($query)
    {
        return $query->where('listing_type', 'rent')->orWhere('listing_type', 'both');
    }
}
