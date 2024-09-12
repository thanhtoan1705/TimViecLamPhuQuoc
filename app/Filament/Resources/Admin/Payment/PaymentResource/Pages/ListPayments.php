<?php

namespace App\Filament\Resources\Admin\Payment\PaymentResource\Pages;

use App\Filament\Resources\Admin\Payment\PaymentResource;
use App\Filament\Resources\Admin\Payment\PaymentResource\Widgets\PaymentChart;
use App\Filament\Resources\Admin\Payment\PaymentResource\Widgets\StatsRevenue;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPayments extends ListRecords
{
    protected static string $resource = PaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsRevenue::class,
            PaymentChart::class,
        ];
    }
}
