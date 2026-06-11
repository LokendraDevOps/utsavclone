@extends('layouts.admin')

@section('content')
<div class="grid gap-6 lg:grid-cols-2">
    <div class="rounded-[2rem] bg-white p-6 text-slate-950 shadow-sm">
        <h1 class="text-3xl font-black">{{ $booking->full_name }}</h1>
        <div class="mt-4 space-y-2 text-sm">
            <div><strong>Temple:</strong> {{ $booking->temple->name }}</div>
            <div><strong>Puja:</strong> {{ $booking->puja->name }}</div>
            <div><strong>Date:</strong> {{ $booking->booking_date->format('d M Y') }}</div>
            <div><strong>Gotra:</strong> {{ $booking->gotra }}</div>
            <div><strong>Status:</strong> {{ $booking->status->label() }}</div>
        </div>
    </div>
    <div class="rounded-[2rem] bg-white p-6 text-slate-950 shadow-sm">
        <h2 class="text-xl font-bold">Update Status</h2>
        <form method="POST" action="{{ route('admin.bookings.status', $booking) }}" class="mt-4 space-y-4">
            @csrf @method('PATCH')
            <select name="status" class="w-full rounded-xl border-slate-300">
                @foreach (\App\Enums\BookingStatus::cases() as $status)
                    <option value="{{ $status->value }}" @selected($booking->status === $status)>{{ $status->label() }}</option>
                @endforeach
            </select>
            <button class="rounded-full bg-amber-400 px-5 py-3 font-semibold text-slate-950">Save</button>
        </form>
        <div class="mt-6">
            <h3 class="text-lg font-bold">Members</h3>
            <div class="mt-3 space-y-2">
                @foreach ($booking->members as $member)
                    <div class="rounded-2xl bg-slate-50 p-3">{{ $member->name }} · {{ $member->relation }}</div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
