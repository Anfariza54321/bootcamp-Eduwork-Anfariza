<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'nama' => 'Adidas Samba OG',
                'deskripsi' => 'Nikmati kenyamanan maksimal dengan Adidas. Dibuat dengan material berkualitas tinggi yang memberikan durabilitas serta gaya modern yang cocok untuk aktivitas harian Anda.',
                'stok' => 8,
                'image' => 'Adidas.jpg'
            ],
            [
                'id' => 2,
                'nama' => 'Puma Deviate Nitro 2',
                'deskripsi' => 'Nikmati kenyamanan maksimal dengan Puma. Dibuat dengan material berkualitas tinggi yang memberikan durabilitas serta gaya modern yang cocok untuk aktivitas harian Anda.',
                'stok' => 5,
                'image' => 'Puma.jpg'
            ],
            [
                'id' => 3,
                'nama' => 'Nike Air Jordan 1 Low',
                'deskripsi' => 'Nikmati kenyamanan maksimal dengan Nike. Dibuat dengan material berkualitas tinggi yang memberikan durabilitas serta gaya modern yang cocok untuk aktivitas harian Anda.',
                'stok' => 3,
                'image' => 'Nike.jpg'
            ]
        ]);
    }
}
