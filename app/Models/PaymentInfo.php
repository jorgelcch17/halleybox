<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_photo',
        'payment_date',
        'payment_time',
        'payment_method',
        'transaction_number',
        'comment',
        'order_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
