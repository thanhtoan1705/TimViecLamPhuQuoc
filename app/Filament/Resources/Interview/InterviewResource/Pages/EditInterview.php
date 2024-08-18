<?php

namespace App\Filament\Resources\Interview\InterviewResource\Pages;

use App\Filament\Resources\Interview\InterviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInterview extends EditRecord
{
    protected static string $resource = InterviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
