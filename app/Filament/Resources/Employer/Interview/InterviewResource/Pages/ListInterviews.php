<?php

namespace App\Filament\Resources\Employer\Interview\InterviewResource\Pages;

use App\Filament\Resources\Employer\Interview\InterviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Employer\Interview\Widgets\InterviewCalendarWidget;

class ListInterviews extends ListRecords
{
    protected static string $resource = InterviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            InterviewCalendarWidget::class
        ];
    }
}
