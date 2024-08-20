<?php

namespace App\Filament\Resources\Admin\Rank\RankResource\Pages;

use App\Filament\Resources\Admin\Rank\RankResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRanks extends ListRecords
{
    protected static string $resource = RankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
