<?php

namespace App\Filament\Resources\Rank\RankResource\Pages;

use App\Filament\Resources\Rank\RankResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRank extends EditRecord
{
    protected static string $resource = RankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
