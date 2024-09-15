<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_us')->insert([

            'introduction' => '',
            'img_introduction' => '',
            'vision' => '',
            'img_vision' => '',
            'mission' => '',
            'img_mission' => '',
            'student_each_year' => '',
            'professional_teacher' => '',
            'awards' => '',
            'year_of_experiences' => '',

        ]);
    }
}
