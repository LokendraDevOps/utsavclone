@extends('layouts.front')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="mb-8">
        <span class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-700">Temple Listing</span>
        <h1 class="mt-3 text-4xl font-black">Temples ready for puja bookings</h1>
    </div>
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($temples as $temple)
            <a href="{{ route('temples.show', $temple) }}" class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-amber-100 transition hover:-translate-y-1">
                <img src="{{ $temple->featured_image }}" class="h-56 w-full object-cover" alt="{{ $temple->name }}">
                <div class="p-6">
                    <div class="text-xs uppercase tracking-[0.35em] text-amber-700">{{ $temple->state }}</div>
                    <h2 class="mt-2 text-xl font-bold">{{ $temple->name }}</h2>
                    <p class="mt-3 text-sm text-slate-600">{{ $temple->location }}</p>
                    <p class="mt-4 line-clamp-3 text-sm text-slate-600">{{ $temple->description }}</p>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-8">{{ $temples->links() }}</div>
</section>
@endsection
