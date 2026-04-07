<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addToCart(Request $request, $id)
    {
        
        $cart = session()->get('cart', []);

        
        if (isset($cart[$id])) {
            
            $cart[$id]['quantity']++;
        } else {
            
            $cart[$id] = [
                "nama" => $request->nama,
                "quantity" => 1,
                "harga" => $request->harga,
                "gambar" => $request->gambar
            ];
        }

        
        session()->put('cart', $cart);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }


    public function index()
    {
        $cart = session()->get('cart', []);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['harga'] * $item['quantity'];
        }

        
        $tax = $subtotal * 0.11;
        $pickup = count($cart) > 0 ? 50000 : 0;
        $total = $subtotal + $tax + $pickup;

        return view('frontend.cart', compact('cart', 'subtotal', 'tax', 'pickup', 'total'));
    }

    public function remove($id)
    {
        
        $cart = session()->get('cart');

        
        if (isset($cart[$id])) {
            
            unset($cart[$id]);

            
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
