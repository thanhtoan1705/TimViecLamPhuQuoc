<?php

namespace App\Repositories\Blog;

interface BlogInterface
{
    public function getBlogByStatusPaginate(int $is_publish, int $paginate);

    public function getAllBlog();

    public function blogTrending();
}

