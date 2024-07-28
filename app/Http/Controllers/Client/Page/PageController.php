<?php

namespace App\Http\Controllers\Client\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view("client.about.index");
    }
}
