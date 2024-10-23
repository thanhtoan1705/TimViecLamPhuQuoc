<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Candidate;

class WorkExperienceTableSeeder extends Seeder
{
    public function run(): void
    {

            DB::table('work_experiences')->insert([
                [
                    'candidate_id' => 2,
                    'position' => 'Lập trình viên PHP',
                    'company_name' => 'Công ty ABC',
                    'start_date' => '2020-01-01',
                    'end_date' => '2022-12-31',
                    'description' => 'Phát triển và bảo trì các ứng dụng web sử dụng PHP và Laravel.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'candidate_id' => 1,
                    'position' => 'Kỹ sư phần mềm',
                    'company_name' => 'Startup XYZ',
                    'start_date' => '2023-01-01',
                    'end_date' => null,
                    'description' => 'Thiết kế và phát triển các tính năng mới cho sản phẩm chính của công ty.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        ]);
    }
}
