<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;

class MerekAdminController extends Controller
{
    public function index()
    {
        $mereks = Merek::latest()->get();
        return view('frontend.merekAdmin', compact('mereks'));
    }
}
