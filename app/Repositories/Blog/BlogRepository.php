<?php

namespace App\Repositories\Blog;

use App\Models\Blog;

class BlogRepository implements BlogInterface
{
    protected Blog $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function getBlogByStatusPaginate(int $is_publish = 1, int $paginate = 6)
    {
        return $this->blog
        ->where('is_publish', $is_publish)
        ->orderBy('created_at', 'desc')
        ->paginate($paginate);
    }

    public function getAllBlog(){
        return $this->blog->get();
    }

    public function blogTrending(int $is_publish = 1, int $limit = 6)
    {
        return $this->blog
            ->withCount('comments')
            ->where('is_publish', $is_publish)
            ->whereYear('created_at', date('Y'))
            ->orderBy('created_at', 'desc')
            ->orderBy('view', 'desc')
            ->orderBy('comments_count', 'desc')
            ->take($limit)
            ->get();
    }
}

