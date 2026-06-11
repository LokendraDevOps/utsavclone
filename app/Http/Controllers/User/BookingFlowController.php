<?php

namespace App\Http\Controllers\User;

use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Puja;
use App\Models\Temple;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class BookingFlowController extends Controller
{
    public function stepOne()
    {
        $selectedTemple = session('booking.temple_id') ? Temple::find(session('booking.temple_id')) : null;

        return view('user.bookings.flow', [
            'step' => 1,
            'temples' => Temple::query()->orderBy('name')->get(),
            'selectedTemple' => $selectedTemple,
            'templePujas' => $selectedTemple
                ? Puja::query()->where('temple_id', $selectedTemple->id)->with('category')->orderBy('name')->get()
                : collect(),
            'selectedPuja' => session('booking.puja_id') ? Puja::find(session('booking.puja_id')) : null,
            'summary' => session('booking'),
        ]);
    }

    public function storeTemple(Request $request)
    {
        $data = $request->validate([
            'temple_id' => ['required', 'exists:temples,id'],
        ]);

        session(['booking.temple_id' => (int) $data['temple_id']]);
        session()->forget(['booking.puja_id', 'booking.booking_date', 'booking.sankalp']);

        return redirect()->route('user.bookings.start');
    }

    public function storePuja(Request $request)
    {
        $data = $request->validate([
            'puja_id' => ['required', 'exists:pujas,id'],
        ]);

        session(['booking.puja_id' => (int) $data['puja_id']]);

        return redirect()->route('user.bookings.start');
    }

    public function storeDate(Request $request)
    {
        $data = $request->validate([
            'booking_date' => ['required', 'date', 'after_or_equal:today'],
        ]);

        session(['booking.booking_date' => $data['booking_date']]);

        return redirect()->route('user.bookings.start');
    }

    public function storeSankalp(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'gotra' => ['required', 'string', 'max:255'],
            'nakshatra' => ['nullable', 'string', 'max:255'],
            'family_members' => ['nullable', 'array'],
            'family_members.*' => ['nullable', 'string', 'max:255'],
        ]);

        session(['booking.sankalp' => $data]);

        return redirect()->route('user.bookings.summary');
    }

    public function summary()
    {
        return $this->stepOne();
    }

    public function confirm()
    {
        $bookingState = session('booking', []);

        abort_unless(isset($bookingState['temple_id'], $bookingState['puja_id'], $bookingState['booking_date'], $bookingState['sankalp']), 422, 'Booking flow is incomplete.');

        $puja = Puja::findOrFail($bookingState['puja_id']);

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'temple_id' => $bookingState['temple_id'],
            'puja_id' => $bookingState['puja_id'],
            'booking_date' => $bookingState['booking_date'],
            'full_name' => $bookingState['sankalp']['full_name'],
            'gotra' => $bookingState['sankalp']['gotra'],
            'nakshatra' => $bookingState['sankalp']['nakshatra'] ?? null,
            'special_instructions' => null,
            'amount' => $puja->price,
            'status' => BookingStatus::Pending,
        ]);

        foreach (Arr::wrap($bookingState['sankalp']['family_members'] ?? []) as $memberName) {
            if ($memberName) {
                $booking->members()->create([
                    'name' => $memberName,
                    'relation' => 'Family Member',
                ]);
            }
        }

        session()->forget('booking');

        return redirect()->route('user.bookings.show', $booking)->with('status', 'Booking created successfully.');
    }
}
