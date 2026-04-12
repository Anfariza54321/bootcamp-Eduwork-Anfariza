<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahProduk = \App\Models\Product::count();
        $jumlahMerek = \App\Models\Merek::count();
        $jumlahKlik = \App\Models\Product::sum('click');
        $totalStok = \App\Models\Product::sum('stok');

        $startOfWeek = now()->subDays(6)->startOfDay();
        $endOfWeek = now()->endOfDay();

        $ordersData = Orders::where('created_at', '>=', $startOfWeek)
            ->selectRaw('DATE(created_at) as date, SUM(quantity) as total_qty')
            ->groupBy('date')
            ->get()
            ->pluck('total_qty', 'date');

        $revenueRaw = Orders::where('created_at', '>=', $startOfWeek)
            ->selectRaw('DATE(created_at) as date, SUM(total) as total_rev')
            ->groupBy('date')
            ->get()
            ->pluck('total_rev', 'date');

        $grafikLabel = [];
        $grafikData = [];
        $revenueData = []; 
        $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        for ($i = 0; $i < 7; $i++) {
            $date = now()->subDays(6 - $i)->format('Y-m-d');
            $dayName = $days[date('w', strtotime($date))];

            $grafikLabel[] = $dayName;
            $grafikData[] = $ordersData[$date] ?? 0;

            $revenueData[] = $revenueRaw[$date] ?? 0;
        }

        $dataMerek = \App\Models\Merek::withSum('products as total_stok', 'stok')->get();
        $pieLabel = $dataMerek->pluck('nama');
        $pieData = $dataMerek->pluck('total_stok')->map(fn($value) => $value ?? 0);

        $recentOrders = Orders::with(['user', 'product'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('dashboard', compact(
            'jumlahProduk',
            'jumlahMerek',
            'jumlahKlik',
            'totalStok',
            'recentOrders',
            'grafikLabel',
            'grafikData',
            'revenueData',
            'pieLabel',
            'pieData'
        ));
    }

    public function history()
    {
        $all_orders = Orders::with(['user', 'product'])->latest()->paginate(10);

        return view('frontend.ordersAdmin', compact('all_orders'));
    }
}
