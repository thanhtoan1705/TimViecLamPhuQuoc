<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\JobPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SavedJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobPosts = JobPost::all();
        $candidates = Candidate::all();

        foreach ($candidates as $candidate) {
            $savedJobPosts = $jobPosts->random(rand(1, 3));

            foreach ($savedJobPosts as $jobPost) {
                DB::table('saved_jobs')->insert([
                    'candidate_id' => $candidate->id,
                    'job_post_id' => $jobPost->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
