<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserJobPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_job_packages')->insert([
            [
                'employer_id' => 1,
                'packages_id' => 1,
                'remaining_posts' => 10,
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employer_id' => 1,
                'packages_id' => 1,
                'remaining_posts' => 5,
                'expires_at' => Carbon::now()->addDays(15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more data as needed
        ]);
    }
}
