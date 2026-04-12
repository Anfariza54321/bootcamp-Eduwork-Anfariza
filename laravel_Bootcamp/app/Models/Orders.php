<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'users_id',
        'order_number',
        'products_id',
        'status',
        'quantity',
        'total',
        'payment_method', // Tambahkan ini
        'account_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }
}
