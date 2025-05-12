<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'payment_method',
        'payment_status',
        'transaction_id',
        'amount',
        'paid_at'
    ];

    protected $dates = [
        'paid_at'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
