<?php

namespace App\Filament\Resources\Major\MajorResource\Pages;

use App\Filament\Resources\Major\MajorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMajor extends CreateRecord
{
    protected static string $resource = MajorResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
