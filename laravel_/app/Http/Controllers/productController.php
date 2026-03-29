<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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
        $products = \App\Models\Products::all();

        return view('admin.productsAdmin.productsAdmin', compact('products'));
    }

    public function categoryAdmin()
    {
        $categories = \App\Models\Category::all();

        return view('admin.categoryAdmin.categoryAdmin', compact('categories'));
    }

    public function updateCategory(Request $request, $id) {
        $request->validate ([
            'nama' => 'required|string|max:255|unique:categories,nama,' . $id,
            'jumlah' => 'required|integer|min:0',
        ], [
            'nama.unique' => 'Nama kategori ini sudah ada, silahkan gunakan nama lain.'
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'jumlah' => $request->jumlah,
        ]);
        return redirect()->route('category.admin')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Fungsi untuk Update data
    public function updateProducts(Request $request, $id)
    {
        // 1. Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = \App\Models\Products::findOrFail($id);

        // 2. Logika Update Gambar (Hanya jika ada file baru)
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($product->gambar && file_exists(public_path('images/' . $product->gambar))) {
                unlink(public_path('images/' . $product->gambar));
            }

            $namaGambar = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $namaGambar);
            $product->gambar = $namaGambar;
        }

        // 3. Update data lainnya
        $product->update([
            'nama' => $request->nama,
            'categories_id' => $request->categories_id,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $product->gambar, // Tetap gunakan gambar (lama/baru)
        ]);

        return redirect()->route('products.admin')->with('success', 'Produk berhasil diperbarui!');
    }

    // Fungsi untuk Hapus data
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.admin')->with('success', 'Kategori berhasil dihapus');
    }

    public function createCategory(Request $request)
    {
        $request->validate([
            
            'nama' => 'required|string|max:255|unique:categories,nama',
            'jumlah' => 'required|integer|min:0',
        ], [
            'nama.unique' => 'Nama kategori ini sudah ada, silahkan gunakan nama lain.'
        ]);

        \App\Models\Category::create([
            'nama' => $request->nama,
            'slug' => \Illuminate\Support\Str::slug($request->nama),
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('category.admin')->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    public function createProduct(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id', // Validasi dropdown
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
        ],
            ['nama.unique' => 'Produk dengan nama ini sudah ada, gunakan nama lain agar slug tidak duplikat']);

       

        // Logika Simpan Gambar
        $namaGambar = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $namaGambar);

        // Simpan ke tabel Products
        \App\Models\Products::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'categories_id' => $request->categories_id,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $namaGambar,
        ]);

        return redirect()->route('products.admin')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function deleteProduct($id)
    {
        $products = Products::findOrFail($id);

        if($products->gambar && file_exists(public_path('images/' . $products->gambar))) {
            unlink(public_path('images/' . $products->gambar));
        }
        // if(!$products) {
        //     return "Produk dengan ID $id tidak ditemukan di database.";
        // }
        $products->delete();

        return redirect()->route('products.admin')->with('success', 'Product berhasil dihapus');
    }

    public function create()
    {
        $categories= \App\Models\Category::all();

        return view('admin.productsAdmin.addProduct',compact('categories'));
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Category::all();

        return view('admin.productsAdmin.editProducts', compact('product','categories'));
    }
}
