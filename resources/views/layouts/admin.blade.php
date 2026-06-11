<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin | '.config('app.name', 'Divine Booking Platform') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100 antialiased">
    <div class="min-h-screen lg:flex">
        <aside class="border-b border-white/10 bg-slate-900 lg:w-72 lg:border-b-0 lg:border-r">
            <div class="p-6">
                <div class="text-xs uppercase tracking-[0.35em] text-amber-300">Admin Panel</div>
                <div class="mt-2 text-2xl font-bold">Divine Booking</div>
                <p class="mt-2 text-sm text-slate-300">Bookings, temples, content, and trust signals in one place.</p>
            </div>
            <nav class="space-y-1 px-4 pb-6 text-sm">
                <a class="block rounded-xl px-4 py-3 hover:bg-white/10" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="block rounded-xl px-4 py-3 hover:bg-white/10" href="{{ route('admin.temples.index') }}">Temples</a>
                <a class="block rounded-xl px-4 py-3 hover:bg-white/10" href="{{ route('admin.pujas.index') }}">Pujas</a>
                <a class="block rounded-xl px-4 py-3 hover:bg-white/10" href="{{ route('admin.bookings.index') }}">Bookings</a>
                <a class="block rounded-xl px-4 py-3 hover:bg-white/10" href="{{ route('admin.blogs.index') }}">Blogs</a>
                <a class="block rounded-xl px-4 py-3 hover:bg-white/10" href="{{ route('admin.festivals.index') }}">Festivals</a>
                <a class="block rounded-xl px-4 py-3 hover:bg-white/10" href="{{ route('admin.testimonials.index') }}">Testimonials</a>
            </nav>
        </aside>
        <div class="flex-1">
            <header class="border-b border-white/10 bg-slate-900/80 px-6 py-4 backdrop-blur">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm text-slate-400">Logged in as</div>
                        <div class="font-semibold">{{ auth()->user()->name ?? 'Admin' }}</div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="rounded-full bg-amber-400 px-4 py-2 text-sm font-semibold text-slate-950">Logout</button>
                    </form>
                </div>
            </header>

            <main class="p-6 lg:p-8">
                @if (session('status'))
                    <div class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-200">{{ session('status') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
