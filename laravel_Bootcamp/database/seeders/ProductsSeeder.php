<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'nama' => 'Nike Air Jordan 1 Retro High',
                'slug' => 'nike-air-jordan-1-retro-high',
                'deskripsi' => 'Ikon klasik yang tidak pernah mati. Menampilkan kombinasi warna legendaris dengan material kulit premium.',
                'harga' => 2500000,
                'stok' => 15,
                'gambar' => 'image-placeholder.png',
                'merek_id' => 1
            ],
            [
                'id' => 2,
                'nama' => 'Adidas Ultraboost Light',
                'slug' => 'adidas-ultraboost-light',
                'deskripsi' => 'Sepatu lari paling ringan yang pernah ada dengan teknologi Boost untuk energi yang tak terbatas.',
                'harga' => 3300000,
                'stok' => 20,
                'gambar' => 'image-placeholder.png',
                'merek_id' => 2
            ],
            [
                'id' => 3,
                'nama' => 'Puma Suede Classic XXI',
                'slug' => 'puma-suede-classic-xxi',
                'deskripsi' => 'Desain klasik Puma yang mendefinisikan gaya jalanan sejak tahun 1968. Material suede berkualitas tinggi.',
                'harga' => 1200000,
                'stok' => 25,
                'gambar' => 'image-placeholder.png',
                'merek_id' => 3
            ],
            [
                'id' => 4,
                'nama' => 'Aerostreet Hoops Low White',
                'slug' => 'aerostreet-hoops-low-white',
                'deskripsi' => 'Sepatu lokal berkualitas tinggi dengan teknologi Shoes Injection Mould yang membuatnya tidak akan jebol.',
                'harga' => 169000,
                'stok' => 100,
                'gambar' => 'image-placeholder.png',
                'merek_id' => 4
            ],
            [
                'id' => 5,
                'nama' => 'New Balance 550 White Grey',
                'slug' => 'new-balance-550-white-grey',
                'deskripsi' => 'Siluet basket tahun 80-an yang kembali tren. Sangat nyaman untuk penggunaan kasual sehari-hari.',
                'harga' => 2100000,
                'stok' => 12,
                'gambar' => 'image-placeholder.png',
                'merek_id' => 5
            ],
            [
                'id' => 6,
                'nama' => 'Converse Chuck Taylor All Star 70s Hi',
                'slug' => 'converse-chuck-70s-hi',
                'deskripsi' => 'Sepatu kanvas premium dengan sol lebih tebal dan kenyamanan ekstra untuk gaya vintage yang otentik.',
                'harga' => 999000,
                'stok' => 40,
                'gambar' => 'image-placeholder.png',
                'merek_id' => 6
            ],
            [
                'id' => 7,
                'nama' => 'Reebok Club C 85 Vintage',
                'slug' => 'reebok-club-c-85-vintage',
                'deskripsi' => 'Sepatu tenis klasik dengan tampilan minimalis yang elegan. Cocok dipadukan dengan celana denim atau chino.',
                'harga' => 1300000,
                'stok' => 18,
                'gambar' => 'image-placeholder.png',
                'merek_id' => 7
            ],
            [
                'id' => 8,
                'nama' => 'Nike Air Force 1 Low White',
                'slug' => 'nike-air-force-1-low-white',
                'deskripsi' => 'Sepatu putih bersih paling ikonik di dunia. Wajib dimiliki bagi pecinta sneakers.',
                'harga' => 1600000,
                'stok' => 30,
                'gambar' => 'image-placeholder.png',
                'merek_id' => 1
            ],
            [
                'id' => 9,
                'nama' => 'Vans Old Skool Black White',
                'slug' => 'vans-old-skool-black-white',
                'deskripsi' => 'Gaya skate sejati dengan garis samping yang ikonik. Terbuat dari kanvas dan suede yang tahan lama.',
                'harga' => 1100000,
                'stok' => 50,
                'gambar' => 'image-placeholder.png',
                'merek_id' => 8
            ],
            [
                'id' => 10,
                'nama' => 'Compass Gazelle Low Black White',
                'slug' => 'compass-gazelle-low-bw',
                'deskripsi' => 'Karya anak bangsa dengan siluet vintage yang selalu ludes di pasaran. Menggunakan material kanvas 10 oz.',
                'harga' => 408000,
                'stok' => 5,
                'gambar' => 'image-placeholder.png',
                'merek_id' => 9
            ],
        ]);
    }
}
