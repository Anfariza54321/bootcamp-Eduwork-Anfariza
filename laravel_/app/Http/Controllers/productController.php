<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // private $products = [
    //     ['id' => 1, 'hargaDiskon' => 49.99, 'hargaAsli' => 80, 'namaProduk' => 'Adidas Samba OG'],
    //     ['id' => 2, 'hargaDiskon' => 19.99, 'hargaAsli' => 60, 'namaProduk' => 'Reebok'],
    //     ['id' => 3, 'hargaDiskon' => 29.99, 'hargaAsli' => 40, 'namaProduk' => 'Aerostreet X Superman'],
    //     ['id' => 4, 'hargaDiskon' => 39.99, 'hargaAsli' => 60, 'namaProduk' => 'Puma'],
    //     ['id' => 5, 'hargaDiskon' => 49.99, 'hargaAsli' => 80, 'namaProduk' => 'Adidas Samba OG'],
    //     ['id' => 6, 'hargaDiskon' => 39.99, 'hargaAsli' => 60, 'namaProduk' => 'Reebok'],
    //     ['id' => 7, 'hargaDiskon' => 29.99, 'hargaAsli' => 40, 'namaProduk' => 'Aerostreet X Superman'],
    //     ['id' => 8, 'hargaDiskon' => 39.99, 'hargaAsli' => 60, 'namaProduk' => 'Puma'],
    // ];

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
}
