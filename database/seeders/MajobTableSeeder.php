<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('majors')->insert([
            [
                'name' => 'Computer Science',
                'describe' => 'Study of computers and computational systems.',
                'slug' => 'computer-science',
            ],
            [
                'name' => 'Electrical Engineering',
                'describe' => 'Engineering field focused on electrical and electronic systems.',
                'slug' => 'electrical-engineering',
            ],
        ]);
    }
}
