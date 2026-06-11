<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\FamilyMember;
use App\Models\GotraEntry;
use App\Models\Puja;
use App\Models\Temple;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('user.dashboard', [
            'stats' => [
                ['label' => 'Bookings', 'value' => $user->bookings()->count()],
                ['label' => 'Family Members', 'value' => $user->familyMembers()->count()],
                ['label' => 'Gotra Records', 'value' => $user->gotraEntries()->count()],
                ['label' => 'Upcoming Pujas', 'value' => Puja::query()->where('status', 'published')->count()],
            ],
            'recentBookings' => Booking::query()->with(['temple', 'puja'])->whereBelongsTo($user)->latest()->take(5)->get(),
            'familyMembers' => FamilyMember::query()->whereBelongsTo($user)->latest()->take(5)->get(),
            'gotras' => GotraEntry::query()->whereBelongsTo($user)->latest()->take(5)->get(),
            'featuredTemples' => Temple::query()->where('is_featured', true)->latest()->take(4)->get(),
        ]);
    }
}
