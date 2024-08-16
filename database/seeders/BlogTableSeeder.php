<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert([
            [
                'title' => 'Bài viết 1',
                'slug' => 'Bai-viet-1',
                'content' => 'Đây là nội dung của bài viết.',
                'image' => 'blog1.png',
                'published_at' => '2023-08-01',
                'user_id' => 1,
                'category_id' => 1,
                'view' => 100,
                'meta_title' => 'bài viết 1',
                'meta_description' => 'Đây là mô tả meta cho bài viết.',
                'meta_keyword' => 'bai-viet, mot',
                'is_publish' => true,
                'is_delete' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bài viết 2',
                'slug' => 'Bai-viet-2',
                'content' => 'Đây là nội dung của bài viết.',
                'image' => 'blog2.png',
                'published_at' => '2023-08-02',
                'user_id' => 2,
                'category_id' => 2,
                'view' => 100,
                'meta_title' => 'bài viết 2',
                'meta_description' => 'Đây là mô tả meta cho bài viết.',
                'meta_keyword' => 'bai-viet, hai',
                'is_publish' => true,
                'is_delete' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
