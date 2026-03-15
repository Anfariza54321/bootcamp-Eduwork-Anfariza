<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('carts', compact('cart'));
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);
        return view('checkout', compact('cart', 'total'));
    }

    public function addToCart(Request $request, $id)
    {
        // 1. Cek apakah data dari form masuk
        // dd($request->all()); 

        $cart = session()->get('cart', []);

        $cart[$id] = [
            "name" => $request->name,
            "quantity" => isset($cart[$id]) ? $cart[$id]['quantity'] + 1 : 1,
            "price" => $request->price
            // "image" => $request->image
        ];

        session()->put('cart', $cart);

        // 2. Cek apakah session 'cart' sudah terisi
        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambah!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
