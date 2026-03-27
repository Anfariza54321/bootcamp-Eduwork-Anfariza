<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $query = Products::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $categories = (array) $request->category;
            $query->where(function ($sub) use ($categories) {
                foreach ($categories as $cat) {
                    $sub->orWhere('nama', 'like', '%' . $cat . '%');
                }
            });
        }

        if ($request->sort == 'price_low') {
            $query->orderBy('harga', 'asc');
        } elseif ($request->sort == 'price_high') {
            $query->orderBy('harga', 'desc');
        }

        $products = $query->paginate(4)->withQueryString();

        return view('products', ['products' => $products]);
    }

    public function show($id)
    {
        $productSepatu = Products::firstWhere('id', $id);
        return view('product-detail', ['product' => $productSepatu]);
    }

    public function adminIndex()
    {
        $products = Products::with('category')->get();

        return view('admin.productsAdmin.productsAdmin', compact('products'));
    }

    public function categoryAdmin()
    {
        $categories = \App\Models\Category::all();

        return view('admin.categoryAdmin.categoryAdmin', compact('categories'));
    }
}
