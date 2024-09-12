<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'email' => 'toan@gmail.com',
                'password' => Hash::make('password'),
                'phone' => '1234567890',
                'remember_token' => null,
                'email_verified_at' => now(),
                'role' => 'candidate',
                'google_id' => null,
                'facebook_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Khoa',
                'image' => 'path/to/image.jpg',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'phone' => '0987654321',
                'remember_token' => null,
                'email_verified_at' => now(),
                'role' => 'admin',
                'google_id' => null,
                'facebook_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Công ty phần mềm Ksoft',
                'image' => 'path/to/image.jpg',
                'email' => 'employer@gmail.com',
                'password' => Hash::make('password'),
                'phone' => '0336216546',
                'remember_token' => null,
                'email_verified_at' => now(),
                'role' => 'employer',
                'google_id' => null,
                'facebook_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Trần Thanh Duy',
                'image' => 'path/to/image.jpg',
                'email' => 'tranthanhduy@gmail.com',
                'password' => Hash::make('password'),
                'phone' => '0987659999',
                'remember_token' => null,
                'email_verified_at' => now(),
                'role' => 'candidate',
                'google_id' => null,
                'facebook_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nguyễn Cương',
                'image' => 'path/to/image.jpg',
                'email' => 'ngocuong@gmail.com',
                'password' => Hash::make('password'),
                'phone' => '0987659777',
                'remember_token' => null,
                'email_verified_at' => now(),
                'role' => 'candidate',
                'google_id' => null,
                'facebook_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nguyễn Tuấn',
                'image' => 'path/to/image.jpg',
                'email' => 'nguyentuan1@gmail.com',
                'password' => Hash::make('password'),
                'phone' => '0987659000',
                'remember_token' => null,
                'email_verified_at' => now(),
                'role' => 'candidate',
                'google_id' => null,
                'facebook_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nguyễn Lộc',
                'image' => 'path/to/image.jpg',
                'email' => 'nguyenloc@gmail.com',
                'password' => Hash::make('password'),
                'phone' => '0987659000',
                'remember_token' => null,
                'email_verified_at' => now(),
                'role' => 'candidate',
                'google_id' => null,
                'facebook_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
