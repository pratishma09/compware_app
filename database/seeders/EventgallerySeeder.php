<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Eventgallery;
use Faker\Factory as Faker;

class EventgallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $numberOfGalleries = 10;

        for ($i = 0; $i < $numberOfGalleries; $i++) {
            $eventgallery = Eventgallery::create([
                'gallery_name' => $faker->sentence,
            ]);

            for ($j = 0; $j < 5; $j++) { 
                $eventgallery->images()->create([
                    'image' => $faker->imageUrl()
                ]);
            }
        }
    }
}
