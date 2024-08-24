<?php

namespace App\Filament\Resources\Admin\Promotional\PromotionalResource\Pages;

use App\Filament\Resources\Admin\Promotional\PromotionalResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePromotional extends CreateRecord
{
    protected static string $resource = PromotionalResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
