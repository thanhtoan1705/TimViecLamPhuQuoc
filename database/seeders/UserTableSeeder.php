<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Toan',
                'image' => 'path/to/image.jpg',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password'),
                'phone' => '1234567890',
                'remember_token' => null,
                'email_verified_at' => now(),
                'role' => 'candidate',
                'google_id' => null,
                'facebook_id' => null,
            ],
            [
                'name' => 'Khoa',
                'image' => 'path/to/image.jpg',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password'),
                'phone' => '0987654321',
                'remember_token' => null,
                'email_verified_at' => now(),
                'role' => 'employer',
                'google_id' => null,
                'facebook_id' => null,
            ],
        ]);
    }
}
