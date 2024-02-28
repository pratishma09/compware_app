<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $numberOfEvents = 10;

        for ($i = 0; $i < $numberOfEvents; $i++) {
            Event::create([
                'event_name' => $faker->sentence,
                'event_ep' => $faker->randomElement(['I', 'II']),
                'event_role' => $faker->randomElement(['Panelist','Host & Moderator']),
                'event_desc' => $faker->paragraph,
                'event_image' => $faker->imageUrl()
            ]);
        }
    }
}
