<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User; // ← IMPORT

class Tenant extends Model
{
    use HasFactory, SoftDeletes;

    // ... fields ...

    public function createdBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function leases()
    {
        return $this->hasMany(\App\Models\Lease::class);
    }
}