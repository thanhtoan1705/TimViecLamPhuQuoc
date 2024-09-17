<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('majors')->insert([
            [
                'name' => 'Quản lý nhà hàng',
                'describe' => 'Study of computers and computational systems.',
                'slug' => 'computer-science',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý khách sạn',
                'describe' => 'Engineering field focused on electrical and electronic systems.',
                'slug' => 'electrical-engineering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
