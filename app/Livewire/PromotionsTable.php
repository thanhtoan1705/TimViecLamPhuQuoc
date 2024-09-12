<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Promotion;
use Carbon\Carbon;

class PromotionsTable extends Component
{
    use WithPagination;

    public $status;

    public function mount($status)
    {
        $this->status = $status;
    }

    public function render()
    {
        $now = Carbon::now();
        $promotions = Promotion::query()
            ->when($this->status == 0, function($query) {
                return $query->where('status', 0);
            })
            ->when($this->status == 1, function($query) use ($now) {
                return $query->where('status', 1)
                    ->where('end_time', '>', $now);
            })
            ->when($this->status == 2, function($query) use ($now) {
                return $query->where('status', 1)
                    ->where('end_time', '<', $now);
            })
            ->paginate(9);
        return view('livewire.client.promotions.promotions-table', [
            'promotions' => $promotions,
        ]);
    }
}
