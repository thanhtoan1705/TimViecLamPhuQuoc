<?php

namespace Database\Seeders;

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
                'company_name' => 'Employer 1',
                'company_phone' => '0123456789',
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
                'company_name' => 'Employer 2',
                'company_phone' => '0987654321',
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
            [
                'user_id' => 3,
                'address_id' => 3,
                'slug' => 'Công ty phần mềm Ksoft',
                'company_name' => 'cong-ty-ksoft-3',
                'company_phone' => '0987654321',
                'since' => '2020-01-01',
                'company_logo' => 'images/employer/01J73DDRMPH7VMN8PHZMDQAZWF.png',
                'tax_code' => '123456789',
                'description' => 'Đây là mô tả dành cho Nhà tuyển dụng 2.',
                'website_url' => 'https://khoait.online',
                'facebook_url' => 'https://www.facebook.com/nguyenleanhkhoa03/',
                'company_size' => '100',
                'company_type' => 'IT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
