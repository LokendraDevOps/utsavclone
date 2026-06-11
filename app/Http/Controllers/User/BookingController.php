<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        return view('user.bookings.index', [
            'bookings' => auth()->user()->bookings()->with(['temple', 'puja', 'members'])->latest()->paginate(10),
        ]);
    }

    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);

        $booking->load(['temple', 'puja', 'members']);

        return view('user.bookings.show', compact('booking'));
    }
}
