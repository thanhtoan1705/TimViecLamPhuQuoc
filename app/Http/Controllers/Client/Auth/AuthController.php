<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function reset()
    {
        return view("client.auth.reset-password");
    }
    public function newPass()
    {
        return view("client.auth.create-new-password");
    }
    public function otp()
    {
        return view("client.auth.otp");
    }
}
