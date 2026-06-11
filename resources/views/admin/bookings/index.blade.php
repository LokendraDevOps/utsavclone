@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between">
    <h1 class="text-3xl font-black">Bookings</h1>
</div>
<form method="GET" class="mt-6 flex flex-col gap-3 rounded-[2rem] bg-white p-4 text-slate-950 shadow-sm md:flex-row">
    <input name="search" value="{{ request('search') }}" class="w-full rounded-xl border-slate-300" placeholder="Search name, gotra, or email">
    <select name="status" class="w-full rounded-xl border-slate-300">
        <option value="">All Statuses</option>
        @foreach ($statuses as $value => $label)
            <option value="{{ $value }}" @selected(request('status') === $value)>{{ $label }}</option>
        @endforeach
    </select>
    <button class="rounded-full bg-amber-400 px-5 py-3 font-semibold text-slate-950">Filter</button>
</form>
<div class="mt-6 overflow-hidden rounded-[2rem] bg-white text-slate-950 shadow-sm">
    <table class="min-w-full divide-y divide-slate-200">
        <thead class="bg-slate-50 text-left text-sm">
            <tr>
                <th class="px-6 py-4">Name</th>
                <th class="px-6 py-4">Temple</th>
                <th class="px-6 py-4">Date</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            @foreach ($bookings as $booking)
                <tr>
                    <td class="px-6 py-4 font-semibold">{{ $booking->full_name }}</td>
                    <td class="px-6 py-4">{{ $booking->temple->name }}</td>
                    <td class="px-6 py-4">{{ $booking->booking_date->format('d M Y') }}</td>
                    <td class="px-6 py-4">{{ $booking->status->label() }}</td>
                    <td class="px-6 py-4"><a href="{{ route('admin.bookings.show', $booking) }}" class="font-semibold text-amber-700">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $bookings->links() }}</div>
@endsection
