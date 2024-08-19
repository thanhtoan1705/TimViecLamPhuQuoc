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
                'title' => 'Basic Package',
                'price' => 100000,
                'period' => '30 days',
                'quantity' => 10,
                'limit_job_post' => 5,
                'display_top' => true,
                'display_best' => true,
                'display_haste' => true,
                'descriptions' => 'This is the basic package for job posting.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Standard Package',
                'price' => 200000,
                'period' => '60 days',
                'quantity' => 20,
                'limit_job_post' => 10,
                'display_top' => true,
                'display_best' => true,
                'display_haste' => true,
                'descriptions' => 'This is the standard package for job posting.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
