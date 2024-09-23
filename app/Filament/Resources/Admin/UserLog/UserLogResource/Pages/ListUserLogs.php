<?php

namespace App\Filament\Resources\Admin\UserLog\UserLogResource\Pages;

use App\Filament\Resources\Admin\UserLog\UserLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserLogs extends ListRecords
{
    protected static string $resource = UserLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
