<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('blogs')->insert([
            'blogs_name' => $faker->sentence,
            'blogs_author' => $faker->name,
            'blogs_desc' => $faker->paragraph,
            'blogs_date'=>$faker->date,
            'blogs_slug' => Str::slug($faker->sentence),
            'blogs_image' => $faker->imageUrl()
        ]);
    }
}
