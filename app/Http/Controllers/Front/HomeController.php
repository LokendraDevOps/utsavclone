<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Festival;
use App\Models\Puja;
use App\Models\Temple;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'featuredTemples' => Schema::hasTable('temples')
                ? Temple::query()->where('is_featured', true)->latest()->take(6)->get()
                : collect(),
            'featuredPujas' => Schema::hasTable('pujas')
                ? Puja::query()->where('is_featured', true)->with('temple', 'category')->latest()->take(6)->get()
                : collect(),
            'upcomingFestivals' => Schema::hasTable('festivals')
                ? Festival::query()->orderBy('festival_date')->take(4)->get()
                : collect(),
            'latestBlogs' => Schema::hasTable('blogs')
                ? Blog::query()->where('status', 'published')->latest('published_at')->take(3)->get()
                : collect(),
            'testimonials' => Schema::hasTable('testimonials')
                ? Testimonial::query()->latest()->take(3)->get()
                : collect(),
        ]);
    }
}
