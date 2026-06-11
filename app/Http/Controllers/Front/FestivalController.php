<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Festival;

class FestivalController extends Controller
{
    public function index()
    {
        return view('front.festivals.index', [
            'festivals' => Festival::query()->orderBy('festival_date')->paginate(6),
        ]);
    }

    public function show(Festival $festival)
    {
        return view('front.festivals.show', compact('festival'));
    }
}
