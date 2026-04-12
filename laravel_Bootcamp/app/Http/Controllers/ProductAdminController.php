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
            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');

                // Buat nama file unik agar tidak bentrok
                $name = time() . '.' . $image->getClientOriginalExtension();

                // PINDAHKAN ke folder public/images (sesuai path product-list kamu)
                $image->move(public_path('images'), $name);

                // Simpan nama filenya saja ke database
                $gambarPath = $name;
            }

            Product::create([
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
                'deskripsi' => $request->deskripsi ?? '-', 
                'harga' => $request->harga,
                'stok' => $request->stok,
                'merek_id' => $request->merek_id,
                'gambar' => $gambarPath,
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
            
            'nama' => 'required|string|max:255|unique:products,nama,' . $id,
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'merek_id' => 'required|exists:merek,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ], [
            'nama.unique' => 'CONFLICT: Nama produk sudah digunakan oleh unit lain.',
            'merek_id.exists' => 'ERROR: Resource merek tidak valid.',
            'harga.required' => 'error: Harga produk wajib diisi.'
        ]);

        try {

            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');

                
                $name = time() . '.' . $image->getClientOriginalExtension();

                
                $image->move(public_path('images'), $name);

                
                $gambarPath = $name;
            }

            $produk->update([
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
                'deskripsi' => $request->deskripsi ?? $produk->deskripsi,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'merek_id' => $request->merek_id,
                'gambar' => $gambarPath ?? $produk->gambar,
            ]);

            return redirect()->route('produkAdmin')->with('success', 'SYSTEM_RECALIBRATED: Data produk berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'CRITICAL_ERROR: Gagal memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {

            $product = Product::findOrFail($id);

            
            if ($product->gambar) {
               
                if (Storage::disk('public')->exists($product->gambar)) {
                    Storage::disk('public')->delete($product->gambar);
                }
            }

            $product->delete();

            return redirect()->route('produkAdmin')->with('success', 'SYSTEM_DELETED: Unit data telah dimusnahkan.');
        } catch (\Exception $e) {
        
            return redirect()->route('produkAdmin')->with('error', 'CRITICAL_ERROR: Gagal memusnahkan data.');
        }
    }
}
