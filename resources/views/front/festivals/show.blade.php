@extends('layouts.front')

@section('content')
<section class="mx-auto max-w-4xl px-4 py-12 sm:px-6 lg:px-8">
    <img src="{{ $festival->featured_image }}" alt="{{ $festival->name }}" class="h-[28rem] w-full rounded-[2rem] object-cover shadow-sm ring-1 ring-amber-100">
    <div class="mt-8 text-xs font-semibold uppercase tracking-[0.35em] text-amber-700">{{ $festival->festival_date->format('d M Y') }}</div>
    <h1 class="mt-3 text-4xl font-black">{{ $festival->name }}</h1>
    <p class="mt-6 text-lg leading-8 text-slate-700">{{ $festival->description }}</p>
</section>
@endsection
