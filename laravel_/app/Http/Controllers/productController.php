<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products = [
        ['id' => 1, 'hargaDiskon' => 49.99, 'hargaAsli' => 80, 'namaProduk' => 'Adidas Samba OG'],
        ['id' => 2, 'hargaDiskon' => 19.99, 'hargaAsli' => 60, 'namaProduk' => 'Reebok'],
        ['id' => 3, 'hargaDiskon' => 29.99, 'hargaAsli' => 40, 'namaProduk' => 'Aerostreet X Superman'],
        ['id' => 4, 'hargaDiskon' => 39.99, 'hargaAsli' => 60, 'namaProduk' => 'Puma'],
        ['id' => 5, 'hargaDiskon' => 49.99, 'hargaAsli' => 80, 'namaProduk' => 'Adidas Samba OG'],
        ['id' => 6, 'hargaDiskon' => 39.99, 'hargaAsli' => 60, 'namaProduk' => 'Reebok'],
        ['id' => 7, 'hargaDiskon' => 29.99, 'hargaAsli' => 40, 'namaProduk' => 'Aerostreet X Superman'],
        ['id' => 8, 'hargaDiskon' => 39.99, 'hargaAsli' => 60, 'namaProduk' => 'Puma'],
    ];
    public function index(Request $request) {
        $products = collect($this->products);

        if ($request->filled('search')) {
            $products =$products->filter(function ($item) use ($request) {
                return
                str_contains(strtolower($item['namaProduk']),
                strtolower($request->search));
                });
        }

        if($request->filled('category')) {
            $categories = $request->category;

            $products = $products->filter (function ($item) use ($categories) {
                foreach($categories as $cat) {
                    if (str_contains(strtolower($item['namaProduk']),strtolower($cat))) {
                        return true;
                    }
                }
                return false;
            });
        }

        if($request->sort == 'price_low') {
            $products = $products->sortBy('hargaDiskon');
        } elseif ($request->sort == 'price_high') {
            $products = $products->sortByDesc('hargaDiskon');
        }

        return view ('products', ['products'=>$products]);
    } 

    public function show($id) {
        $productSepatu = collect($this->products)->firstWhere('id', $id);
        return view('product-detail', ['product' => $productSepatu]);
    }

}
