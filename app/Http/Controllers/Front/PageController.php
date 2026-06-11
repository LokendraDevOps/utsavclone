<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PageController extends Controller
{
    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function panchang()
    {
        $today = Carbon::now();

        return view('front.panchang', [
            'today' => $today,
            'sunrise' => '06:02 AM',
            'sunset' => '07:16 PM',
            'moonPhase' => 'Waxing Gibbous',
            'auspiciousTimes' => [
                ['label' => 'Abhijit Muhurat', 'value' => '11:56 AM - 12:44 PM'],
                ['label' => 'Amrit Kaal', 'value' => '02:30 PM - 04:05 PM'],
                ['label' => 'Rahu Kaal', 'value' => '03:00 PM - 04:36 PM'],
            ],
        ]);
    }
}
