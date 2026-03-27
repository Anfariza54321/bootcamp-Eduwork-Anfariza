<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'nama' => 'Nike',
                'slug' => Str::slug('Nike'),
                'jumlah' => 9
            ],
            [
                'id' => 2,
                'nama' => 'Adidas',
                'slug' => Str::slug('Adidas'),
                'jumlah' => 8
            ],
            [
                'id' => 3,
                'nama' => 'Puma',
                'slug' => Str::slug('Puma'),
                'jumlah' => 12
            ]
        ]);
    }
}
