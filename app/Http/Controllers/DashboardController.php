<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'avatar',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    // ✅ RELASI KE PROPERTIES
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    // ✅ RELASI KE CARTS (YANG INI HARUS DITAMBAH!)
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // ✅ METHOD LAINNYA
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isActive(): bool
    {
        return $this->is_active === true;
    }
}