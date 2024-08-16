<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('candidates')->insert([
            [
                'user_id' => 1,
                'major_id' => 1,
                'resume_id' => 1,
                'experience_id' => 1,
                'education_id' => 1,
                'skill_id' => 1,
                'degree_id' => 1,
                'address_id' => 1,
                'salary' => 50000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'major_id' => 1,
                'resume_id' => 1,
                'experience_id' => 1,
                'education_id' => 1,
                'skill_id' => 1,
                'degree_id' => 1,
                'address_id' => 1,
                'salary' => 60000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
