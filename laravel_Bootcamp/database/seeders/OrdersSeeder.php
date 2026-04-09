<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert(
            [
                [
                    'users_id' => 2,
                    'order_number' => 1001,
                    'products_id' => 1,
                    'status' => 'pending',
                    'quantity' => 5,
                    'total' => 5000000
                ],
                [
                    'users_id' => 3,
                    'order_number' => 1002,
                    'products_id' => 2,
                    'status' => 'pending',
                    'quantity' => 3,
                    'total' => 4500000
                ],
                [
                    'users_id' => 1,
                    'order_number' => 1003,
                    'products_id' => 3,
                    'status' => 'pending',
                    'quantity' => 2,
                    'total' => 2400000
                ],
            ]
        );
    }
}
