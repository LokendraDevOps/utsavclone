@extends('layouts.front')

@section('content')
<section class="relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(251,191,36,0.2),_transparent_35%),radial-gradient(circle_at_top_right,_rgba(244,114,182,0.14),_transparent_30%)]"></div>
    <div class="relative mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-24">
        <div class="max-w-xl">
            <span class="inline-flex rounded-full border border-amber-200 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-[0.35em] text-amber-700">Temple bookings, reimagined</span>
            <h1 class="mt-6 text-4xl font-black leading-tight text-slate-950 sm:text-6xl">Plan sacred pujas with clarity, trust, and grace.</h1>
            <p class="mt-6 text-lg leading-8 text-slate-700">Divine Booking Platform is a polished demo of a spiritual commerce experience with temple discovery, puja booking, devotional content, and an admin layer built for growth.</p>
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('user.bookings.start') }}" class="rounded-full bg-slate-900 px-6 py-3 font-semibold text-white">Book a Puja</a>
                <a href="{{ route('temples.index') }}" class="rounded-full border border-slate-300 bg-white px-6 py-3 font-semibold">Explore Temples</a>
            </div>
            <div class="mt-10 grid grid-cols-3 gap-4 text-center">
                <div class="rounded-3xl bg-white/80 p-4 shadow-sm">
                    <div class="text-2xl font-black text-amber-700">{{ $featuredTemples->count() ?? 0 }}+</div>
                    <div class="text-sm text-slate-600">Temples</div>
                </div>
                <div class="rounded-3xl bg-white/80 p-4 shadow-sm">
                    <div class="text-2xl font-black text-amber-700">{{ $featuredPujas->count() ?? 0 }}+</div>
                    <div class="text-sm text-slate-600">Pujas</div>
                </div>
                <div class="rounded-3xl bg-white/80 p-4 shadow-sm">
                    <div class="text-2xl font-black text-amber-700">{{ $upcomingFestivals->count() ?? 0 }}+</div>
                    <div class="text-sm text-slate-600">Festivals</div>
                </div>
            </div>
        </div>
        <div class="relative">
            <div class="absolute inset-0 -rotate-6 rounded-[2rem] bg-gradient-to-br from-amber-400 via-orange-500 to-rose-500 opacity-20 blur-3xl"></div>
            <div class="relative overflow-hidden rounded-[2rem] border border-white/60 bg-white shadow-2xl">
                <img src="https://picsum.photos/seed/divine-hero/1200/900" alt="Divine platform hero" class="h-[32rem] w-full object-cover">
            </div>
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="grid gap-6 md:grid-cols-3">
        @foreach ([
            ['title' => 'Featured Temples', 'items' => $featuredTemples],
            ['title' => 'Featured Pujas', 'items' => $featuredPujas],
            ['title' => 'Upcoming Festivals', 'items' => $upcomingFestivals],
        ] as $section)
            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
                <h2 class="text-xl font-bold">{{ $section['title'] }}</h2>
                <div class="mt-4 space-y-4">
                    @foreach ($section['items'] as $item)
                        <a href="{{ isset($item->slug) && $section['title'] === 'Featured Temples' ? route('temples.show', $item) : (isset($item->slug) && $section['title'] === 'Featured Pujas' ? route('pujas.show', $item) : route('festivals.show', $item)) }}" class="block rounded-2xl border border-slate-100 p-4 hover:border-amber-200">
                            <div class="font-semibold">{{ $item->name }}</div>
                            <div class="mt-1 text-sm text-slate-600">{{ $item->location ?? $item->festival_date?->format('d M Y') ?? $item->temple?->name }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="grid gap-6 lg:grid-cols-3">
        <div class="rounded-[2rem] bg-slate-900 p-8 text-white lg:col-span-2">
            <h2 class="text-2xl font-bold">Why families choose Divine Booking</h2>
            <div class="mt-6 grid gap-4 md:grid-cols-3">
                @foreach (['Verified temple listings','Simple Sankalp flow','Admin-ready operations'] as $point)
                    <div class="rounded-2xl bg-white/10 p-4">{{ $point }}</div>
                @endforeach
            </div>
        </div>
        <div class="rounded-[2rem] bg-amber-50 p-8 ring-1 ring-amber-100">
            <h2 class="text-2xl font-bold">Testimonials</h2>
            <div class="mt-4 space-y-4">
                @foreach ($testimonials as $testimonial)
                    <div class="rounded-2xl bg-white p-4 shadow-sm">
                        <div class="font-semibold">{{ $testimonial->name }}</div>
                        <div class="text-xs uppercase tracking-[0.25em] text-amber-700">{{ $testimonial->designation }}</div>
                        <p class="mt-2 text-sm text-slate-600">{{ $testimonial->message }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
