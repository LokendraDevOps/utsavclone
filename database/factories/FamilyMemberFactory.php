<?php

namespace Database\Factories;

use App\Models\FamilyMember;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FamilyMember>
 */
class FamilyMemberFactory extends Factory
{
    protected $model = FamilyMember::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->name(),
            'relation' => fake()->randomElement(['Father', 'Mother', 'Spouse', 'Son', 'Daughter']),
            'date_of_birth' => fake()->date(),
            'gender' => fake()->randomElement(['Male', 'Female', 'Other']),
        ];
    }
}
