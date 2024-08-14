<?php

namespace App\Http\Controllers\Employer\User;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {
        return view('employer.user.index');
    }
}
