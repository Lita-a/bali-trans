<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'car_id',
        'car_name',
        'car_image',
        'price',
        'driver_price',
        'with_driver',
        'start_date',
        'end_date',
        'days',
        'subtotal',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
