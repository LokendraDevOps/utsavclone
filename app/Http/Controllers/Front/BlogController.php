<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view('front.blogs.index', [
            'blogs' => Blog::query()->where('status', 'published')->latest('published_at')->paginate(6),
        ]);
    }

    public function show(Blog $blog)
    {
        return view('front.blogs.show', compact('blog'));
    }
}
