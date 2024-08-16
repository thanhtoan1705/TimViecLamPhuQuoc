<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            [
                'blog_id' => 1,
                'user_id' => 1,
                'content' => 'Đây là bình luận đầu tiên trên bài vết đầu tiên.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'blog_id' => 1,
                'user_id' => 2,
                'content' => 'Đây là bình luận thứ hai trên bài vết đầu tiên.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
