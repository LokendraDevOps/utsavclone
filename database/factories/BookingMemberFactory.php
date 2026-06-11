<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\BookingMember;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BookingMember>
 */
class BookingMemberFactory extends Factory
{
    protected $model = BookingMember::class;

    public function definition(): array
    {
        return [
            'booking_id' => Booking::factory(),
            'name' => fake()->name(),
            'relation' => fake()->randomElement(['Father', 'Mother', 'Spouse', 'Child']),
        ];
    }
}
