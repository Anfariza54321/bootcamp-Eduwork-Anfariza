<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $daftarPengguna = ['Toni Raharjo', 'Toni Setiawan', 'Toni Subagyo'];

        // foreach ($daftarPengguna as $nama) {

        //     $pengguna = DB::table('pengguna')->where('nama', $nama)->first();

        //     if ($pengguna) {



        //         DB::table('orders')->insert(
        //             [
        //                 [
        //                     'pengguna_id' => $pengguna->id,
        //                     'products_id' => 1,
        //                     'quantity' => 5,
        //                     'total' => 3000000
        //                 ]
        //             ],
        //             [
        //                 [
        //                     'pengguna_id' => $pengguna->id,
        //                     'products_id' => 2,
        //                     'quantity' => 3,
        //                     'total' => 1500000
        //                 ]
        //             ],
        //             [
        //                 [
        //                     'pengguna_id' => $pengguna->id,
        //                     'products_id' => 3,
        //                     'quantity' => 2,
        //                     'total' => 1200000
        //                 ]
        //             ]
        //         );
        //     }
        // }

        DB::table('orders')->insert(
            [
                [
                    'pengguna_id' => 2,
                    'products_id' => 1,
                    'quantity' => 5,
                    'total' => 5000000
                ],
                [
                    'pengguna_id' => 3,
                    'products_id' => 2,
                    'quantity' => 3,
                    'total' => 4500000
                ],
                [
                    'pengguna_id' => 1,
                    'products_id' => 3,
                    'quantity' => 2,
                    'total' => 2400000
                ],
            ]
        );
    }
}
