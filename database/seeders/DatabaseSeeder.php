<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            BlogSeeder::class,
            ClientSeeder::class,
            ContactSeeder::class,
            CoursecategorySeeder::class,
            TeamSeeder::class,
            CourseSeeder::class,
            RequestCertificateSeeder::class,
            EnrollSeeder::class,
            EventSeeder::class,
            EventgallerySeeder::class,
            PlacementSeeder::class,
            TestimonialSeeder::class
        ]);
    }
}
