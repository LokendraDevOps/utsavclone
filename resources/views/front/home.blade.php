@extends('layouts.front')

@section('content')
@php
    $featuredTemples = $featuredTemples ?? collect();
    $featuredPujas = $featuredPujas ?? collect();
    $upcomingFestivals = $upcomingFestivals ?? collect();
    $latestBlogs = $latestBlogs ?? collect();
    $testimonials = $testimonials ?? collect();
@endphp

<section class="relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(245,158,11,0.18),_transparent_34%),radial-gradient(circle_at_bottom_right,_rgba(251,146,60,0.14),_transparent_30%),linear-gradient(180deg,_#fff7ed_0%,_#f7f0e5_100%)]"></div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-24">
        <div class="max-w-2xl">
            <span class="inline-flex rounded-full border border-amber-200 bg-white/80 px-4 py-1 text-xs font-semibold uppercase tracking-[0.35em] text-amber-700 shadow-sm">Divine Booking Platform</span>
            <h1 class="mt-6 text-4xl font-black tracking-tight text-slate-950 sm:text-5xl lg:text-6xl">
                Book sacred experiences with trust, clarity, and devotion.
            </h1>
            <p class="mt-6 text-lg leading-8 text-slate-700">
                Discover temples, choose pujas, plan festivals, and manage family sankalp details in one elegant spiritual journey built for modern devotees.
            </p>
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('temples.index') }}" class="rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-900/20 transition hover:-translate-y-0.5">Explore Temples</a>
                <a href="{{ route('pujas.index') }}" class="rounded-full border border-amber-200 bg-white/90 px-6 py-3 text-sm font-semibold text-amber-900 shadow-sm transition hover:-translate-y-0.5">Book a Puja</a>
            </div>
            <div class="mt-10 grid gap-4 sm:grid-cols-3">
                <div class="rounded-3xl bg-white/85 p-5 shadow-sm ring-1 ring-amber-100">
                    <div class="text-3xl font-black text-slate-950">{{ $featuredTemples->count() }}+</div>
                    <p class="mt-1 text-sm text-slate-600">Featured Temples</p>
                </div>
                <div class="rounded-3xl bg-white/85 p-5 shadow-sm ring-1 ring-amber-100">
                    <div class="text-3xl font-black text-slate-950">{{ $featuredPujas->count() }}+</div>
                    <p class="mt-1 text-sm text-slate-600">Curated Pujas</p>
                </div>
                <div class="rounded-3xl bg-white/85 p-5 shadow-sm ring-1 ring-amber-100">
                    <div class="text-3xl font-black text-slate-950">{{ $upcomingFestivals->count() }}+</div>
                    <p class="mt-1 text-sm text-slate-600">Upcoming Festivals</p>
                </div>
            </div>
        </div>

        <div class="relative">
            <div class="absolute -right-8 top-6 h-44 w-44 rounded-full bg-amber-300/30 blur-3xl"></div>
            <div class="absolute -left-6 bottom-6 h-44 w-44 rounded-full bg-orange-200/40 blur-3xl"></div>
            <div class="relative overflow-hidden rounded-[2rem] bg-slate-950 shadow-2xl shadow-slate-900/20 ring-1 ring-white/20">
                <img src="https://picsum.photos/seed/divine-hero/1200/1400" alt="Spiritual temple scene" class="h-full w-full object-cover opacity-85">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/30 to-transparent"></div>
                <div class="absolute inset-x-0 bottom-0 p-8 text-white">
                    <div class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.35em] backdrop-blur">Trusted Ritual Flow</div>
                    <p class="mt-4 max-w-md text-lg leading-8 text-slate-100">
                        A client-ready demo that feels warm, devotional, and operationally realistic from the first page.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    @include('partials.flash')
</section>

