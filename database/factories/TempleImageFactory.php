<?php

namespace Database\Factories;

use App\Models\Temple;
use App\Models\TempleImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TempleImage>
 */
class TempleImageFactory extends Factory
{
    protected $model = TempleImage::class;

    public function definition(): array
    {
        return [
            'temple_id' => Temple::factory(),
            'image_path' => 'https://picsum.photos/seed/temple-image-'.fake()->unique()->numberBetween(1, 9999).'/1200/800',
            'caption' => fake()->sentence(4),
        ];
    }
}
