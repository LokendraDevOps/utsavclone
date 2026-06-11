<x-app-layout>
    <x-slot name="header">
        <div>
            <div class="text-sm uppercase tracking-[0.35em] text-amber-700">Dashboard</div>
            <h2 class="text-2xl font-black text-slate-950">Welcome back, {{ auth()->user()->name }}</h2>
        </div>
    </x-slot>

    <div class="grid gap-6 lg:grid-cols-4">
        @foreach ($stats as $stat)
            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
                <div class="text-sm text-slate-600">{{ $stat['label'] }}</div>
                <div class="mt-2 text-3xl font-black">{{ $stat['value'] }}</div>
            </div>
        @endforeach
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-2">
        <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold">Recent Bookings</h3>
                <a href="{{ route('user.bookings.index') }}" class="text-sm font-semibold text-amber-700">View all</a>
            </div>
            <div class="mt-4 space-y-4">
                @forelse ($recentBookings as $booking)
                    <div class="rounded-2xl bg-amber-50 p-4">
                        <div class="font-semibold">{{ $booking->temple->name }} · {{ $booking->puja->name }}</div>
                        <div class="text-sm text-slate-600">{{ $booking->booking_date->format('d M Y') }} · {{ $booking->status->label() }}</div>
                    </div>
                @empty
                    <div class="text-sm text-slate-600">No bookings yet.</div>
                @endforelse
            </div>
        </div>
        <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold">Quick Start</h3>
                <a href="{{ route('user.bookings.start') }}" class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white">Book Now</a>
            </div>
            <div class="mt-4 space-y-3 text-sm text-slate-600">
                <p>Start a puja booking, add your family members, and store gotra information for future rituals.</p>
                <p>The dashboard links the spiritual booking story to an operationally useful member area.</p>
            </div>
        </div>
    </div>
</x-app-layout>
