<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'property_id',
        'booking_code',
        'booking_date',
        'booking_time',
        'status',
        'notes'
    ];

    protected $casts = [
        'booking_date' => 'date',
        'booking_time' => 'datetime:H:i'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}