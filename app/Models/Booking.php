<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'property_id',
        'booking_code',
        'booking_date',
        'booking_time',
        'status',
        'notes',
        'total_price',  
        'paid_at'  
    ];

    protected $casts = [
        'booking_date' => 'date',
        'booking_time' => 'string',  
        'paid_at' => 'datetime',  
        'total_price' => 'decimal:2'  
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}