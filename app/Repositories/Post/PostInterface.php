<?php

namespace App\Repositories\Post;

interface PostInterface
{
    public function getPostDetail(string $slug);
}
