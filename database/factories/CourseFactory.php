<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4), // Sentence with 4 words
            'summary' => fake()->paragraph,
            'description' => fake()->paragraph,
            'start_date' => fake()->date, // Create a related CoursePrice
            'duration' => fake()->date($format = 'm' ), // Create a related CoursePrice
            'banner' => fake()->imageUrl(800, 600),
            'thumbnail' => fake()->imageUrl(400, 300),
            'slug' => fake()->unique()->slug,
            'badge' => fake()->imageUrl(200, 200),
            'brochure_url' => fake()->url, // Assuming you have brochures as URLs
            'syllabus_url' => fake()->url,
            'is_featured' => fake()->boolean(10),
            'is_active' => fake()->boolean(90),
            'course_type' => fake()->randomElement(/* Array of options */),
            'course_tag' => fake()->randomElement(/* Array of options */),
        ];
    }
}
