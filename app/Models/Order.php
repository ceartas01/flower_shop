<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'total_amount',
        'status',
        'shipping_address',
        'customer_name',
        'customer_phone',
        'customer_email',
        'notes'
    ];

    // Связь: заказ принадлежит пользователю
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}