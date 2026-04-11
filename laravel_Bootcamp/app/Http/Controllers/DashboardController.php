<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahProduk = \App\Models\Product::count();
        $jumlahMerek = \App\Models\Merek::count();
        $jumlahKlik= \App\Models\Product::sum('click');
        $totalStok = \App\Models\Product::sum('stok');

        $grafikLabel = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $grafikData = [12, 19, 3, 5, 2, 30, 25];

        $dataMerek = \App\Models\Merek::withSum('products as total_stok', 'stok')->get();

        $pieLabel = $dataMerek->pluck('nama'); // Nama-nama merek
        $pieData = $dataMerek->pluck('total_stok')->map(fn($value) => $value ?? 0); // Total stok per merek

        $recentOrders = Order::with(['user', 'product'])
            ->where('created_at', '>=', now()->subDays(7))
            ->orderBy('created_at', 'desc')
            ->limit(10) // Tampilkan 10 data terbaru saja
            ->get();

        return view('dashboard', compact(
            'jumlahProduk',
            'jumlahMerek',
            'jumlahKlik',
            'totalStok',
            'recentOrders', // Tambahkan ini
            'grafikLabel',
            'grafikData',
            'pieLabel',
            'pieData'
        ));
    }
}
