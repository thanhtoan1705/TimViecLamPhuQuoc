<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        return view("client.post.index");
    }

    public function detail()
    {
        return view("client.post.detail");
    }
}
