<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    // Kolom yang boleh diisi
    protected $fillable = ['nama','slug', 'categories_id', 'deskripsi', 'harga', 'stok', 'gambar'];
    
    public function category() {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
