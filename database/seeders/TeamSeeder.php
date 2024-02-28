<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use Faker\Factory as Faker;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $numberOfTeams = 10;

        for ($i = 0; $i < $numberOfTeams; $i++) {
            Team::create([
                'team_name' => $faker->name,
                'team_post' => $faker->randomElement(['team', 'trainer']),
                'team_role' => $faker->word,
                'team_email' => $faker->unique()->safeEmail,
                'team_description' => $faker->paragraph,
                'team_signature' => $faker->imageUrl(),
                'team_image' => $faker->imageUrl()
            ]);
        }
    }
}
