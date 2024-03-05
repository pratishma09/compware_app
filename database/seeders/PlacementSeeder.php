<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Placement;
use Faker\Factory as Faker;

class PlacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $numberOfPlacements = 10;

        for ($i = 0; $i < $numberOfPlacements; $i++) {
            Placement::create([
                'placement_name' => $faker->company,
                'placement_image' => $faker->imageUrl()
            ]);
        }
    }
}
