<?php

namespace App\Filament\Resources\Employer\Promotional\PromotionalResource\Pages;

use App\Filament\Resources\Employer\Promotional\PromotionalResource;
use App\Models\Promotion;
use Filament\Resources\Pages\Page;
use Carbon\Carbon;

class CustomView extends Page
{
    protected static string $resource = PromotionalResource::class;
    protected static ?string $navigationLabel = 'Mã giảm giá';
    protected static string $view = 'filament.resources.employer.promotional.pages.custom-view';

    public $packages;

    public function mount()
    {
        $now = Carbon::now();

        $this->packages = [
            'status_0' => Promotion::where('status', 0)->get(), // đã sử dụng
            'status_1' => Promotion::where('status', 1)->where('end_time', '>', $now)->get(), // có hiệu lực
            'status_2' => Promotion::where('status', 1)->where('end_time', '<', $now)->get(), // hết hạn
        ];
    }
}
