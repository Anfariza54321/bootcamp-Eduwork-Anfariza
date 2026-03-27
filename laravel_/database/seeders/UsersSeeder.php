<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Toni Subagyo',
                    'email' => 'tonisubagyo@gmail.com',
                    'password' => Hash::make('password')
                ],
                [
                    'id' => 2,
                    'name' => 'Toni Raharjo',
                    'email' => 'tonoraharjo@gmail.com',
                    'password' => Hash::make('password')
                ],
                [
                    'id' => 3,
                    'name' => 'Toni Setiawan',
                    'email' => 'tonisetiawan@gmail.com',
                    'password' => Hash::make('password')
                ]
            ]
        );
    }
}
