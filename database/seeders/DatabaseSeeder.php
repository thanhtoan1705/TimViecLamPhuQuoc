<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserTableSeeder::class,
            AddressTableSeeder::class,
            MajorTableSeeder::class,
            ResumeTableSeeder::class,
            ExperienceTableSeeder::class,
            EducationTableSeeder::class,
            SkillTableSeeder::class,
            DegreeTableSeeder::class,
            CandidateTableSeeder::class,
            EmployerTableSeeder::class,
            BlogCategoryTableSeeder::class,
            BlogTableSeeder::class,
            CommentTableSeeder::class,
            JobTypeTableSeeder::class,
            JobCategoryTableSeeder::class,
            RankTableSeeder::class,
            JobPostTableSeeder::class,
            InterviewTableSeeder::class,
            JobPostPackagesTableSeeder::class,
            PaymentTableSeeder::class,
            UserJobPackageSeeder::class,
        ]);
    }
}
