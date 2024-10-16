<?php

namespace App\Repositories\Post;

interface PostInterface
{
    public function getPostDetail(string $slug);
    public function searchBlogs($keyword);
}
