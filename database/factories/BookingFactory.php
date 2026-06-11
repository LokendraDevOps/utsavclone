<?php

namespace Database\Factories;

use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\Puja;
use App\Models\Temple;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        $puja = Puja::factory()->create();

        return [
            'user_id' => User::factory(),
            'temple_id' => $puja->temple_id,
            'puja_id' => $puja->id,
            'booking_date' => fake()->dateTimeBetween('+1 day', '+3 months')->format('Y-m-d'),
            'full_name' => fake()->name(),
            'gotra' => fake()->randomElement(['Bharadwaj', 'Kashyap', 'Vashishtha', 'Atri']),
            'nakshatra' => fake()->randomElement(['Ashwini', 'Bharani', 'Krittika', 'Rohini']),
            'special_instructions' => fake()->sentence(),
            'amount' => $puja->price,
            'status' => BookingStatus::Pending,
        ];
    }
}
