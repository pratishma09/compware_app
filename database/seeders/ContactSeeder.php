<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use Faker\Factory as Faker;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $numberOfContacts = 10;

        for ($i = 0; $i < $numberOfContacts; $i++) {
            Contact::create([
                'contact_name' => $faker->name,
                'contact_number' => $faker->phoneNumber,
                'contact_email' => $faker->unique()->safeEmail,
                'contact_message' => $faker->paragraph
            ]);
        }
    }
}
