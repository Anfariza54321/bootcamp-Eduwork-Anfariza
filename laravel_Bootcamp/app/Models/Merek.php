<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $table = 'merek';
    protected $fillable = ['nama', 'slug', 'jumlah'];

    public function products()
    {
        return $this->hasMany(Product::class, 'merek_id', 'id');
    }
}
