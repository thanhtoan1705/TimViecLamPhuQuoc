<?php

namespace App\Observers;
use App\Models\Comment;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;

class CommentObserver
{
    public function created(Comment $comment): void
    {
        $post = $comment->blog;
        $adminUsers = User::where('role', 'admin')->get();

        if ($post->user->role === 'admin') {
            foreach ($adminUsers as $admin) {
                if ($admin->id !== $comment->user_id) {
                    Notification::make()
                        ->success()
                        ->title("{$comment->user->name} đã bình luận trên bài viết: {$comment->blog->title}")
                        ->actions([
                            Action::make('view')
                                ->label('Xem bình luận')
                                ->url(route('client.post.detail', ['slug' => $post->slug]) . '#comment-' . $comment->id)
                                ->openUrlInNewTab(),
                        ])
                        ->sendToDatabase($admin);
                }
            }
        }
        if($comment->parent && $comment->parent->user->role === 'employer') {
            $employer = $comment->parent->user;
            if ($employer->id !== $comment->user_id) {
                Notification::make()
                    ->success()
                    ->title("{$comment->user->name} đã trả lời bình luận của bạn")
                    ->actions([
                        Action::make('view')
                            ->label('Xem chi tiết')
                            ->url(route('client.post.detail', ['slug' => $post->slug]) . '#comment-' . $comment->id)
                            ->openUrlInNewTab(),
                    ])
                    ->sendToDatabase($employer);
            }
        }
    }
}
