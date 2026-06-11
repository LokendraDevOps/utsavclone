<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Festival;
use App\Models\Puja;
use App\Models\Temple;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home', [
            'featuredTemples' => Temple::query()->where('is_featured', true)->latest()->take(6)->get(),
            'featuredPujas' => Puja::query()->where('is_featured', true)->with('temple', 'category')->latest()->take(6)->get(),
            'upcomingFestivals' => Festival::query()->orderBy('festival_date')->take(4)->get(),
            'latestBlogs' => Blog::query()->where('status', 'published')->latest('published_at')->take(3)->get(),
            'testimonials' => Testimonial::query()->latest()->take(3)->get(),
        ]);
    }
}
