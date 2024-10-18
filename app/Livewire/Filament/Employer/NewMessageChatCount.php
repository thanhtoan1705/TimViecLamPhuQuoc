<?php

namespace App\Livewire\Filament\Employer;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewMessageChatCount extends Component
{
    public int $newMessageCount = 0;

    public function mount()
    {
        $this->newMessageCount = $this->getNewMessageCount();
    }

    public function getNewMessageCount()
    {
        $userId = Auth::id();
        return DB::table('ch_messages')
            ->where('to_id', $userId)
            ->where('seen', false)
            ->count();
    }

    public function render()
    {
        return view('filament.chat.chat-icon');
    }
}
