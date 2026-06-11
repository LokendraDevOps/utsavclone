@extends('layouts.front')

@section('content')
<section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-3">
        <div class="rounded-[2rem] bg-slate-900 p-8 text-white lg:col-span-2">
            <span class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-300">Panchang</span>
            <h1 class="mt-4 text-4xl font-black">{{ $today->format('l, d F Y') }}</h1>
            <p class="mt-4 text-slate-300">A spiritual snapshot for the day that keeps the demo grounded in devotional context.</p>
            <div class="mt-8 grid gap-4 md:grid-cols-3">
                <div class="rounded-2xl bg-white/10 p-4">Sunrise<br><span class="text-lg font-bold">{{ $sunrise }}</span></div>
                <div class="rounded-2xl bg-white/10 p-4">Sunset<br><span class="text-lg font-bold">{{ $sunset }}</span></div>
                <div class="rounded-2xl bg-white/10 p-4">Moon Phase<br><span class="text-lg font-bold">{{ $moonPhase }}</span></div>
            </div>
        </div>
        <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-amber-100">
            <h2 class="text-2xl font-bold">Auspicious Windows</h2>
            <div class="mt-6 space-y-4">
                @foreach ($auspiciousTimes as $time)
                    <div class="rounded-2xl bg-amber-50 p-4">
                        <div class="font-semibold">{{ $time['label'] }}</div>
                        <div class="text-sm text-slate-600">{{ $time['value'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
