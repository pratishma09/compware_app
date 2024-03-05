<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $numberOfCourses = 10;

        for ($i = 0; $i < $numberOfCourses; $i++) {
            Course::create([
                'course_name' => $faker->sentence,
                'course_schedule' => $faker->randomElement(['Morning', 'Afternoon', 'Evening']),
                'course_desc' => $faker->paragraph,
                'course_logo' => $faker->imageUrl(),
                'course_fee' => $faker->randomFloat(2, 100, 1000),
                'course_startdate' => $faker->dateTimeBetween('-1 year', '+1 year'),
                'course_enddate' => $faker->dateTimeBetween('now', '+2 years'),
                'course_pdf' => $faker->url,
                'team_id' => $faker->numberBetween(1, 10), 
                'coursecategory_id' => $faker->numberBetween(1, 10) 
            ]);
        }
    }
}
