<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MerekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('merek')->insert([
            [
                'nama' => 'Nike',
                'slug' => Str::slug('Nike'),
                'jumlah' => 9
            ],
            [
                'nama' => 'Adidas',
                'slug' => Str::slug('Adidas'),
                'jumlah' => 8
            ],
            [
                'nama' => 'Puma',
                'slug' => Str::slug('Puma'),
                'jumlah' => 12
            ],
            [
                'nama' => 'Aerostreet',
                'slug' => Str::slug('Aerostreet'),
                'jumlah' => 12
            ],
            [
                'nama' => 'New Balance',
                'slug' => Str::slug('New Balance'),
                'jumlah' => 12
            ],
            [
                'nama' => 'Converse',
                'slug' => Str::slug('Converse'),
                'jumlah' => 12
            ],
            [
                'nama' => 'Reebok',
                'slug' => Str::slug('Reebok'),
                'jumlah' => 12
            ],
            [
                'nama' => 'Vans',
                'slug' => Str::slug('Vans'),
                'jumlah' => 12
            ],
            [
                'nama' => 'Compass',
                'slug' => Str::slug('Compass'),
                'jumlah' => 12
            ]
        ]);
    }
}
