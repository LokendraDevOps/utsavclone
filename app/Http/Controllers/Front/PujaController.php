<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Puja;

class PujaController extends Controller
{
    public function index()
    {
        return view('front.pujas.index', [
            'pujas' => Puja::query()->with('temple', 'category')->latest()->paginate(9),
        ]);
    }

    public function show(Puja $puja)
    {
        $puja->load('temple', 'category');

        return view('front.pujas.show', compact('puja'));
    }
}
