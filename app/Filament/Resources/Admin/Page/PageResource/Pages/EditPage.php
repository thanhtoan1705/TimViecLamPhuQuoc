<?php

namespace App\Filament\Resources\Admin\Page\PageResource\Pages;

use App\Filament\Resources\Admin\Page\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
