<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class MerekAdminController extends Controller
{

    protected $table = 'merek';
    protected $fillable = ['nama', 'slug', 'jumlah'];

    public function index()
    {
        $mereks = Merek::withCount('products')->oldest()->get();

        return view('frontend.merekAdmin', compact('mereks'));
    }

    public function create()
    {
        return view('frontend.merekAdminCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => [
                'required',
                'string',
                'max:50',
                'unique:merek,nama',
                'min:2',
                'regex:/^[a-zA-Z0-9\s-]+$/'
            ],
        ], [
            'nama.required' => 'ERROR: Nama merek wajib diisi.',
            'nama.unique' => 'CONFLICT: Nama merek sudah terdaftar di database.',
            'nama.regex' => 'FORMAT_INVALID: Gunakan hanya karakter alphanumeric.',
            'nama.max' => 'LIMIT_EXCEEDED: Nama merek terlalu panjang (Maks 50 karakter).',
        ]);

        try {
            Merek::create([
                'nama' => trim($request->nama),
                'slug' => Str::slug($request->nama),
                'jumlah' => 0,
            ]);

            return redirect()->route('merekAdmin')->with('success', 'DATABASE_UPDATED: Merek baru telah diregistrasi.');
        } catch (\Exception $e) {

            return back()->withInput()->with('error', 'CRITICAL_ERROR: Gagal menyimpan data ke server.');
        }
    }

    public function edit($id)
    {
        $merek = Merek::findOrFail($id);
        return view('frontend.merekAdminEdit', compact('merek'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            
            'nama' => 'required|string|max:50|min:2|unique:merek,nama,' . $id,
        ], [
            'nama.unique' => 'CONFLICT: Nama merek ini sudah terdaftar di sistem.',
            'nama.max' => 'LIMIT_EXCEEDED: Nama merek terlalu panjang.',
        ]);

        try {
            $merek = Merek::findOrFail($id);

            $merek->update([
                'nama' => trim($request->nama),
                'slug' => Str::slug($request->nama),
            ]);

            return redirect()->route('merekAdmin')->with('success', 'DATABASE_UPDATED: Profil merek telah disesuaikan.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'CRITICAL_ERROR: Gagal memperbarui data merek.');
        }
    }

    public function destroy($id)
    {
        try {
            $merek = Merek::findOrFail($id);

            if ($merek->products()->count() > 0) {
                return redirect()->route('merekAdmin')->with('error', 'ACCESS_DENIED: Merek tidak bisa dihapus karena masih memiliki produk aktif.');
            }

            $merek->delete();

            return redirect()->route('merekAdmin')->with('success', 'DATABASE_PURGED: Merek berhasil dimusnahkan dari sistem.');
        } catch (\Exception $e) {
            return redirect()->route('merekAdmin')->with('error', 'CRITICAL_ERROR: Gagal memproses pemusnahan data.');
        }
    }
}
