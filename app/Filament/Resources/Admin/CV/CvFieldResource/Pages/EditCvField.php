<?php

namespace App\Filament\Resources\Admin\CV\CvFieldResource\Pages;

use App\Filament\Resources\Admin\CV\CvFieldResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCvField extends EditRecord
{
    protected static string $resource = CvFieldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
