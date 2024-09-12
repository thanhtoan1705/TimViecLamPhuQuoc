<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('job_categories')->insert([
            [
                'name' => 'Technology',
                'slug' => Str::slug('Technology'),
                'image' => 'logo.png',
                'order' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Healthcare',
                'slug' => Str::slug('Healthcare'),
                'image' => 'logo1.png',
                'order' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Finance',
                'slug' => Str::slug('Finance'),
                'image' => 'logo2.png',
                'order' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Education',
                'slug' => Str::slug('Education'),
                'image' => 'logo3.png',
                'order' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Thêm các danh mục khác nếu cần
        ]);
    }
}
