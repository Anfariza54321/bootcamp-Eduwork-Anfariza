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
            'nama' => 'required|string|max:255|unique:products,nama',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'merek_id' => 'required|exists:merek,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ], [
            'nama.unique' => 'Nama produk ini sudah terdaftar, gunakan nama lain.',
            'merek_id.exists' => 'Merek yang dipilih tidak valid.',
        ]);

        try {
            $path = null;
            if ($request->hasFile('gambar')) {
                
                $file = $request->file('gambar');
                $fileName = time() . '_' . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('products', $fileName, 'public');
            }

            Product::create([
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
                'deskripsi' => $request->deskripsi ?? '-', 
                'harga' => $request->harga,
                'stok' => $request->stok,
                'merek_id' => $request->merek_id,
                'gambar' => $path,
            ]);

            return redirect()->route('produkAdmin')->with('success', 'SYSTEM_UPDATE: Produk berhasil ditambah!');
        } catch (\Exception $e) {
           
            return back()->withInput()->with('error', 'Gagal menambah produk: ' . $e->getMessage());
        }
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
