<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Promotion;
use Carbon\Carbon;

class PromotionsTable extends Component
{
    use WithPagination;

    public $statusCode; // Đổi tên biến từ $status sang $statusCode

    public function mount($status)
    {
        $this->statusCode = $status;
    }

    public function render()
    {
        $now = Carbon::now();
        $employerID = auth()->user()->id;

        $usedPromotions = Payment::where('employer_id', $employerID)
            ->whereNotNull('promotion_id') // Loại bỏ các giá trị null
            ->pluck('promotion_id')
            ->toArray();

        if ($this->statusCode == 1) {
            $promotions = Promotion::query()
                ->where('status', 1)
                ->where('start_time', '<', $now)
                ->where('end_time', '>', $now)
                ->where('number_use', '>', 0)
                ->whereNotIn('id', $usedPromotions)
                ->paginate(9);
        } elseif ($this->statusCode == 0) {
            $promotions = Promotion::query()
                ->whereIn('id', $usedPromotions)
                ->paginate(9);
        } elseif ($this->statusCode == 2) {
            $promotions = Promotion::query()
                ->where(function ($query) use ($now) {
                    $query->where('status', 0)
                        ->orWhere('number_use', '=', 0)
                        ->orWhere(function ($subQuery) use ($now) {
                            $subQuery->where('status', 1)
                                ->where('end_time', '<', $now);
                        });
                })
                ->paginate(9);
        }

        return view('livewire.client.promotions.promotions-table', [
            'promotions' => $promotions,
        ]);
    }
}
