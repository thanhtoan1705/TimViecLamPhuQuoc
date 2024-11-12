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

    public function canPurchasePackage($package)
    {
        if ($package->display_best == 1) {
            $totalActiveUsers = JobPostPackage::getTotalActiveUsersWithDisplayBest();
            return $totalActiveUsers < 6;
        }
        if ($package->display_top == 1) {
            $totalActiveUsers = JobPostPackage::getTotalActiveUsersWithDisplayTop();
            return $totalActiveUsers < 6;
        }
        return true;
    }

    public function mount()
    {
        $employerId = auth()->user()->employer->id;
        $this->packages = JobPostPackage::all();
        $this->userpackages = UserJobPackage::where('employer_id', $employerId)->get();
    }
}
