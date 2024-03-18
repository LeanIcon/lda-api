<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReviewRating>
 */
class ReviewRatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => fake()->sentence(4), // Sentence with 4 words
            'star_rating' => fake()->randomDigit(),
            'status' => fake()->paragraph,
            'course_id' => fake()->date, // Create a related CoursePrice
        ];
    }
}
