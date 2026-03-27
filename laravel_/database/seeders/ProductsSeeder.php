<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                'slug' => Str::slug('Adidas Samba OG'),
                'deskripsi' => 'Nikmati kenyamanan maksimal dengan Adidas. Dibuat dengan material berkualitas tinggi yang memberikan durabilitas serta gaya modern yang cocok untuk aktivitas harian Anda.',
                'harga' => 1000000,
                'stok' => 8,
                'gambar' => 'adidasSOG.jpg',
                'categories_id' => 2
            ],
            [
                'id' => 2,
                'nama' => 'Puma Deviate Nitro 2',
                'slug' => Str::slug('Puma Deviate Nitro 2'),
                'deskripsi' => 'Nikmati kenyamanan maksimal dengan Puma. Dibuat dengan material berkualitas tinggi yang memberikan durabilitas serta gaya modern yang cocok untuk aktivitas harian Anda.',
                'harga' => 1500000,
                'stok' => 5,
                'gambar' => 'pumaDN2.jpg',
                'categories_id' => 3
            ],
            [
                'id' => 3,
                'nama' => 'Nike Air Jordan 1 Low',
                'slug' => Str::slug('Nike Air Jordan 1 Low'),
                'deskripsi' => 'Nikmati kenyamanan maksimal dengan Nike. Dibuat dengan material berkualitas tinggi yang memberikan durabilitas serta gaya modern yang cocok untuk aktivitas harian Anda.',
                'harga' => 1200000,
                'stok' => 3,
                'gambar' => 'nikeJ1L.jpg',
                'categories_id' => 1
            ],
            [
                'id' => 4,
                'nama' => 'Adidas Samba OG 2',
                'slug' => Str::slug('Adidas Samba OG2'),
                'deskripsi' => 'Nikmati kenyamanan maksimal dengan Adidas. Dibuat dengan material berkualitas tinggi yang memberikan durabilitas serta gaya modern yang cocok untuk aktivitas harian Anda.',
                'harga' => 1000000,
                'stok' => 8,
                'gambar' => 'adidasSOG.jpg',
                'categories_id' => 2
            ],
            [
                'id' => 5,
                'nama' => 'Puma Deviate Nitro 2',
                'slug' => Str::slug('Puma Deviate Nitro 22'),
                'deskripsi' => 'Nikmati kenyamanan maksimal dengan Puma. Dibuat dengan material berkualitas tinggi yang memberikan durabilitas serta gaya modern yang cocok untuk aktivitas harian Anda.',
                'harga' => 1500000,
                'stok' => 5,
                'gambar' => 'pumaDN2.jpg',
                'categories_id' => 3
            ],
            [
                'id' => 6,
                'nama' => 'Nike Air Jordan 1 Low',
                'slug' => Str::slug('Nike Air Jordan 1 Low2'),
                'deskripsi' => 'Nikmati kenyamanan maksimal dengan Nike. Dibuat dengan material berkualitas tinggi yang memberikan durabilitas serta gaya modern yang cocok untuk aktivitas harian Anda.',
                'harga' => 1200000,
                'stok' => 3,
                'gambar' => 'nikeJ1L.jpg',
                'categories_id' => 1
            ],
            [
                'id' => 7,
                'nama' => 'Puma Deviate Nitro 2',
                'slug' => Str::slug('Puma Deviate Nitro 23'),
                'deskripsi' => 'Nikmati kenyamanan maksimal dengan Puma. Dibuat dengan material berkualitas tinggi yang memberikan durabilitas serta gaya modern yang cocok untuk aktivitas harian Anda.',
                'harga' => 1500000,
                'stok' => 5,
                'gambar' => 'pumaDN2.jpg',
                'categories_id' => 3
            ],
            [
                'id' => 8,
                'nama' => 'Nike Air Jordan 1 Low',
                'slug' => Str::slug('Nike Air Jordan 1 Low3'),
                'deskripsi' => 'Nikmati kenyamanan maksimal dengan Nike. Dibuat dengan material berkualitas tinggi yang memberikan durabilitas serta gaya modern yang cocok untuk aktivitas harian Anda.',
                'harga' => 1200000,
                'stok' => 3,
                'gambar' => 'nikeJ1L.jpg',
                'categories_id' => 1
            ]
        ]);
    }
}
