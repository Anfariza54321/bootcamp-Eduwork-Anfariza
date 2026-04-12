<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'users_id',
        'order_number',
        'products_id',
        'status',
        'quantity',
        'total',
        'payment_method', // Tambahkan ini
        'account_name'    // Tambahkan ini
    ];
}
