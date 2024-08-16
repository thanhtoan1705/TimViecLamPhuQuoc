<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class JobTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('job_types')->insert([
            [
                'name' => 'Full-time',
                'slug' => Str::slug('Full-time'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Part-time',
                'slug' => Str::slug('Part-time'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Contract',
                'slug' => Str::slug('Contract'),
                 'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Internship',
                'slug' => Str::slug('Internship'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Thêm các loại công việc khác nếu cần
        ]);
    }
}
