<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function products()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function category() {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
