<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCustomer extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'price',
    ];

    public function product()
    {
        // with no trashed
        return $this->belongsTo(Product::class);
    }

    public function user_details()
    {
        return $this->belongsTo(User::class);
    }
}
