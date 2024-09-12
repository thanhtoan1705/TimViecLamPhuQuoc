<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('salaries')->insert([
            [
                'name' => 'Dưới 1 triệu',
                'slug' => 'duoi-1-trieu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '1 - 3 Triệu',
                'slug' => '1-3-trieu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '3 - 5 Triệu',
                'slug' => '3-5-trieu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '5 - 10 Triệu',
                'slug' => '5-10-trieu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Trên 5 Triệu',
                'slug' => 'tren-5-trieu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Thỏa thuận',
                'slug' => 'thoa-thuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
