<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Products;

class ProductCategory extends Model
{
    public function category() {
        return $this->hasMany(Products::class);
    }
}
