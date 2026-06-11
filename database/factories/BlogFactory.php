<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Blog>
 */
class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition(): array
    {
        $title = fake()->sentence(6);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => fake()->paragraphs(5, true),
            'featured_image' => 'https://picsum.photos/seed/'.Str::slug($title).'/1200/800',
            'status' => fake()->randomElement(['draft', 'published']),
            'published_at' => now(),
        ];
    }
}
