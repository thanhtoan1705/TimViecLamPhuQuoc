<?php

namespace App\Filament\Resources\Employer\Promotional\PromotionalResource\Pages;

use App\Filament\Resources\Employer\Promotional\PromotionalResource;
use Filament\Resources\Pages\Page;

class CustomView extends Page
{
    protected static string $resource = PromotionalResource::class;
    protected static ?string $navigationLabel = 'Mã giảm giá';
    protected static string $view = 'filament.resources.employer.promotional.pages.custom-view';
}
