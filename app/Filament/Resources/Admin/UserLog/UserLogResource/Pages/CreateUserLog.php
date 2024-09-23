<?php

namespace App\Filament\Resources\Admin\UserLog\UserLogResource\Pages;

use App\Filament\Resources\Admin\UserLog\UserLogResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserLog extends CreateRecord
{
    protected static string $resource = UserLogResource::class;
}
