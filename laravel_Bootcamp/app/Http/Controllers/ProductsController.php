<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $query = Product::with('merek');

        
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhereHas('merek', function ($mq) use ($search) {
                        $mq->where('nama', 'like', "%{$search}%");
                    });
            });
        }

        
        if ($request->has('brands')) { 
            $selectedMerek = $request->input('brands');
            $query->whereHas('merek', function ($q) use ($selectedMerek) {
                $q->whereIn('nama', $selectedMerek);
            });
        }

        
        $sort = $request->input('sort');
        if ($sort === 'asc') {
            $query->orderBy('harga', 'asc');
        } elseif ($sort === 'desc') {
            $query->orderBy('harga', 'desc');
        }

        
        $products = $query->paginate(4)->withQueryString();

        return view('frontend.products', compact('products'));
    }


    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $sessionKey = 'viewed_product_' . $product->id;

        if (!session()->has($sessionKey)) {
            $product->increment('click');

            session()->put($sessionKey, true);
        }

        return back()->with('openModalId', $product->id);
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
        //
    }
}
