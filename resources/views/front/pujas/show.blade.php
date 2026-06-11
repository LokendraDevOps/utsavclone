@extends('layouts.front')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-2">
        <img src="{{ $puja->featured_image }}" alt="{{ $puja->name }}" class="rounded-[2rem] object-cover shadow-sm ring-1 ring-amber-100">
        <div>
            <div class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-700">{{ $puja->category->name }}</div>
            <h1 class="mt-3 text-4xl font-black">{{ $puja->name }}</h1>
            <p class="mt-4 text-lg text-slate-700">{{ $puja->description }}</p>
            <div class="mt-6 rounded-2xl bg-white p-5 ring-1 ring-amber-100">
                <div class="grid gap-3 sm:grid-cols-3">
                    <div><span class="text-xs uppercase text-slate-500">Temple</span><div class="font-semibold">{{ $puja->temple->name }}</div></div>
                    <div><span class="text-xs uppercase text-slate-500">Duration</span><div class="font-semibold">{{ $puja->duration_minutes }} mins</div></div>
                    <div><span class="text-xs uppercase text-slate-500">Price</span><div class="font-semibold">₹{{ number_format($puja->price, 0) }}</div></div>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <a href="{{ route('user.bookings.start') }}" class="rounded-full bg-slate-900 px-5 py-3 font-semibold text-white">Book This Puja</a>
                <a href="{{ route('temples.show', $puja->temple) }}" class="rounded-full border border-slate-300 bg-white px-5 py-3 font-semibold">View Temple</a>
            </div>
        </div>
    </div>
    <div class="mt-12 rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-amber-100">
        <h2 class="text-2xl font-bold">Benefits</h2>
        <p class="mt-4 whitespace-pre-line text-slate-700">{{ $puja->benefits }}</p>
    </div>
</section>
@endsection
