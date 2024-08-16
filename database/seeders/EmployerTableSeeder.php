<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employers')->insert([
            [
                'user_id' => 1,
                'address_id' => 1,
                'slug' => 'employer-1',
                'name' => 'Employer 1',
                'phone' => '0123456789',
                'since' => '2020-01-01',
                'company_logo' => 'logo1.png',
                'tax_code' => '123456789',
                'description' => 'Đây là mô tả dành cho Nhà tuyển dụng 1.',
                'website_url' => 'https://employer1.com',
                'facebook_url' => 'https://facebook.com/employer1',
                'company_size' => '100-200',
                'company_type' => 'IT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'address_id' => 2,
                'slug' => 'employer-2',
                'name' => 'Employer 2',
                'phone' => '0987654321',
                'since' => '2020-01-01',
                'company_logo' => 'logo2.png',
                'tax_code' => '123456789',
                'description' => 'Đây là mô tả dành cho Nhà tuyển dụng 2.',
                'website_url' => 'https://employer2.com',
                'facebook_url' => 'https://facebook.com/employer2',
                'company_size' => '1000-2000',
                'company_type' => 'IT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
