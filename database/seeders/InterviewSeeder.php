<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class InterviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('interviews')->insert([
            [
                'candidate_id' => 1, // Đảm bảo rằng candidate_id này tồn tại trong bảng candidates
                'job_id' => 1, // Đảm bảo rằng job_id này tồn tại trong bảng jobs
                'employer_id' => 1, // Đảm bảo rằng employer_id này tồn tại trong bảng employers
                'name' => 'John Doe',
                'phone' => '123-456-7890',
                'email' => 'johndoe@example.com',
                'time' => '10:00:00',
                'viewer' => 'HR Manager',
                'location' => 'Office 101',
                'status' => 1, // 1: đã hoàn thành, 0: chưa hoàn thành
                'feedback' => 'Good interview, promising candidate.',
                'date' => '2024-08-16',
                'note' => 'Discussed project management skills.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'candidate_id' => 1, // Đảm bảo rằng candidate_id này tồn tại trong bảng candidates
                'job_id' => 1, // Đảm bảo rằng job_id này tồn tại trong bảng jobs
                'employer_id' => 1, // Đảm bảo rằng employer_id này tồn tại trong bảng employers
                'name' => 'Jane Smith',
                'phone' => '987-654-3210',
                'email' => 'janesmith@example.com',
                'time' => '14:00:00',
                'viewer' => 'Technical Lead',
                'location' => 'Office 202',
                'status' => 0, // 1: đã hoàn thành, 0: chưa hoàn thành
                'feedback' => 'Candidate has good technical skills.',
                'date' => '2024-08-17',
                'note' => 'Further review needed for team fit.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Thêm các bản ghi khác nếu cần
        ]);
    }
}
