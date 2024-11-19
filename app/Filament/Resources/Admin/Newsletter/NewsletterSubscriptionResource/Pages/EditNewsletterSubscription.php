<?php

namespace App\Filament\Resources\Admin\Newsletter\NewsletterSubscriptionResource\Pages;

use App\Filament\Resources\Admin\Newsletter\NewsletterSubscriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewsletterSubscription extends EditRecord
{
    protected static string $resource = NewsletterSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
