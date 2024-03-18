<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CoursePrice>
 */
class CoursePriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => fake()->randomFloat(2, 5, 1000), // Example range
            'early_bird_price' => fake()->randomFloat(2, 5, 1000),
            'early_bird_start_date' => fake()->date,
            'early_bird_end_date' => fake()->dateTimeBetween('-1  week', '+1 week'), // Example range
            'discount' => fake()->numberBetween(5, 50), // Percentage
            'course_id' => fake()->numberBetween(1, 30), // Percentage
        ];
    }
}
