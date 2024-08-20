<?php

namespace App\Filament\Resources\Admin\Payment\PaymentResource\Pages;

use App\Filament\Resources\Admin\Payment\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPayment extends EditRecord
{
    protected static string $resource = PaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
