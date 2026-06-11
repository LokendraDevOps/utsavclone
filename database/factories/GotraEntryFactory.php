<?php

namespace Database\Factories;

use App\Models\GotraEntry;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<GotraEntry>
 */
class GotraEntryFactory extends Factory
{
    protected $model = GotraEntry::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'gotra' => fake()->randomElement(['Bharadwaj', 'Kashyap', 'Vashishtha', 'Atri', 'Gautam']),
            'description' => fake()->sentence(),
            'is_default' => fake()->boolean(50),
        ];
    }
}
