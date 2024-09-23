<?php

namespace App\Filament\Resources\Admin\UserLog\UserLogResource\Pages;

use App\Filament\Resources\Admin\UserLog\UserLogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserLog extends EditRecord
{
    protected static string $resource = UserLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
