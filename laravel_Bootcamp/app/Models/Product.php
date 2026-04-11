<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['nama', 'slug', 'harga', 'stok', 'merek_id', 'gambar', 'deskripsi', 'click'];

    public function merek()
    {
        return $this->belongsTo(Merek::class, 'merek_id', 'id');
    }
}
