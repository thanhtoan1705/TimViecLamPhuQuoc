<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResumeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resumes')->insert([
            [
                'name' => 'Nguyễn Văn A',
                'file' => 'nguyen_van_a_resume.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Trần Thị B',
                'file' => 'tran_thi_b_resume.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Thêm các bản ghi khác nếu cần
        ]);
    }
}
