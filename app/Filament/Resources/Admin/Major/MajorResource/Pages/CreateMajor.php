<?php

namespace App\Filament\Resources\Admin\Major\MajorResource\Pages;

use App\Filament\Resources\Admin\Major\MajorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMajor extends CreateRecord
{
    protected static string $resource = MajorResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
