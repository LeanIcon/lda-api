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
        $faker = $this->faker;

        return [
            'title' => $faker->unique()->sentence,
            'slug' => $faker->unique()->slug,
            'abbreviation' => $faker->unique()->text(5),
            'summary' => $faker->paragraph(2),
            'description' => $faker->paragraph(3),
            'featured' => $faker->randomElement(['yes', 'no']),
            'level' => $faker->randomElement(['beginner', 'intermediate', 'advanced']),
            'status' => $faker->randomElement(['enable', 'disable']),
            'duration' => $faker->randomNumber(2) . ' weeks', // Example duration format
            'banner' => $faker->imageUrl(1000, 300), // Placeholder image URL
            'thumbnail' => $faker->imageUrl(300, 300), // Placeholder image URL
            'badge' => $faker->imageUrl(200, 200), // Placeholder image URL
            'brochure' => $faker->url, // Placeholder brochure URL
            'delivery_mode' => $faker->randomElement(['Online', 'Blended']),
            'tag' => $faker->word,
            'cert_sample' => $faker->imageUrl(500, 300), // Placeholder image URL
            'category_id' => rand(1, 10), // Replace with logic to assign a valid category ID



            // 'title' => fake()->sentence(4), // Sentence with 4 words
            // 'summary' => fake()->paragraph,
            // 'description' => fake()->paragraph,
            // 'duration' => fake(), // Create a related CoursePrice
            // 'banner' => fake()->imageUrl(800, 600),
            // 'thumbnail' => fake()->imageUrl(400, 300),
            // 'slug' => fake()->unique()->slug,
            // 'badge' => fake()->imageUrl(200, 200),
            // 'brochure_url' => fake()->url, // Assuming you have brochures as URLs
            // 'is_featured' => fake()->boolean(10),
            // 'status' => fake()->text(),
            // 'course_type' => fake()->randomElement(/* Array of options */),
            // 'course_tag' => fake()->randomElement(/* Array of options */),
            // 'certificate' => fake()->url,
            // 'abbreviation' => fake()->text,
        ];
    }

    // public function creating(Course $course)
    // {
    //     $faker = $course->factory(); // Access Faker through model
    //     // Logic to create a related CoursePrice before course creation
    //     $course->price()->create([
    //         'price' => $faker->randomNumber(4), // Example price generation
    //         'currency' => 'USD', // Example currency
    //     ]);
    // }

    // public function forMicrosoft365Fundamentals()
    // {
    //     return $this->state([
    //         'title' => 'Microsoft 365 Fundamentals',
    //     ]);
    // }

    // public function forDigitalProductOwner()
    // {
    //     return $this->state([
    //         'title' => 'Digital Product Owner',
    //     ]);
    // }
}
