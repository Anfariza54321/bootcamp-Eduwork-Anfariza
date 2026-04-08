<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('merek');

        // Cek apakah ada input search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%")
                ->orWhereHas('merek', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%");
                });
        }

        $produks = $query->latest()->paginate(10)->withQueryString();

        return view('frontend.produkAdmin', compact('produks'));
    }
}
