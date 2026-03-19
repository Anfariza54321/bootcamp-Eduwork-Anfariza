<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            [
                'id' => 1,
                'nama' => 'Nike'
            ],
            [
                'id' => 2,
                'nama' => 'Adidas'
            ],
            [
                'id' => 3,
                'nama' => 'Puma'
            ]
        ]);
    }
}
