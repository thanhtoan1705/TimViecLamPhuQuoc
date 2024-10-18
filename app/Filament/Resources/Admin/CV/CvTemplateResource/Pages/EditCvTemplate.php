<?php

namespace App\Filament\Resources\Admin\CV\CvTemplateResource\Pages;

use App\Filament\Resources\Admin\CV\CvTemplateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditCvTemplate extends EditRecord
{
    protected static string $resource = CvTemplateResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['template_content_display'] = htmlspecialchars($data['template_content']);
        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['template_content'] = strip_tags($data['template_content_display']);
        return parent::handleRecordUpdate($record, $data);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
