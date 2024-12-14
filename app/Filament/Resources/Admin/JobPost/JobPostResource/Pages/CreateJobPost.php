<?php

namespace App\Filament\Resources\Admin\JobPost\JobPostResource\Pages;

use App\Filament\Resources\Admin\JobPost\JobPostResource;
use App\Models\BenefitJob;
use App\Models\JobPost;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateJobPost extends CreateRecord
{
    protected static string $resource = JobPostResource::class;


    public function mutateFormDataBeforeCreate(array $data): array
    {
        // Chế độ phúc lợi

        $benefitJob = BenefitJob::create([
            'insurance' => $data['benefitJob']['insurance'],
            'annual_leave' => $data['benefitJob']['annual_leave'],
            'uniform' => $data['benefitJob']['uniform'],
            'salary_increase' => $data['benefitJob']['salary_increase'],
            'bonus' => $data['benefitJob']['bonus'],
            'training' => $data['benefitJob']['training'],
            'allowance' => $data['benefitJob']['allowance'] ?? false,
            'laptop' => $data['benefitJob']['laptop'] ?? false,
            'business_trip' => $data['benefitJob']['business_trip'] ?? false,
            'travel' => $data['benefitJob']['travel'] ?? false,
            'seniority_allowance' => $data['benefitJob']['seniority_allowance'] ?? false,
            'healthcare' => $data['benefitJob']['healthcare'] ?? false,
            'shuttle_bus' => $data['benefitJob']['shuttle_bus'] ?? false,
            'sports_club' => $data['benefitJob']['sports_club'] ?? false,
            'international_travel' => $data['benefitJob']['international_travel'] ?? false,
            'description' => $data['benefitJob']['description'] ?? null,

        ]);

        $data['benefit_job_id'] = $benefitJob->id;


        return $data;
    }
}
