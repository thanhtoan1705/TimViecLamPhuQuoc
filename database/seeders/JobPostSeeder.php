<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class JobPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_posts')->insert([
            [
                'title' => 'Software Engineer',
                'slug' => Str::slug('Software Engineer'),
                'job_category_id' => 1,
                'major_id' => 1,
                'employer_id' => 1,
                'experience_id' => 2,
                'job_type_id' => 1,
                'rank_id' => 1,
                'degrees_id' => 1,
                'start_date' => now(),
                'end_date' => now()->addMonths(1),
                'description' => 'We are looking for a Software Engineer...',
                'meta_title' => 'Software Engineer Job',
                'meta_description' => 'Exciting opportunity for a Software Engineer.',
                'meta_keyword' => 'software, engineer, job',
                'salary_min' => 50000,
                'salary_max' => 100000,
                'quantity' => 5,
                'status' => 1,
                'premium' => 0,
                'address' => '123 Main St, City, Country',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Marketing Manager',
                'slug' => Str::slug('Marketing Manager'),
                'job_category_id' => 2,
                'major_id' => 3,
                'employer_id' => 2,
                'experience_id' => 3,
                'job_type_id' => 2,
                'rank_id' => 2,
                'degrees_id' => 2,
                'start_date' => now(),
                'end_date' => now()->addMonths(2),
                'description' => 'We are looking for a Marketing Manager...',
                'meta_title' => 'Marketing Manager Job',
                'meta_description' => 'Lead our marketing efforts as a Marketing Manager.',
                'meta_keyword' => 'marketing, manager, job',
                'salary_min' => 60000,
                'salary_max' => 120000,
                'quantity' => 3,
                'status' => 1,
                'premium' => 1,
                'address' => '456 Another St, City, Country',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Marketing Manager',
                'slug' => Str::slug('Marketing Manager'),
                'job_category_id' => 2,
                'major_id' => 3,
                'employer_id' => 2,
                'experience_id' => 3,
                'job_type_id' => 2,
                'rank_id' => 2,
                'degrees_id' => 2,
                'start_date' => now(),
                'end_date' => now()->addMonths(2),
                'description' => 'We are looking for a Marketing Manager...',
                'meta_title' => 'Marketing Manager Job',
                'meta_description' => 'Lead our marketing efforts as a Marketing Manager.',
                'meta_keyword' => 'marketing, manager, job',
                'salary_min' => 60000,
                'salary_max' => 120000,
                'quantity' => 3,
                'status' => 1,
                'premium' => 1,
                'address' => '456 Another St, City, Country',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more job entries here...
        ]);
    }
}
