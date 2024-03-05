<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coursecategory;
use Faker\Factory as Faker;

class CoursecategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $categories = [
            'Web Development',
            'Mobile Development',
            'Data Science',
            'Machine Learning',
            'Artificial Intelligence',
            'Blockchain',
            'Cybersecurity',
            'Cloud Computing',
            'DevOps',
            'UI/UX Design'
        ];

        foreach ($categories as $category) {
            Coursecategory::create([
                'coursecategory_name' => $category
            ]);
        }
    }
}
