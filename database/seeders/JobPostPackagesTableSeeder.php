<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobPostPackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_post_packages')->insert([
            [
                'title' => 'Gói cơ bản',
                'price' => 1999,
                'period' => '30 days',
                'quantity' => 5,
                'limit_job_post' => 5,
                'display_top' => false,
                'display_best' => false,
                'display_haste' => false,
                'descriptions' => 'This is a basic job post package.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Gói cao cấp',
                'price' => 4999,
                'period' => '60 days',
                'quantity' => 10,
                'limit_job_post' => 10,
                'display_top' => false,
                'display_best' => false,
                'display_haste' => false,
                'descriptions' => 'This is a premium job post package with top display options.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
