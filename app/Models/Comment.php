<?php

namespace App\Models;

use App\Scopes\CommentScopes;
use App\Scopes\HasLikes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use CommentScopes, SoftDeletes, HasFactory, HasLikes;

    protected $table = 'comments';

    protected $withCount = [
        'likes',
    ];

    protected $fillable = [
        'blog_id',
        'user_id',
        'content',
        'parent_id',
        'commentable',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function presenter(): CommentPresenter
    {
        return new CommentPresenter($this);
    }

    public function isParent(): bool
    {
        return is_null($this->parent_id);
    }

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id')->oldest();
    }

    public function isChild()
    {
        return !is_null($this->parent_id);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
