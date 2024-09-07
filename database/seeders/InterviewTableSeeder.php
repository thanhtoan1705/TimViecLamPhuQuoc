<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class InterviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy ID của các bản ghi job_post_candidates
        $jobPostCandidateIds = DB::table('job_post_candidates')->pluck('id');

        // Nếu không có dữ liệu trong bảng job_post_candidates, dừng việc tạo dữ liệu cho bảng interviews
        if ($jobPostCandidateIds->isEmpty()) {
            return;
        }

        DB::table('interviews')->insert([
            [
                'job_id' => 1,
                'employer_id' => 3,
                'name' => 'Phỏng vấn nhân viên kế toán 9/2024',
                'phone' => '1234567890',
                'email' => 'interview1@example.com',
                'location' => 'Room A1, Building 1',
                'status' => 1,
                'feedback' => 'The candidate performed well.',
                'start_at' => Carbon::now()->addDays(1),
                'end_at' => Carbon::now()->addDays(1)->addHours(1),
                'color' => '#FF0000',
                'job_post_candidates' => json_encode($jobPostCandidateIds->toArray()), // ID của các bản ghi trong job_post_candidates
                'note' => 'Candidate needs to improve on communication skills.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'job_id' => 2,
                'employer_id' => 3,
                'name' => 'Phỏng vấn nhân viên bảo trì 9/2024',
                'phone' => '0987654321',
                'email' => 'interview2@example.com',
                'location' => 'Room B2, Building 3',
                'status' => 0,
                'feedback' => null,
                'start_at' => Carbon::now()->addDays(3),
                'end_at' => Carbon::now()->addDays(3)->addHours(1),
                'color' => '#00FF00',
                'job_post_candidates' => json_encode($jobPostCandidateIds->toArray()), // ID của các bản ghi trong job_post_candidates
                'note' => 'Candidate has good technical skills.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'job_id' => 3,
                'employer_id' => 3,
                'name' => 'Interview for Marketing Position',
                'phone' => '1122334455',
                'email' => 'interview3@example.com',
                'location' => 'Room C3, Building 2',
                'status' => 0,
                'feedback' => null,
                'start_at' => Carbon::now()->addDays(5),
                'end_at' => Carbon::now()->addDays(5)->addHours(2),
                'color' => '#0000FF',
                'job_post_candidates' => json_encode($jobPostCandidateIds->toArray()), // ID của các bản ghi trong job_post_candidates
                'note' => 'The candidate has a strong portfolio.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
