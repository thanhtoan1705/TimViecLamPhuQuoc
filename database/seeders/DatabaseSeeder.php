<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            ProvinceTableSeeder::class,
            DistrictTableSeeder::class,
            WardTableSeeder::class,
            UserTableSeeder::class,
            AddressTableSeeder::class,
            MajorTableSeeder::class,
            SalaryTableSeeder::class,
            ResumeTableSeeder::class,
            ExperienceTableSeeder::class,
            EducationTableSeeder::class,
            SkillTableSeeder::class,
            DegreeTableSeeder::class,
            CandidateTableSeeder::class,
            EmployerTableSeeder::class,
            BlogCategoryTableSeeder::class,
            BlogTableSeeder::class,
//            CommentTableSeeder::class,
            JobTypeTableSeeder::class,
            JobCategoryTableSeeder::class,
            RankTableSeeder::class,
            JobPostTableSeeder::class,
            InterviewTableSeeder::class,
            JobPostPackagesTableSeeder::class,
            PromotionSeeder::class,
            MerchantSeeder::class,
            TransactionSeeder::class,
            TransactionLogSeeder::class,
            PaymentMethodSeeder::class,
            PaymentTableSeeder::class,
            UserJobPackageSeeder::class,
            JobPostCandidateTableSeeder::class,
            SavedJobSeeder::class,
            AssignEmployerPermissionsSeeder::class,
        ]);
    }
}
