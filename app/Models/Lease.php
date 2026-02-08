<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User; // ← IMPORT
use App\Models\Property; // ← IMPORT
use App\Models\Tenant; // ← IMPORT

class Lease extends Model
{
    use HasFactory, SoftDeletes;

    // ... fields ...

    public function property()
    {
        return $this->belongsTo(\App\Models\Property::class);
    }

    public function tenant()
    {
        return $this->belongsTo(\App\Models\Tenant::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }
}