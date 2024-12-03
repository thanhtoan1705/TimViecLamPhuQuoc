<?php

namespace App\Filament\Resources\Employer\JobPost\JobPostResource\Pages;

use App\Filament\Resources\Employer\JobPost\JobPostResource;
use App\Models\BenefitJob;
use App\Models\JobPost;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Filament\Support\Enums\IconPosition;

class CreateJobPost extends CreateRecord
{
    protected static string $resource = JobPostResource::class;


    // Tạo slug
    public function mutateFormDataBeforeCreate(array $data): array
    {
        $companyName = Auth::user()->employer->company_name;

        //Id của jobpost
        $maxId = JobPost::max('id');
        $id = $maxId + 1;

        // Tạo slug trước khi tạo bản ghi mới
        $data['slug'] = Str::slug($companyName . '-tuyen-dung-' . $data['title']. '-'. $id);

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





    // Customise the "Create" button
    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->label('Tạo bài đăng')
            ->icon('heroicon-o-folder-plus')
            ->iconPosition(IconPosition::Before);
    }

    // Customise the "Create & Create Another" button
    protected function getCreateAnotherFormAction(): Action
    {
        return parent::getCreateAnotherFormAction()
            ->icon('heroicon-o-plus-circle')
            ->iconPosition(IconPosition::Before);
    }

    // Customise the "Cancel" button
    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
            ->icon('heroicon-o-arrow-left');
    }

}
