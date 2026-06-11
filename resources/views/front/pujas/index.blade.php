@extends('layouts.front')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="mb-8">
        <span class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-700">Puja Listing</span>
        <h1 class="mt-3 text-4xl font-black">Choose a puja, temple, and date</h1>
    </div>
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($pujas as $puja)
            <a href="{{ route('pujas.show', $puja) }}" class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-amber-100 transition hover:-translate-y-1">
                <img src="{{ $puja->featured_image }}" class="h-56 w-full object-cover" alt="{{ $puja->name }}">
                <div class="p-6">
                    <div class="text-xs uppercase tracking-[0.35em] text-amber-700">{{ $puja->category->name }}</div>
                    <h2 class="mt-2 text-xl font-bold">{{ $puja->name }}</h2>
                    <p class="mt-3 text-sm text-slate-600">{{ $puja->temple->name }}</p>
                    <div class="mt-4 flex items-center justify-between text-sm">
                        <span>{{ $puja->duration_minutes }} mins</span>
                        <span class="font-semibold">₹{{ number_format($puja->price, 0) }}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-8">{{ $pujas->links() }}</div>
</section>
@endsection
