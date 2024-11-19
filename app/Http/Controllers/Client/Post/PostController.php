<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogInterface;
use App\Repositories\Post\PostInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected PostInterface $post;

    protected BlogInterface $blogRepository;

    public function __construct(PostInterface $post, BlogInterface $blog)
    {
        $this->post = $post;
        $this->blogRepository = $blog;
    }


    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $searchResult = $this->post->searchBlogs($keyword);

        $data = [
            'blogs' => $this->blogRepository->getBlogByStatusPaginate(1, 6),
            'blogTrending' => $this->blogRepository->blogTrending(1, 6),
            'searchResult' => $searchResult,
        ];

        return view("client.post.index", $data);
    }

    public function detail($slug)
    {
        $postDetail = $this->post->getPostDetail($slug);

        $shareButton = \Share::page(
            url('bai-viet/'.$postDetail->slug.'.html'),
            "Khám phá bài viết \"{$postDetail->title}\" của {$postDetail->user->name}!
            Đọc ngay để không bỏ lỡ những thông tin thú vị!"
        )->facebook()->twitter()->pinterest();

        $shareUrls = $shareButton->getRawLinks();

        return view("client.post.detail", [
            'postDetail' => $postDetail,
            'shareUrls' => $shareUrls,
        ]);
    }
}
