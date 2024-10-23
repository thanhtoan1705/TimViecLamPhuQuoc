<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Candidate;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('education')->insert([
                [
                    'candidate_id' => 1,
                    'major_name' => 'Khoa học Máy tính',
                    'institution_name' => 'Đại học Ví Dụ',
                    'start_date' => '2023-09-01',
                    'end_date' => '2027-06-30',
                    'classification' => 'Giỏi',
                    'gpa' => 3.75,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'candidate_id' => 2,
                    'major_name' => 'Quản trị Kinh doanh',
                    'institution_name' => 'Trường Kinh doanh Ví Dụ',
                    'start_date' => '2023-09-01',
                    'end_date' => '2026-06-30',
                    'classification' => 'Xuất sắc',
                    'gpa' => 3.90,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
}
