<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'synopsis' => fake()->text(),
            'duration' => fake()->numberBetween(100,200),
            'youtube' => fake()->url(),
            'cover' => fake()->imageUrl(),
            'released_at' => fake()->dateTimeBetween('-50 years', '+10 years'),
            'category_id' => Category::factory(),
        ];
    }
}
