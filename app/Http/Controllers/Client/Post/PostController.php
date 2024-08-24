<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogInterface;
use App\Repositories\Post\PostInterface;

class PostController extends Controller
{
    protected PostInterface $post;

    protected BlogInterface $blogRepository;

    public function __construct(PostInterface $post, BlogInterface $blog)
    {
        $this->post = $post;
        $this->blogRepository = $blog;
    }


    public function index()
    {
        $data = [
            'blogs' => $this->blogRepository->getBlogByStatusPaginate(1, 9),
        ];

        return view("client.post.index", $data);
    }

    public function detail($slug)
    {
        $postDetail = $this->post->getPostDetail($slug);

        return view("client.post.detail", [
            'postDetail' => $postDetail,
        ]);
    }
}
