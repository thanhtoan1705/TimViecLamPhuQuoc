<?php

namespace App\Http\Controllers\ChatSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('chat.home');
    }

    public function login()
    {
        return view('chat.auth.auth-login');
    }

    public function register()
    {
        return view('chat.auth.auth-register');
    }

    public function reset()
    {
        return view('chat.auth.auth-recoverpw');
    }
}
