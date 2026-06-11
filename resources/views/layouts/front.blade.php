<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name', 'Divine Booking Platform') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f7f0e5] text-slate-900 antialiased">
    <div class="min-h-screen">
        <header class="sticky top-0 z-40 border-b border-amber-100 bg-[#f7f0e5]/90 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="grid h-11 w-11 place-items-center rounded-2xl bg-gradient-to-br from-amber-500 via-orange-500 to-rose-500 text-white shadow-lg">ॐ</div>
                    <div>
                        <div class="text-xs uppercase tracking-[0.35em] text-amber-700">Divine Booking Platform</div>
                        <div class="font-semibold text-slate-900">Temple rituals made simple</div>
                    </div>
                </a>
                <nav class="hidden items-center gap-6 text-sm font-medium lg:flex">
                    <a href="{{ route('temples.index') }}">Temples</a>
                    <a href="{{ route('pujas.index') }}">Pujas</a>
                    <a href="{{ route('festivals.index') }}">Festivals</a>
                    <a href="{{ route('blogs.index') }}">Blogs</a>
                    <a href="{{ route('panchang') }}">Panchang</a>
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('contact') }}">Contact</a>
                </nav>
                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700">Login</a>
                        <a href="{{ route('register') }}" class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white">Register</a>
                    @endauth
                </div>
            </div>
        </header>

        @if (session('status'))
            <div class="mx-auto max-w-7xl px-4 pt-4 sm:px-6 lg:px-8">
                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">{{ session('status') }}</div>
            </div>
        @endif

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
