<?php

use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Puja;
use App\Models\Temple;
use App\Models\User;

it('creates a booking through the booking flow', function () {
    $user = User::factory()->create(['email_verified_at' => now()]);
    $temple = Temple::factory()->create();
    $category = Category::factory()->create();
    $puja = Puja::factory()->create([
        'temple_id' => $temple->id,
        'category_id' => $category->id,
        'status' => 'published',
    ]);

    $this->actingAs($user);

    $this->post(route('user.bookings.temple', absolute: false), [
        'temple_id' => $temple->id,
    ])->assertRedirect(route('user.bookings.start', absolute: false));

    $this->post(route('user.bookings.puja', absolute: false), [
        'puja_id' => $puja->id,
    ])->assertRedirect(route('user.bookings.start', absolute: false));

    $this->post(route('user.bookings.date', absolute: false), [
        'booking_date' => now()->addDay()->format('Y-m-d'),
    ])->assertRedirect(route('user.bookings.start', absolute: false));

    $this->post(route('user.bookings.sankalp', absolute: false), [
        'full_name' => 'Test Devotee',
        'gotra' => 'Bharadwaj',
        'nakshatra' => 'Rohini',
        'family_members' => ['Parent One', 'Parent Two'],
    ])->assertRedirect(route('user.bookings.summary', absolute: false));

    $this->post(route('user.bookings.confirm', absolute: false))
        ->assertRedirect();

    $this->assertDatabaseHas('bookings', [
        'user_id' => $user->id,
        'temple_id' => $temple->id,
        'puja_id' => $puja->id,
        'full_name' => 'Test Devotee',
        'status' => BookingStatus::Pending->value,
    ]);

    expect(Booking::query()->where('user_id', $user->id)->first()->members()->count())->toBe(2);
});
