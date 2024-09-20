<?php

namespace App\Filament\Resources\Employer\Promotional\PromotionalResource\Pages;

use App\Filament\Resources\Employer\Promotional\PromotionalResource;
use App\Models\Promotion;
use Filament\Resources\Pages\Page;
use Carbon\Carbon;

class CustomView extends Page
{
    protected static string $resource = PromotionalResource::class;
    protected static ?string $navigationLabel = 'Mã giảm giá';
    protected static string $view = 'filament.resources.employer.promotional.pages.custom-view';

    public $packages;

    public function mount()
    {
        $now = Carbon::now();

        $this->packages = [
            'status_0' => Promotion::where('status', 0)->get(), // đã sử dụng
            'status_1' => Promotion::where('status', 1)->where('end_time', '>', $now)->get(), // có hiệu lực
            'status_2' => Promotion::where('status', 1)->where('end_time', '<', $now)->get(), // hết hạn
        ];
//        $usedPromotions = Payment::where('employer_id', $employerId)
//            ->whereNotNull('promotion_id')
//            ->pluck('promotion_id');

//        $now = now(); // Lấy thời gian hiện tại
//
//        $this->packages = [
//            // Lấy những mã giảm giá mà employer đã sử dụng
//            'used_promotions' => Promotion::whereIn('id', $usedPromotions)->get(),
//
//            // Mã giảm giá đang có hiệu lực (status = 1 và chưa hết hạn)
//            'status_1' => Promotion::where('status', 1)->where('end_time', '>', $now)->get(),
//
//            // Mã giảm giá đã hết hạn (status = 1 hoặc status = 0)
//            'status_2' => Promotion::where(function ($query) use ($now) {
//                $query->where('status', 1)->where('end_time', '<', $now)
//                    ->orWhere('status', 0); // Bao gồm các mã có status = 0 (không còn hoạt động)
//            })->get(),
//        ];
    }
}
