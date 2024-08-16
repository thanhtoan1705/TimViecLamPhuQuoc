<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DegreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('degrees')->insert([
            [
                'name' => 'Cử nhân Khoa học',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Thạc sĩ Khoa học',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tiến sĩ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
