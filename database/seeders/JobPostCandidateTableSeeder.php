<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobPost;
use App\Models\Candidate;
use Illuminate\Support\Facades\DB;

class JobPostCandidateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách các job_posts và candidates có sẵn
        $jobPosts = JobPost::all()->pluck('id');
        $candidates = Candidate::all()->pluck('id');

        // Tạo dữ liệu mẫu cho bảng job_post_candidates
        foreach ($jobPosts as $jobPostId) {
            // Random số lượng ứng viên cho mỗi job_post
            $randomCandidates = $candidates->random(rand(1, 5));

            foreach ($randomCandidates as $candidateId) {
                // Kiểm tra sự tồn tại của job_post_id và candidate_id trước khi thêm
                if ($jobPosts->contains($jobPostId) && $candidates->contains($candidateId)) {
                    DB::table('job_post_candidates')->insert([
                        'job_post_id' => $jobPostId,
                        'candidate_id' => $candidateId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
