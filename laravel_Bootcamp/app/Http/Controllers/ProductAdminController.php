<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductAdminController extends Controller
{
    public function index()
    {
        $produks = Product::with('merek')->oldest()->get();
        $mereks = Merek::all(); 

        return view('frontend.produkAdmin', compact('produks', 'mereks'));
    }

    public function create()
    {
        $mereks = Merek::all();
        return view('frontend.produkAdminCreate', compact('mereks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'merek_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('products', 'public');
        }

        Product::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'deskripsi' => '-',
            'harga' => $request->harga,
            'stok' => $request->stok,
            'merek_id' => $request->merek_id,
            'gambar' => $path,
        ]);

        return redirect()->route('produkAdmin')->with('success', 'Produk berhasil ditambah!');
    }

    public function edit($id)
    {
        $produk = Product::findOrFail($id);
        $mereks = Merek::all();
        return view('frontend.produkAdminEdit', compact('produk', 'mereks'));
    }

    public function update(Request $request, $id)
    {
        $produk = Product::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        if ($request->hasFile('gambar')) {
            
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $produk->gambar = $request->file('gambar')->store('products', 'public');
        }

        $produk->update($request->except('gambar') + ['gambar' => $produk->gambar]);

        return redirect()->route('produkAdmin')->with('success', 'Produk berhasil diupdate!');
    }
}
