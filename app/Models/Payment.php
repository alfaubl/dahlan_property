<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'payment_id',
        'payment_type',
        'bank_name',
        'va_number',
        'qr_code',
        'amount',
        'status',
        'transaction_time',
        'settlement_time',
        'raw_response'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'transaction_time' => 'datetime',
        'settlement_time' => 'datetime',
        'raw_response' => 'array'
    ];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Accessors
    public function getFormattedAmountAttribute()
    {
        return 'Rp ' . number_format($this->amount, 0, ',', '.');
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'bg-warning',
            'settlement' => 'bg-success',
            'capture' => 'bg-info',
            'deny' => 'bg-danger',
            'cancel' => 'bg-secondary',
            'expire' => 'bg-dark',
            'failure' => 'bg-danger'
        ];

        return $badges[$this->status] ?? 'bg-secondary';
    }
}