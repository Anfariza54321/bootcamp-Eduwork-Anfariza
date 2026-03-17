<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengguna')->insert(
            [
                [
                    'id' => 1,
                    'nama' => 'Toni Subagyo',
                    'email' => 'Tonisubagyo@gmail.com',
                    'password' => Hash::make('password')
                ],
                [
                    'id' => 2,
                    'nama' => 'Toni Raharjo',
                    'email' => 'Tonoraharjo@gmail.com',
                    'password' => Hash::make('password')
                ],
                [
                    'id' => 3,
                    'nama' => 'Toni Setiawan',
                    'email' => 'Tonisetiawan@gmail.com',
                    'password' => Hash::make('password')
                ]
            ]
        );
    }
}
