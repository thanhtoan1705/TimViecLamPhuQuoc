<?php

namespace App\Filament\Resources\Employer\BuyServices\BuyServicesResource\Pages;

use App\Filament\Resources\Employer\BuyServices\BuyServicesResource;
use App\Models\JobPostPackage;
use App\Models\UserJobPackage;
use Filament\Resources\Pages\Page;

class CustomView extends Page
{
    protected static string $resource = BuyServicesResource::class;
    protected static ?string $navigationLabel = 'Mua gói';
    protected static string $view = 'filament.resources.employer.buy-services.pages.custom-view';

    public $packages;
    public $userpackages;
    public $employerId;

    public function mount()
    {
        $employerId = auth()->id();
        $this->packages = JobPostPackage::all();
        $this->userpackages = UserJobPackage::where('employer_id', $employerId)->get();
    }
}
