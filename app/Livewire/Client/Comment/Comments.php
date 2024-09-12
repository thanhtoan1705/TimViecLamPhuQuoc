<?php

namespace App\Livewire\Client\Comment;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public $model;

    public $users = [];

    public $showDropdown = false;
    
    protected $numberOfPaginatorsRendered = [];

    public $newCommentState = [
        'content' => ''
    ];

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    protected $validationAttributes = [
        'newCommentState.content' => 'comment'
    ];

    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application|null
     */
    public function render(
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application|null
    {
        $comments = $this->model
            ->comments()
            ->with('user', 'children.user', 'children.children')
            ->withCount('children')
            ->parent()
            ->latest()
            ->paginate(config('commentify.pagination_count', 3));

        $totalComments = $this->model->comments()
            ->withCount('children')
            ->get()
            ->count(function ($comment) {
                return 1 + $comment->children_count;
            });

        return view('livewire.client.comment.comments', [
            'comments' => $comments,
            'totalComments' => $totalComments,
        ]);
    }

    /**
     * @return void
     */
    #[On('refresh')]
    public function postComment(): void
    {
        $this->validate([
            'newCommentState.content' => 'required'
        ]);

        // Tạo bình luận mới
        $comment = $this->model->comments()->make($this->newCommentState);

        $comment->user()->associate(auth()->user());
        $comment->commentable_type = get_class($this->model);
        $comment->commentable_id = $this->model->id;

        $comment->save();

        $this->reset('newCommentState');

        $this->users = [];
        $this->showDropdown = false;

        $this->resetPage();
        flash('Bình luận đã được đăng thành công!');
    }

}
