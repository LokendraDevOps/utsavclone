@extends('layouts.front')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-black">Upcoming Festivals</h1>
    <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($festivals as $festival)
            <a href="{{ route('festivals.show', $festival) }}" class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-amber-100">
                <img src="{{ $festival->featured_image }}" alt="{{ $festival->name }}" class="h-56 w-full object-cover">
                <div class="p-6">
                    <div class="text-xs uppercase tracking-[0.35em] text-amber-700">{{ $festival->festival_date->format('d M Y') }}</div>
                    <h2 class="mt-2 text-xl font-bold">{{ $festival->name }}</h2>
                    <p class="mt-3 text-sm text-slate-600">{{ \Illuminate\Support\Str::limit($festival->description, 120) }}</p>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-8">{{ $festivals->links() }}</div>
</section>
@endsection
