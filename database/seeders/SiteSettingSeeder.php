<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_settings')->insert([
            'name' => 'Ram College',
            'email' => 'def@gmail.com',
            'phone_number' => '9800000000',
            'address' => 'Chitwan',
            'link_facebook' => null,
            'link_youtube' => null,
            'link_instagram' => null,
            'link_twitter' => null,
            'link_linkedin' => null,
            'link_map' => null,
            'img_logo' => null,
            'img_favicon' => null
        ]);
    
    }
}
