<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Temple;

class TempleController extends Controller
{
    public function index()
    {
        return view('front.temples.index', [
            'temples' => Temple::query()->withCount('pujas')->latest()->paginate(9),
        ]);
    }

    public function show(Temple $temple)
    {
        $temple->load(['images', 'pujas.category']);

        return view('front.temples.show', compact('temple'));
    }
}
