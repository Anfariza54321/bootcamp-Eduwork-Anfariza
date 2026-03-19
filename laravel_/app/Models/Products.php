<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;

class Products extends Model
{
    public function products()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
