<?php

use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Puja;
use App\Models\Temple;
use App\Models\User;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
});

it('allows super admin to update booking status', function () {
    $admin = User::factory()->create(['email_verified_at' => now()]);
    $admin->assignRole('Super Admin');
    $user = User::factory()->create(['email_verified_at' => now()]);
    $temple = Temple::factory()->create();
    $category = Category::factory()->create();
    $puja = Puja::factory()->create([
        'temple_id' => $temple->id,
        'category_id' => $category->id,
        'status' => 'published',
    ]);
    $booking = Booking::factory()->create([
        'user_id' => $user->id,
        'temple_id' => $temple->id,
        'puja_id' => $puja->id,
        'status' => BookingStatus::Pending,
    ]);

    $this->actingAs($admin);

    $this->patch(route('admin.bookings.status', $booking, absolute: false), [
        'status' => BookingStatus::Confirmed->value,
    ])->assertRedirect();

    $this->assertDatabaseHas('bookings', [
        'id' => $booking->id,
        'status' => BookingStatus::Confirmed->value,
    ]);
});
