<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Puja;
use App\Models\Temple;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Puja>
 */
class PujaFactory extends Factory
{
    protected $model = Puja::class;

    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Maha Rudrabhishek',
            'Lakshmi Puja',
            'Navagraha Shanti',
            'Ganesh Atharvashirsha',
            'Sudarshan Homa',
            'Satyanarayan Katha',
        ]);

        return [
            'temple_id' => Temple::factory(),
            'category_id' => Category::factory(),
            'name' => $name,
            'slug' => Str::slug($name.' '.fake()->unique()->numberBetween(1, 99)),
            'description' => fake()->paragraphs(3, true),
            'benefits' => fake()->paragraphs(2, true),
            'duration_minutes' => fake()->randomElement([30, 45, 60, 90, 120]),
            'price' => fake()->randomFloat(2, 500, 15000),
            'featured_image' => 'https://picsum.photos/seed/'.Str::slug($name).'/1200/800',
            'status' => fake()->randomElement(['draft', 'published']),
            'is_featured' => fake()->boolean(60),
        ];
    }
}
