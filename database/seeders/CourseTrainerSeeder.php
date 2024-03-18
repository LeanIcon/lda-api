<?php

namespace Database\Seeders;

use App\Models\CourseTrainer;
use App\Models\Trainer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseTrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainers = [
            [
                'name' => 'Daniel Korsinah',
                'expertise' => 'Digital Transformation Expert',
                'phone' => '+1234567890',
                'bio' => 'John Doe is a seasoned web developer with over 10 years of experience. He specializes in building user-friendly and scalable web applications.',
                'social_url' => 'https://www.linkedin.com/in/john-doe-1234',
                // 'course_id' => 1, // Replace with the actual ID of an existing course
            ],
            [
                'name' => 'William Korsinah',
                'expertise' => 'Agile, Leadership Consultant',
                'phone' => '+9876543210',
                'bio' => 'Jane Smith is a data scientist with a passion for extracting insights from data. She has experience in machine learning and data analysis.',
                'social_url' => 'https://twitter.com/jane_data',
                // 'course_id' => 2, // Replace with the actual ID of an existing course
            ],
            [
                'name' => 'Carlos',
                'expertise' => 'Agile Transformation Consultant',
                'phone' => '+9876543210',
                'bio' => 'Jane Smith is a data scientist with a passion for extracting insights from data. She has experience in machine learning and data analysis.',
                'social_url' => 'https://twitter.com/jane_data',
                // 'course_id' => 2, // Replace with the actual ID of an existing course
            ],
            [
                'name' => 'Tom Collins',
                'expertise' => 'Microsoft Power User',
                'phone' => '+9876543210',
                'bio' => 'Jane Smith is a data scientist with a passion for extracting insights from data. She has experience in machine learning and data analysis.',
                'social_url' => 'https://twitter.com/jane_data',
                // 'course_id' => 2, // Replace with the actual ID of an existing course
            ],
            [
                'name' => 'Frank Acquah',
                'expertise' => 'Data Science',
                'phone' => '+9876543210',
                'bio' => 'Jane Smith is a data scientist with a passion for extracting insights from data. She has experience in machine learning and data analysis.',
                'social_url' => 'https://twitter.com/jane_data',
                // 'course_id' => 2, // Replace with the actual ID of an existing course
            ],
            [
                'name' => 'Joseph Star Botchway',
                'expertise' => 'Data Science',
                'phone' => '+9876543210',
                'bio' => 'Jane Smith is a data scientist with a passion for extracting insights from data. She has experience in machine learning and data analysis.',
                'social_url' => 'https://twitter.com/jane_data',
                // 'course_id' => 2, // Replace with the actual ID of an existing course
            ],
            [
                'name' => 'Redeemer Dela',
                'expertise' => 'Data Science',
                'phone' => '+9876543210',
                'bio' => 'Jane Smith is a data scientist with a passion for extracting insights from data. She has experience in machine learning and data analysis.',
                'social_url' => 'https://twitter.com/jane_data',
                // 'course_id' => 2, // Replace with the actual ID of an existing course
            ],
            [
                'name' => 'Christian Amoakohene',
                'expertise' => 'Data Science',
                'phone' => '+9876543210',
                'bio' => 'Jane Smith is a data scientist with a passion for extracting insights from data. She has experience in machine learning and data analysis.',
                'social_url' => 'https://twitter.com/jane_data',
                // 'course_id' => 2, // Replace with the actual ID of an existing course
            ],
            [
                'name' => 'Kwesi Mensah Atta',
                'expertise' => 'Data Science',
                'phone' => '+9876543210',
                'bio' => 'Jane Smith is a data scientist with a passion for extracting insights from data. She has experience in machine learning and data analysis.',
                'social_url' => 'https://twitter.com/jane_data',
                // 'course_id' => 2, // Replace with the actual ID of an existing course
            ],
            [
                'name' => 'Samuel Amui',
                'expertise' => 'Data Science',
                'phone' => '+9876543210',
                'bio' => 'Jane Smith is a data scientist with a passion for extracting insights from data. She has experience in machine learning and data analysis.',
                'social_url' => 'https://twitter.com/jane_data',
                // 'course_id' => 2, // Replace with the actual ID of an existing course
            ],
            [
                'name' => 'Curtis Mensah',
                'expertise' => 'Data Science',
                'phone' => '+9876543210',
                'bio' => 'Jane Smith is a data scientist with a passion for extracting insights from data. She has experience in machine learning and data analysis.',
                'social_url' => 'https://twitter.com/jane_data',
                // 'course_id' => 2, // Replace with the actual ID of an existing course
            ],
            // Add more trainer data as needed
        ];

        foreach ($trainers as $data) {
            Trainer::create($data);
        }
    }
}
