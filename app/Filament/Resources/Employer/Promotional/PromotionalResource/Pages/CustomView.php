<?php

namespace App\Filament\Resources\Employer\Promotional\PromotionalResource\Pages;

use App\Filament\Resources\Employer\Promotional\PromotionalResource;
use Filament\Resources\Pages\Page;
use Filament\Notifications\Notification;

class CustomView extends Page
{
    protected static string $resource = PromotionalResource::class;
    protected static ?string $navigationLabel = 'Mã giảm giá';
    protected static string $view = 'filament.resources.employer.promotional.pages.custom-view';

    protected function getListeners()
    {
        return [
            'showNotification' => 'showNotification'
        ];
    }

    public function showNotification($message, $type = 'success')
    {
        Notification::make()
            ->title($type === 'success' ? 'Thành công!' : 'Lỗi!')
            ->body($message)
            ->status($type)
            ->send();
    }
}
