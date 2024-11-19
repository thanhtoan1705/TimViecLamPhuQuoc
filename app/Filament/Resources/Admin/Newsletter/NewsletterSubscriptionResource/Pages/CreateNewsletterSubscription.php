<?php

namespace App\Filament\Resources\Admin\Newsletter\NewsletterSubscriptionResource\Pages;

use App\Filament\Resources\Admin\Newsletter\NewsletterSubscriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsletterSubscription extends CreateRecord
{
    protected static string $resource = NewsletterSubscriptionResource::class;
}
