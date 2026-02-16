<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'booking_id',
        'order_id',
        'transaction_id',
        'amount',
        'payment_type',
        'status',
        'payment_method',
        'midtrans_response'
    ];

    protected $casts = [
        'midtrans_response' => 'array',
        'amount' => 'decimal:2'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}