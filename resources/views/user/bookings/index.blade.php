<x-app-layout>
    <x-slot name="header"><h2 class="text-2xl font-black">Bookings</h2></x-slot>
    @include('partials.flash')
    <div class="grid gap-4">
        @foreach ($bookings as $booking)
            <a href="{{ route('user.bookings.show', $booking) }}" class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="font-bold">{{ $booking->temple->name }} · {{ $booking->puja->name }}</div>
                        <div class="text-sm text-slate-600">{{ $booking->booking_date->format('d M Y') }} · {{ $booking->full_name }}</div>
                    </div>
                    <div class="text-sm font-semibold">{{ $booking->status->label() }}</div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-6">{{ $bookings->links() }}</div>
</x-app-layout>
