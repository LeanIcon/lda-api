<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseDate>
 */
class CourseDateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date('Y-m-d', strtotime('+1 week', $this->faker->date)),
            'tag' => $this->faker->word,
            'course_id' => Course::factory(),
        ];
    }
}
