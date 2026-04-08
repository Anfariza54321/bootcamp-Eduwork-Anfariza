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
            'nama' => 'required|unique:merek,nama|max:255',
        ]);

        Merek::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'jumlah' => 0,
        ]);

        return redirect()->route('merekAdmin')->with('success', 'Merek berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $merek = Merek::findOrFail($id);
        return view('frontend.merekAdminEdit', compact('merek'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255|unique:merek,nama,' . $id,
        ]);

        $merek = Merek::findOrFail($id);
        $merek->update($request->all());

       
        return redirect()->back()->with('success', 'Merek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $merek = Merek::findOrFail($id);
        $merek->delete();

        return redirect()->route('merekAdmin')->with('success', 'Merek berhasil dihapus!');
    }
}
