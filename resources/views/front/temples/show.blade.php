@extends('layouts.front')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-2">
        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-amber-100">
            <img src="{{ $temple->featured_image }}" alt="{{ $temple->name }}" class="h-full w-full object-cover">
        </div>
        <div>
            <div class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-700">{{ $temple->state }}</div>
            <h1 class="mt-3 text-4xl font-black">{{ $temple->name }}</h1>
            <p class="mt-4 text-lg text-slate-700">{{ $temple->description }}</p>
            <div class="mt-6 flex gap-3">
                <a href="{{ route('user.bookings.start') }}" class="rounded-full bg-slate-900 px-5 py-3 font-semibold text-white">Book a Puja</a>
                <a href="{{ route('pujas.index') }}" class="rounded-full border border-slate-300 bg-white px-5 py-3 font-semibold">View Pujas</a>
            </div>
        </div>
    </div>

    <div class="mt-12">
        <h2 class="text-2xl font-bold">Temple Gallery</h2>
        <div class="mt-6 grid gap-4 md:grid-cols-3">
            @foreach ($temple->images as $image)
                <img src="{{ $image->image_path }}" alt="{{ $image->caption }}" class="h-56 w-full rounded-3xl object-cover">
            @endforeach
        </div>
    </div>

    <div class="mt-12">
        <h2 class="text-2xl font-bold">Available Pujas</h2>
        <div class="mt-6 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($temple->pujas as $puja)
                <a href="{{ route('pujas.show', $puja) }}" class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
                    <div class="text-xs uppercase tracking-[0.35em] text-amber-700">{{ $puja->category->name }}</div>
                    <h3 class="mt-2 text-xl font-bold">{{ $puja->name }}</h3>
                    <p class="mt-3 text-sm text-slate-600">{{ $puja->duration_minutes }} mins | ₹{{ number_format($puja->price, 0) }}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
