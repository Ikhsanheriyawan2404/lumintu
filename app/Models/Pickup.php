<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'status',
        'date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function valet()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
