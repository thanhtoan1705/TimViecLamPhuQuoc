<?php

namespace App\Livewire\Client\Comment;


use App\Models\User;
use App\Notifications\CommentReplyNotification;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Notification;
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
            'newCommentState.content' => [
                'required',
                'min:2',
                function ($attribute, $value, $fail) {
                    $wordCount = str_word_count(strip_tags($value));
                    if ($wordCount > 200) { // Giới hạn 200 từ
                        $fail('Nội dung quá dài! không được vượt quá 200 từ.');
                    }
                },
            ],
        ], [
            'newCommentState.content.required' => 'Vui lòng nhập nội dung.',
            'newCommentState.content.min' => 'Nội dung phải có ít nhất 2 ký tự.',
        ]);

        // Tạo bình luận mới
        $comment = $this->model->comments()->make($this->newCommentState);

        $comment->user()->associate(auth()->user());
        $comment->commentable_type = get_class($this->model);
        $comment->commentable_id = $this->model->id;

        $comment->save();

        // Gửi thông báo cho admin
//        $admins = User::where('role', 'admin')->get();
//        Notification::send($admins, new CommentReplyNotification($comment));

        $this->reset('newCommentState');

        $this->users = [];
        $this->showDropdown = false;

        $this->resetPage();
        flash()->success('Bình luận đã được đăng thành công!', [], 'Thành công!');
    }

}
