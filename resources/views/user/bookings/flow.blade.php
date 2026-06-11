<x-app-layout>
    <x-slot name="header">
        <div>
            <div class="text-sm uppercase tracking-[0.35em] text-amber-700">Booking Workflow</div>
            <h2 class="text-2xl font-black">Book a puja in 6 steps</h2>
        </div>
    </x-slot>
    @include('partials.flash')

    <div class="space-y-6">
        <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
            <h3 class="text-xl font-bold">Step 1: Select Temple</h3>
            <form method="POST" action="{{ route('user.bookings.temple') }}" class="mt-4 flex gap-3">
                @csrf
                <select name="temple_id" class="w-full rounded-xl border-slate-300">
                    <option value="">Choose a temple</option>
                    @foreach ($temples as $temple)
                        <option value="{{ $temple->id }}" @selected(($selectedTemple?->id) === $temple->id)>{{ $temple->name }}</option>
                    @endforeach
                </select>
                <button class="rounded-full bg-slate-900 px-5 py-3 font-semibold text-white">Save</button>
            </form>
        </div>

        @if ($selectedTemple)
            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
                <h3 class="text-xl font-bold">Step 2: Select Puja</h3>
                <form method="POST" action="{{ route('user.bookings.puja') }}" class="mt-4 flex gap-3">
                    @csrf
                    <select name="puja_id" class="w-full rounded-xl border-slate-300">
                        <option value="">Choose a puja</option>
                        @foreach ($templePujas as $puja)
                            <option value="{{ $puja->id }}" @selected(($selectedPuja?->id) === $puja->id)>{{ $puja->name }} (₹{{ number_format($puja->price, 0) }})</option>
                        @endforeach
                    </select>
                    <button class="rounded-full bg-slate-900 px-5 py-3 font-semibold text-white">Save</button>
                </form>
            </div>
        @endif

        @if (! empty($summary['puja_id']))
            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
                <h3 class="text-xl font-bold">Step 3: Select Date</h3>
                <form method="POST" action="{{ route('user.bookings.date') }}" class="mt-4 flex gap-3">
                    @csrf
                    <input type="date" name="booking_date" class="w-full rounded-xl border-slate-300" value="{{ $summary['booking_date'] ?? '' }}">
                    <button class="rounded-full bg-slate-900 px-5 py-3 font-semibold text-white">Save</button>
                </form>
            </div>

            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
                <h3 class="text-xl font-bold">Step 4: Enter Sankalp Details</h3>
                <form method="POST" action="{{ route('user.bookings.sankalp') }}" class="mt-4 space-y-4">
                    @csrf
                    <div class="grid gap-4 md:grid-cols-2">
                        <input name="full_name" class="rounded-xl border-slate-300" placeholder="Full Name" value="{{ $summary['sankalp']['full_name'] ?? auth()->user()->name }}">
                        <input name="gotra" class="rounded-xl border-slate-300" placeholder="Gotra" value="{{ $summary['sankalp']['gotra'] ?? '' }}">
                        <input name="nakshatra" class="rounded-xl border-slate-300" placeholder="Nakshatra" value="{{ $summary['sankalp']['nakshatra'] ?? '' }}">
                        <input name="family_members[]" class="rounded-xl border-slate-300" placeholder="Family Member 1">
                        <input name="family_members[]" class="rounded-xl border-slate-300" placeholder="Family Member 2">
                        <input name="family_members[]" class="rounded-xl border-slate-300" placeholder="Family Member 3">
                    </div>
                    <button class="rounded-full bg-slate-900 px-5 py-3 font-semibold text-white">Save Sankalp</button>
                </form>
            </div>
        @endif

        @if (! empty($summary['sankalp']))
            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
                <h3 class="text-xl font-bold">Step 5: Booking Summary</h3>
                <div class="mt-4 space-y-2 text-sm">
                    <div><strong>Temple:</strong> {{ $selectedTemple?->name }}</div>
                    <div><strong>Puja:</strong> {{ $selectedPuja?->name }}</div>
                    <div><strong>Date:</strong> {{ $summary['booking_date'] }}</div>
                    <div><strong>Full Name:</strong> {{ $summary['sankalp']['full_name'] }}</div>
                    <div><strong>Gotra:</strong> {{ $summary['sankalp']['gotra'] }}</div>
                    <div><strong>Nakshatra:</strong> {{ $summary['sankalp']['nakshatra'] ?? 'N/A' }}</div>
                </div>
                <form method="POST" action="{{ route('user.bookings.confirm') }}" class="mt-6">
                    @csrf
                    <button class="rounded-full bg-amber-400 px-5 py-3 font-semibold text-slate-950">Confirm Booking</button>
                </form>
            </div>
        @endif
    </div>
</x-app-layout>
