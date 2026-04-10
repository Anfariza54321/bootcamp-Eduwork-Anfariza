<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                    'name' => 'Toni Subagyo',
                    'email' => 'tonisubagyo@gmail.com',
                    'password' => Hash::make('password'),
                    'role' => 'admin'
                ],
                [
                    'name' => 'Toni Raharjo',
                    'email' => 'tonoraharjo@gmail.com',
                    'password' => Hash::make('password'),
                    'role' => 'user'
                ],
                [
                    'name' => 'Toni Setiawan',
                    'email' => 'tonisetiawan@gmail.com',
                    'password' => Hash::make('password'),
                    'role' => 'user'
                ]
            ]
        );
    }
}
