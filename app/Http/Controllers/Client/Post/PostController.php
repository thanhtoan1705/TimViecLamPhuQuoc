<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogInterface;

class PostController extends Controller
{
    protected BlogInterface $blogRepository;

    public function __construct(BlogInterface $blog)
    {
        $this->blogRepository = $blog;
    }
    public function index()
    {
        $data = [
            'blogs' => $this->blogRepository->getBlogByStatusPaginate(1, 9),
        ];

        return view("client.post.index", $data);
    }

    public function detail()
    {
        return view("client.post.detail");
    }
}
