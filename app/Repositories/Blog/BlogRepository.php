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

    public function getBlogByStatusPaginate(int $is_publish = 1, int $paginate = 10)
    {
        return $this->blog->where('is_publish', $is_publish)->paginate($paginate);
    }

    public function getAllBlog(){
        return $this->blog->get();
    }

    public function blogTrending(int $is_publish = 1, int $paginate = 5)
    {
        return $this->blog
            ->withCount('comments')
            ->where('is_publish', $is_publish)
            ->whereYear('created_at', date('Y'))
            ->orderBy('view', 'desc')
            ->orderBy('comments_count', 'desc')
            ->paginate($paginate);
    }
}

