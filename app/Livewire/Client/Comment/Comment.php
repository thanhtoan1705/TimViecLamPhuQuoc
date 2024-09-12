<?php

namespace App\Livewire\Client\Comment;


use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class Comment extends Component
{
    use AuthorizesRequests;

    public $comment;
    public $parentComment = null;

    public $users = [];

    public $isReplying = false;
    public $hasReplies = false;

    public $showOptions = false;

    public $isEditing = false;

    public $replyState = [
        'content' => ''
    ];

    public $editState = [
        'content' => ''
    ];

    protected $validationAttributes = [
        'replyState.content' => 'Reply',
        'editState.content' => 'Reply'
    ];

    public function toggleReplying()
    {
        $this->isReplying = !$this->isReplying;
    }

    public function toggleReplies()
    {
        $this->hasReplies = !$this->hasReplies;
    }

    public function toggleShowOptions()
    {
        $this->showOptions = !$this->showOptions;
    }

    /**
     * @param $isEditing
     * @return void
     */
    public function updatedIsEditing($isEditing): void
    {
        if (!$isEditing) {
            return;
        }
        $this->editState = [
            'content' => $this->comment->content
        ];
    }

    /**
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function editComment(): void
    {
        $this->authorize('update', $this->comment);
        $this->validate([
            'editState.content' => 'required|min:2'
        ]);
        $this->comment->update($this->editState);
        $this->isEditing = false;
        $this->showOptions = false;
    }

    /**
     * @return void
     * @throws AuthorizationException
     */
    #[On('refresh')]
    public function deleteComment(): void
    {
        $this->authorize('destroy', $this->comment);
        $this->comment->delete();
        $this->showOptions = false;
        $this->dispatch('refresh');
    }

    public function mount()
    {
        if ($this->comment->isChild()) {
            $this->parentComment = $this->comment->parent()->with('user')->first();
        }
    }

    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application|null
     */
    public function render(
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application|null
    {
        return view('livewire.client.comment.comment');
    }

    /**
     * @return void
     */
    #[On('refresh')]
    public function postReply(): void
    {
        $this->validate([
            'replyState.content' => 'required'
        ]);
        $reply = $this->comment->children()->make($this->replyState);
        $reply->user()->associate(auth()->user());
        $reply->commentable()->associate($this->comment->commentable);
        $reply->blog_id = $this->comment->blog_id;
        $reply->save();

        $this->replyState = [
            'content' => ''
        ];
        $this->isReplying = false;
        $this->showOptions = false;
        $this->dispatch('refresh')->self();
    }

    /**
     * @param $userName
     * @return void
     */
    public function selectUser($userName): void
    {
        if ($this->replyState['content']) {
            $this->replyState['content'] = preg_replace('/@(\w+)$/', '@'.str_replace(' ', '_', Str::lower($userName)).' ',
            $this->replyState['content']);
            $this->replyState['content'] = $userName;
            $this->users = [];
        } elseif ($this->editState['content']) {
            $this->editState['content'] = preg_replace('/@(\w+)$/', '@'.str_replace(' ', '_', Str::lower($userName)).' ',
                $this->editState['content']);
            $this->users = [];
        }
    }


    /**
     * @param $searchTerm
     * @return void
     */
    #[On('getUsers')]
    public function getUsers($searchTerm): void
    {
        if (!empty($searchTerm)) {
            $this->users = User::where('name', 'like', '%'.$searchTerm.'%')->take(5)->get();
        } else {
            $this->users = [];
        }
    }

}
