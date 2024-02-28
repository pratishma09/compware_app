<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestCertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('requestcertificates')->insert([
        'name'=>'user',
        'email' => 'dtc@gmail.com',
        'contact' =>'admin123',
        'startdate' => '1985-12-29',
        'enddate' => '2007-08-09',
        'duration'=>2,
        'course_id'=>2,
        'team_id'=>2,
        ]);
    }
}
