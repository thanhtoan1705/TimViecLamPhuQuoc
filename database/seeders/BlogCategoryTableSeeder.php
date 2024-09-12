<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog_categories')->insert([
            [
                'order' => '1',
                'name' => 'công nghệ',
                'slug' => 'cong-nghe',
                'image' => 'cong_nghe.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => '2',
                'name' => 'kinh doanh',
                'slug' => 'kinh-doanh',
                'image' => 'kinh_doanh.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => '3',
                'name' => 'doanh nghiệp',
                'slug' => 'doanh nghiệp',
                'image' => 'doanh_nghiep.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order' => '4',
                'name' => 'sự kiên',
                'slug' => 'sự kiên',
                'image' => 'su_kien.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
