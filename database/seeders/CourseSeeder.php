<?php

namespace Database\Seeders;

use App\Models\Course;
use Database\Factories\CourseFactory;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CourseFactory::count()->create();

        // CourseFactory::create(); // Create a random course

        // CourseFactory::forMicrosoft365Fundamentals()->create(); // Create Microsoft 365 Fundamentals course

        // Create multiple courses for each type
        // CourseFactory::count(5)->forSoftwareTesting()->create();
        // $courses = [
        //     [
        //         'title' => 'Free Digiboot Course',
        //         'summary' => 'Short summary of the course',
        //         'description' => 'Welcome to our Free Bootcamp, a 3-day intensive tech exposure course designed to provide you with a comprehensive understanding of methodologies in technology and basic skills across various tech fields. Join us to explore software development, digital marketing, product management, UI/UX design, and more.',
        //         'duration' => '10 weeks',
        //         'banner' => 'path/to/course/image.jpg', // Replace with actual image path
        //         'thumbnail' => 'path/to/course/thumbnail.jpg', // Replace with actual thumbnail path
        //         'slug' => 'free-digiboot-course', // This should be unique for each course
        //         'badge' => 'path/to/badge/image.png', // Optional: Path to badge image
        //         'brochure_url' => 'https://example.com/brochure.pdf', // Optional: URL to course brochure
        //         'is_featured' => true, // Set to true if the course is featured
        //         'is_active' => true, // Set to true if the course is active
        //         'course_type' => 'bootcamp', // Replace with the actual course type
        //         'course_tag' => ['tag1', 'tag2'], // Array of course tags
        //         'abbreviation' => 'fdc', // Optional: Course abbreviation
        //         'certificate' => 'path/to/certificate/template.pdf', // Optional: Path to certificate template
        //         // 'created_by' => FilamentUser::first()->id, // Replace with the ID of the user who created the course
        //     ],

        // ];

        // // $courseData['course_tag'] = implode(', ', $courseData['course_tag']);

        // foreach ($courses as $courseData) {
        //     Course::create($courseData);
        // }
    }
}
