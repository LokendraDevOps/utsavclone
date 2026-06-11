@extends('layouts.admin')

@section('content')
<div class="grid gap-6 lg:grid-cols-4">
    @foreach ($stats as $stat)
        <div class="rounded-[2rem] bg-white p-6 text-slate-950 shadow-sm">
            <div class="text-sm text-slate-500">{{ $stat['label'] }}</div>
            <div class="mt-2 text-3xl font-black">{{ $stat['value'] }}</div>
        </div>
    @endforeach
</div>

<div class="mt-8 grid gap-6 lg:grid-cols-2">
    <div class="rounded-[2rem] bg-white p-6 text-slate-950 shadow-sm">
        <h3 class="text-xl font-bold">Recent Bookings</h3>
        <div class="mt-4 space-y-3">
            @foreach ($recentBookings as $booking)
                <div class="rounded-2xl bg-slate-50 p-4">
                    <div class="font-semibold">{{ $booking->full_name }}</div>
                    <div class="text-sm text-slate-600">{{ $booking->temple->name }} · {{ $booking->status->label() }}</div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="rounded-[2rem] bg-white p-6 text-slate-950 shadow-sm">
        <h3 class="text-xl font-bold">Content Snapshot</h3>
        <div class="mt-4 space-y-3 text-sm text-slate-600">
            <div>Published Blogs: <strong>{{ $publishedBlogs }}</strong></div>
            <div>Testimonials: <strong>{{ $featuredTestimonials }}</strong></div>
        </div>
    </div>
</div>
@endsection
