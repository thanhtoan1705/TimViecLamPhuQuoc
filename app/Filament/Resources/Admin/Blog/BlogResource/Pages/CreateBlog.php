<?php

namespace App\Filament\Resources\Admin\Blog\BlogResource\Pages;

use App\Filament\Resources\Admin\Blog\BlogResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\NewsletterSubscription;
use App\Jobs\Client\NewBlogPostNotification;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;

//    protected function afterCreate(): void
//    {
//        $blog = $this->record;
//
//        $subscribers = NewsletterSubscription::where('status', 1)->pluck('email');
//
//        foreach ($subscribers as $email) {
//            dispatch(new NewBlogPostNotification($blog, $email));
//        }
//    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
