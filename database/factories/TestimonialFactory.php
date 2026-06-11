<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Testimonial>
 */
class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'designation' => fake()->randomElement(['Devotee', 'Business Owner', 'Teacher', 'Retired Officer']),
            'message' => fake()->sentence(20),
            'rating' => fake()->numberBetween(4, 5),
        ];
    }
}
