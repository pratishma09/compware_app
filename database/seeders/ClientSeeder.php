<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $numberOfClients = 10;

        for ($i = 0; $i < $numberOfClients; $i++) {
            Client::create([
                'client_name' => $faker->company,
                'client_image' => $faker->imageUrl()
            ]);
        }
    }
}