<section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="mb-8 flex items-end justify-between gap-4">
        <div>
            <span class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-700">Featured Temples</span>
            <h2 class="mt-3 text-3xl font-black text-slate-950">Temples ready for devotional booking</h2>
        </div>
        <a href="{{ route('temples.index') }}" class="hidden text-sm font-semibold text-amber-800 sm:inline-flex">View all temples</a>
    </div>
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($featuredTemples as $temple)
            <a href="{{ route('temples.show', $temple) }}" class="group overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-amber-100 transition hover:-translate-y-1 hover:shadow-xl">
                <img src="{{ $temple->featured_image }}" class="h-56 w-full object-cover transition duration-500 group-hover:scale-105" alt="{{ $temple->name }}">
                <div class="p-6">
                    <div class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-700">{{ $temple->state }}</div>
                    <h3 class="mt-2 text-xl font-bold text-slate-950">{{ $temple->name }}</h3>
                    <p class="mt-3 text-sm text-slate-600">{{ $temple->location }}</p>
                    <p class="mt-4 line-clamp-3 text-sm leading-7 text-slate-600">{{ $temple->description }}</p>
                </div>
            </a>
        @empty
            <div class="rounded-[2rem] border border-dashed border-amber-200 bg-white/70 p-8 text-sm text-slate-600 md:col-span-2 xl:col-span-3">
                No featured temples are available yet.
            </div>
        @endforelse
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="mb-8">
        <span class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-700">Featured Pujas</span>
        <h2 class="mt-3 text-3xl font-black text-slate-950">Selected pujas for meaningful rituals</h2>
    </div>
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($featuredPujas as $puja)
            <a href="{{ route('pujas.show', $puja) }}" class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-amber-100 transition hover:-translate-y-1 hover:shadow-xl">
                <img src="{{ $puja->featured_image }}" class="h-52 w-full object-cover" alt="{{ $puja->name }}">
                <div class="p-6">
                    <div class="flex flex-wrap items-center gap-2 text-xs font-semibold uppercase tracking-[0.25em] text-amber-700">
                        <span>{{ $puja->temple?->name }}</span>
                        <span>•</span>
                        <span>{{ $puja->category?->name }}</span>
                    </div>
                    <h3 class="mt-2 text-xl font-bold text-slate-950">{{ $puja->name }}</h3>
                    <p class="mt-3 line-clamp-3 text-sm leading-7 text-slate-600">{{ $puja->description }}</p>
                    <div class="mt-5 flex items-center justify-between">
                        <span class="text-sm font-semibold text-slate-900">₹{{ number_format($puja->price) }}</span>
                        <span class="rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-800">{{ $puja->duration_minutes }} mins</span>
                    </div>
                </div>
            </a>
        @empty
            <div class="rounded-[2rem] border border-dashed border-amber-200 bg-white/70 p-8 text-sm text-slate-600 md:col-span-2 xl:col-span-3">
                No featured pujas are available yet.
            </div>
        @endforelse
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
        <div class="rounded-[2rem] bg-slate-950 p-8 text-white shadow-2xl shadow-slate-900/20">
            <span class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-300">Upcoming Festivals</span>
            <h2 class="mt-3 text-3xl font-black">Celebrate the next sacred dates</h2>
            <div class="mt-8 space-y-4">
                @forelse ($upcomingFestivals as $festival)
                    <div class="flex gap-4 rounded-3xl border border-white/10 bg-white/5 p-4">
                        <img src="{{ $festival->featured_image }}" class="h-20 w-20 rounded-2xl object-cover" alt="{{ $festival->name }}">
                        <div>
                            <h3 class="text-lg font-bold">{{ $festival->name }}</h3>
                            <p class="mt-1 text-sm text-slate-300">{{ \Illuminate\Support\Carbon::parse($festival->festival_date)->format('d M Y') }}</p>
                            <p class="mt-2 text-sm leading-6 text-slate-300">{{ $festival->description }}</p>
                        </div>
                    </div>
                @empty
                    <div class="rounded-3xl border border-dashed border-white/20 bg-white/5 p-6 text-sm text-slate-300">
                        No upcoming festivals are available yet.
                    </div>
                @endforelse
            </div>
        </div>

        <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-amber-100">
            <span class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-700">Why Choose Us</span>
            <h2 class="mt-3 text-3xl font-black text-slate-950">A thoughtful journey for every booking</h2>
            <div class="mt-8 space-y-5">
                <div class="rounded-3xl bg-amber-50 p-5">
                    <h3 class="font-bold text-slate-950">Temple-first discovery</h3>
                    <p class="mt-2 text-sm leading-7 text-slate-600">Clients can explore sacred places and rituals in a clean flow built for clarity.</p>
                </div>
                <div class="rounded-3xl bg-orange-50 p-5">
                    <h3 class="font-bold text-slate-950">Family-aware sankalp details</h3>
                    <p class="mt-2 text-sm leading-7 text-slate-600">Gotra, nakshatra, and family members are handled with care in the booking process.</p>
                </div>
                <div class="rounded-3xl bg-rose-50 p-5">
                    <h3 class="font-bold text-slate-950">Demo-ready admin workflow</h3>
                    <p class="mt-2 text-sm leading-7 text-slate-600">A believable admin and user experience that can expand into the final product later.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="mb-8">
        <span class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-700">Latest Blogs</span>
        <h2 class="mt-3 text-3xl font-black text-slate-950">Helpful spiritual guidance and ritual notes</h2>
    </div>
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($latestBlogs as $blog)
            <a href="{{ route('blogs.show', $blog) }}" class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-amber-100 transition hover:-translate-y-1 hover:shadow-xl">
                <img src="{{ $blog->featured_image }}" class="h-52 w-full object-cover" alt="{{ $blog->title }}">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-slate-950">{{ $blog->title }}</h3>
                    <p class="mt-3 line-clamp-4 text-sm leading-7 text-slate-600">{{ $blog->content }}</p>
                </div>
            </a>
        @empty
            <div class="rounded-[2rem] border border-dashed border-amber-200 bg-white/70 p-8 text-sm text-slate-600 md:col-span-2 xl:col-span-3">
                No blog articles are available yet.
            </div>
        @endforelse
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="mb-8">
        <span class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-700">Testimonials</span>
        <h2 class="mt-3 text-3xl font-black text-slate-950">What devotees say about the experience</h2>
    </div>
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($testimonials as $testimonial)
            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
                <div class="flex items-center gap-1 text-amber-500">
                    @for ($i = 0; $i < $testimonial->rating; $i++)
                        <span>★</span>
                    @endfor
                </div>
                <p class="mt-4 text-sm leading-7 text-slate-600">{{ $testimonial->message }}</p>
                <div class="mt-6">
                    <div class="font-bold text-slate-950">{{ $testimonial->name }}</div>
                    <div class="text-sm text-slate-500">{{ $testimonial->designation }}</div>
                </div>
            </div>
        @empty
            <div class="rounded-[2rem] border border-dashed border-amber-200 bg-white/70 p-8 text-sm text-slate-600 md:col-span-2 xl:col-span-3">
                No testimonials are available yet.
            </div>
        @endforelse
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="overflow-hidden rounded-[2rem] bg-gradient-to-r from-slate-950 via-slate-900 to-amber-950 px-8 py-10 text-white shadow-2xl shadow-slate-900/20 sm:px-10">
        <div class="grid gap-8 lg:grid-cols-[1.2fr_0.8fr] lg:items-center">
            <div>
                <span class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-300">Call To Action</span>
                <h2 class="mt-3 text-3xl font-black sm:text-4xl">Ready to present a trusted booking experience?</h2>
                <p class="mt-4 max-w-2xl text-base leading-7 text-slate-200">
                    Start with a temple, choose a puja, select a date, and complete the booking journey in a calm, guided flow designed for client demos and future expansion.
                </p>
            </div>
            <div class="flex flex-wrap gap-3 lg:justify-end">
                <a href="{{ route('register') }}" class="rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-950 transition hover:-translate-y-0.5">Create Account</a>
                <a href="{{ route('contact') }}" class="rounded-full border border-white/20 bg-white/10 px-6 py-3 text-sm font-semibold text-white backdrop-blur transition hover:-translate-y-0.5">Contact Us</a>
            </div>
        </div>
    </div>
</section>
@endsection
