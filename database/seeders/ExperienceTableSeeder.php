<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('experiences')->insert([
            [
                'name' => 'Software Developer',
                'slug' => 'software-developer',
            ],
            [
                'name' => 'Project Manager',
                'slug' => 'project-manager',
            ],
        ]);
    }
}
