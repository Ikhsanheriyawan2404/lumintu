<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'supervisor_id',
        'total_price',
        'discount',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function order_details()
    {
        return $this->hasMany(BridgeOrderProduct::class);
    }

    public function order_status()
    {
        return $this->hasMany(OrderStatus::class);
    }
}
