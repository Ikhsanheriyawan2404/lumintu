<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'supervisor_id',
        'total_price',
        'order_date',
        'estimate_date',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'status' => OrderStatusEnum::class
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
