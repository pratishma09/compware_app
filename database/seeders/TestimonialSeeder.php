<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;
use Faker\Factory as Faker;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $numberOfTestimonials = 10;

        for ($i = 0; $i < $numberOfTestimonials; $i++) {
            Testimonial::create([
                'testimonial_name' => $faker->name,
                'testimonial_desc' => $faker->paragraph,
                'testimonial_image' => $faker->imageUrl(),
                'course_id' => $faker->numberBetween(1, 10)
            ]);
        }
    }
}
