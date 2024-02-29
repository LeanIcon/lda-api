<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' =>  fake()->imageUrl(1920, 1080),
            'description' =>  fake()->paragraph(),
            'cta_name' =>  fake()->text(),
            'cta_url' =>  fake()->url(),
            'button_name' =>  fake()->text(),
            'button_url' =>  fake()->url()
        ];
    }
}
