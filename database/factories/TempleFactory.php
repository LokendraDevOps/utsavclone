<?php

namespace Database\Factories;

use App\Models\Temple;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Temple>
 */
class TempleFactory extends Factory
{
    protected $model = Temple::class;

    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Kashi Vishwanath Temple',
            'Sree Padmanabhaswamy Temple',
            'Badrinath Temple',
            'Jagannath Temple',
            'Somnath Temple',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraphs(3, true),
            'location' => fake()->city().', '.fake()->state(),
            'state' => fake()->state(),
            'featured_image' => 'https://picsum.photos/seed/'.Str::slug($name).'/1200/800',
            'gallery' => [
                'https://picsum.photos/seed/'.Str::slug($name).'-1/1200/800',
                'https://picsum.photos/seed/'.Str::slug($name).'-2/1200/800',
            ],
            'is_featured' => fake()->boolean(60),
        ];
    }
}
