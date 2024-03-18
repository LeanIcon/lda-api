<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\testimony>
 */
class TestimonyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->name(),
            'comment' => fake()->sentence(4), // Sentence with 4 words
            'star_rating' => fake()->randomDigit(1 - 5),
            'is_visible' => fake()->boolean(70),
            'course_id' => fake()->text(), // Create a related CoursePrice
        ];
    }
}
