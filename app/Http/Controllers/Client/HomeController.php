<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class HomeController extends Controller{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(){
        return view("client.home");
    }

    public function about()
    {
        return view("client.about.index");
    }
}
