<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Blog;
use App\Models\Puja;
use App\Models\Temple;
use App\Models\Testimonial;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'stats' => [
                ['label' => 'Total Users', 'value' => User::count()],
                ['label' => 'Total Temples', 'value' => Temple::count()],
                ['label' => 'Total Pujas', 'value' => Puja::count()],
                ['label' => 'Total Bookings', 'value' => Booking::count()],
            ],
            'recentBookings' => Booking::query()->with(['user', 'temple', 'puja'])->latest()->take(5)->get(),
            'publishedBlogs' => Blog::query()->where('status', 'published')->count(),
            'featuredTestimonials' => Testimonial::count(),
        ]);
    }
}
