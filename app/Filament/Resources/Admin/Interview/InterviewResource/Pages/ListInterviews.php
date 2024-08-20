<?php

namespace App\Filament\Resources\Admin\Interview\InterviewResource\Pages;

use App\Filament\Resources\Admin\Interview\InterviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInterviews extends ListRecords
{
    protected static string $resource = InterviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
