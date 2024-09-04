<?php

namespace App\Filament\Resources\Employer\BuyServices\BuyServicesResource\Pages;

use App\Filament\Resources\Employer\BuyServices\BuyServicesResource;
use App\Models\JobPostPackage;
use Filament\Resources\Pages\Page;

class CustomView extends Page
{
    protected static string $resource = BuyServicesResource::class;
    protected static ?string $navigationLabel = 'Mua gói';
    protected static string $view = 'filament.resources.employer.buy-services.pages.custom-view';

    public $packages;

    public function mount()
    {
        $this->packages = JobPostPackage::all(); // Lấy tất cả các gói từ bảng JobPostPackage
    }
}
