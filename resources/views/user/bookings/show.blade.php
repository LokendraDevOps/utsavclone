<x-app-layout>
    <x-slot name="header"><h2 class="text-2xl font-black">Booking Details</h2></x-slot>
    <div class="grid gap-6 lg:grid-cols-2">
        <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
            <div class="text-sm uppercase tracking-[0.35em] text-amber-700">{{ $booking->status->label() }}</div>
            <div class="mt-2 text-2xl font-bold">{{ $booking->temple->name }}</div>
            <p class="mt-3 text-slate-600">{{ $booking->puja->name }}</p>
            <div class="mt-6 space-y-2 text-sm">
                <div><strong>Name:</strong> {{ $booking->full_name }}</div>
                <div><strong>Gotra:</strong> {{ $booking->gotra }}</div>
                <div><strong>Nakshatra:</strong> {{ $booking->nakshatra ?? 'N/A' }}</div>
                <div><strong>Date:</strong> {{ $booking->booking_date->format('d M Y') }}</div>
            </div>
        </div>
        <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
            <h3 class="text-xl font-bold">Family Members</h3>
            <div class="mt-4 space-y-3">
                @foreach ($booking->members as $member)
                    <div class="rounded-2xl bg-amber-50 p-4">{{ $member->name }} <span class="text-sm text-slate-600">({{ $member->relation }})</span></div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
