<?php

namespace App\Repositories\Post;

use App\Models\Blog;

class PostRepository implements PostInterface
{
    protected $postRepository;

    public function __construct(Blog $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getPostDetail($slug)
    {
        $postDetail = $this->postRepository->where('slug', $slug)->where('is_publish', 1)->first();

        if (!$postDetail) {
            throw new \Exception('Post not found');
        }

        return $postDetail;
    }

    public function searchBlogs($keyword)
    {
        $searchResult = $this->postRepository
            ->where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('content', 'LIKE', "%{$keyword}%")
            ->where('is_publish', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return $searchResult;
    }
}
