<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'email' => 'Utkarsh@gmail.com',
                // 'password' => Hash::make('password'),
                'password' => Hash::make('password'),
                'role_id' => 1,
            ],
            // [
            //     'name' => 'Normal Admin',
            //     'email' => 'user@admin.com',
            //     'address' => 'Kathmandu, Nepal',
            //     'image' => '',
            //     'password' => Hash::make('password'),
            //     'user_role' => 'normal'
            // ]
        ]);
    }
}
