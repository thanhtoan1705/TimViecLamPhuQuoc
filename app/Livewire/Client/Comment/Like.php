<?php

namespace App\Livewire\Client\Comment;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use App\Models\Comment;

class Like extends Component
{

    public $comment;
    public $count;


    public function mount(Comment $comment): void
    {
        $this->comment = $comment;
        $this->count = $comment->likes_count;
    }

    public function like(): void
    {
        $ip = request()->ip();
        $userAgent = request()->userAgent();
        $userId = auth()->id();

        if ($userId) {
            $like = $this->comment->likes()->where('user_id', $userId)->first();

            if ($like) {
                $like->delete();
                $this->count--;
            } else {
                $this->comment->likes()->create([
                    'user_id' => $userId,
                ]);
                $this->count++;
            }
        } elseif ($ip && $userAgent) {
            $like = $this->comment->likes()->where('ip', $ip)->where('user_agent', $userAgent)->first();

            if ($like) {
                $like->delete();
                $this->count--;
            } else {
                $this->comment->likes()->create([
                    'ip' => $ip,
                    'user_agent' => $userAgent,
                ]);
                $this->count++;
            }
        }
    }

    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application|null
     */
    public function render(
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application|null
    {
        return view('livewire.client.comment.like');
    }

}
