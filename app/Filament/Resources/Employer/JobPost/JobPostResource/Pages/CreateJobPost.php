<?php

namespace App\Filament\Resources\Employer\JobPost\JobPostResource\Pages;

use App\Filament\Resources\Employer\JobPost\JobPostResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateJobPost extends CreateRecord
{
    protected static string $resource = JobPostResource::class;


    // Tạo slug
    public function mutateFormDataBeforeCreate(array $data): array
    {
        $companyName = Auth::user()->employer->company_name;
        // Tạo slug trước khi tạo bản ghi mới
        $data['slug'] = Str::slug($companyName . '-tuyen-dung-' . $data['title']);
        return $data;
    }

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->submit(null)
            ->requiresConfirmation()
            ->action( function() {
                $this->closeActionModal();
                $this->create();
            });
    }

}
