<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TrainerSeeder::class,
        ]);

        // \App\Models\User::factory(3)->create();
        // \App\Models\Course::factory(3)->create();


        \App\Models\Slider::factory(5)->create();
        \App\Models\Faq::factory(10)->create();
        \App\Models\Testimony::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Chris',
            'email' => 'admin@lda.com',
            'is_admin' => true,
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Professional',
            'description' => 'Our Professional based on courses',
            'status' => 'active',
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Certificate',
            'description' => 'All Our Certificate based on courses',
            'status' => 'active',
        ]);

           \App\Models\Category::factory()->create([
            'name' => 'Career Accelerator',
            'description' => 'Our Career Building Courses',
            'status' => 'active',
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Workshops',
            'description' => 'Our Workshops based on courses',
            'status' => 'active',
        ]);

        // \App\Models\Course::factory(15)->create();

        // \App\Models\Curriculum::factory(10)->create();
        // \App\Models\CoursePrice::factory(10)->create();
    }
}
