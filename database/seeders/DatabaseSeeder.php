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
        \App\Models\User::factory(10)->create();
        \App\Models\Course::factory(10)->create();
        \App\Models\CourseTopic::factory(10)->create();
        \App\Models\CoursePrice::factory(10)->create();
        \App\Models\Slider::factory(10)->create();
        \App\Models\Faq::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Chris',
        //     'email' => 'admin@lda.com',
        // ]);
    }
}
