<?php

namespace Database\Factories;

use App\Models\Festival;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Festival>
 */
class FestivalFactory extends Factory
{
    protected $model = Festival::class;

    public function definition(): array
    {
        $name = fake()->randomElement(['Maha Shivratri', 'Janmashtami', 'Navratri', 'Ganesh Chaturthi', 'Diwali']);

        return [
            'name' => $name,
            'slug' => Str::slug($name.' '.fake()->unique()->numberBetween(1, 99)),
            'festival_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'description' => fake()->paragraphs(3, true),
            'featured_image' => 'https://picsum.photos/seed/'.Str::slug($name).'/1200/800',
        ];
    }
}
