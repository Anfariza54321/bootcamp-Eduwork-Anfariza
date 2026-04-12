<?php

namespace App\Http\Controllers;


use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Pastikan User Login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu untuk melakukan pesanan.');
        }

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'Keranjang kosong!');
        }

        DB::beginTransaction();
        try {
            foreach ($cart as $id => $details) {
                Orders::create([
                    'users_id'       => Auth::user()->id,
                    'order_number'   => rand(100000, 999999),
                    'products_id'    => $id,
                    'status'         => 'pending',
                    'quantity'       => $details['quantity'],
                    'total'          => ($details['harga'] * $details['quantity']) * 1.11,
                    'payment_method' => $request->payment_method,
                    'account_name'   => $request->account_name,
                ]);

                
                $product = Product::find($id);
                if ($product) {
                    $product->decrement('stok', $details['quantity']);
                    $product->increment('click');
                }
            }

            DB::commit();
            session()->forget('cart');

            $nomor_wa = "6287847617432";
            $pesan = "Halo Admin, saya ingin konfirmasi pesanan baru!%0A" .
                "Metode: " . strtoupper($request->payment_method);
            $url_wa = "https://wa.me/{$nomor_wa}?text={$pesan}";

            return redirect()->route('products.index')
                ->with('success', 'Pesanan berhasil dicatat!')
                ->with('wa_link', $url_wa);
        } catch (\Exception $e) {
            DB::rollback();
            
            dd("Gagal Simpan Database: " . $e->getMessage());
        }
    }
    

    /**
     * Display the specified resource
     */
    public function show(orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orders $orders)
    {
        //
    }
}
