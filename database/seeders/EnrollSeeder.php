<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enroll;
use Faker\Factory as Faker;

class EnrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $numberOfEnrollments = 10;

        for ($i = 0; $i < $numberOfEnrollments; $i++) {
            Enroll::create([
                'enroll_name' => $faker->name,
                'course_id' => $faker->numberBetween(1, 10), 
                'enroll_phone' => $faker->phoneNumber,
                'enroll_email' => $faker->unique()->safeEmail,
                'enroll_schedule' => $faker->randomElement(['Morning', 'Afternoon', 'Evening'])
            ]);
        }
    }
}
