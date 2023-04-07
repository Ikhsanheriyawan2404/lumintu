<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BridgeOrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_customer_id',
        'qty',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product_customer()
    {
        return $this->belongsTo(ProductCustomer::class);
    }
}
