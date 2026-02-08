<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'lease_id', 'tenant_id', 'amount', 'payment_date', 
        'due_date', 'payment_method', 'status', 'midtrans_order_id',
        'midtrans_transaction_id', 'midtrans_response', 'proof_url', 'notes'
    ];
    
    protected $casts = [
        'amount' => 'decimal:2',
        'payment_date' => 'date',
        'due_date' => 'date',
        'midtrans_response' => 'array'
    ];
    
    public function lease()
    {
        return $this->belongsTo(Lease::class);
    }
    
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}