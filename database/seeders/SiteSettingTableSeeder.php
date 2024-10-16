<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_settings')->insert([
            'company_name' => 'Công ty TNHH phần mềm Tech core',
            'brand_name' => 'Việc Làm Phú Quốc - Nền tảng tìm việc uy tín tại Phú Quốc',
            'slogan' => 'Việc Làm Phú Quốc - Nền tảng tìm việc uy tín tại Phú Quốc',
            'logo_website' => '',
            'logo_mobile' => '',
            'favicon' => '',
            'copyright' => '© 2024 Việc Làm Phú Quốc - Nền tảng tuyển dụng và tìm việc uy tín.',
            'website_status' => 1,
            'short_intro' => 'Giới thiệu ngắn gọn về công ty',
            'company_address' => 'An Khánh, Ninh Kiều, Cần Thơ',
            'transaction_office' => 'An Khánh, Ninh Kiều, Cần Thơ',
            'tax_code' => '123456789',
            'hotline' => '0336216546',
            'hotline_technical' => '0336216546',
            'hotline_sales' => '0336216546',
            'landline' => '0336216546',
            'email' => 'vieclamphuquoc.hotro@gmail.com',
            'website' => 'https://www.vieclamphuquoc.com.vn/',
            'map' => '',
            'seo_title' => 'Việc Làm Phú Quốc - Nền tảng tìm việc uy tín tại Phú Quốc',
            'seo_keywords' => 'Việc Làm Phú Quốc - Nền tảng tìm việc uy tín tại Phú Quốc',
            'seo_description' => 'Tìm việc dễ dàng và nhanh chóng với hàng nghìn cơ hội nghề nghiệp tại Phú Quốc.',
            'seo_image' => '',
            'facebook' => 'https://facebook.com/',
            'youtube' => 'https://youtube.com/',
            'twitter' => 'https://twitter.com/',
            'tiktok' => 'https://tiktok.com/',
            'instagram' => 'https://instagram.com/',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
