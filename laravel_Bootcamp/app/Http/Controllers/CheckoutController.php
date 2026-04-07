<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        
        $cart = session()->get('cart', []);

    
    $subtotal = collect($cart)->sum(function($item) {
        return $item['harga'] * $item['quantity'];
    });

    $tax = $subtotal * 0.11; // PPN 11%
    $total = $subtotal + $tax;

    return view('frontend.checkout', compact('cart', 'subtotal', 'tax', 'total'));
}

    public function summary()
    {
        
        $cart = session()->get('cart');

        
        if (!$cart) {
            return redirect()->route('products.index');
        }

        
        return view('frontend.summary', compact('cart'));
    }

    
    public function store(Request $request)
    {
        
        session()->forget('cart');

        
        return redirect()->route('products.index')->with('order_success', 'Pesanan sudah dalam proses!');
    }
}