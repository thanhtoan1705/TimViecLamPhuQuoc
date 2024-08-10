<?php

namespace App\Http\Controllers\Client\Employer;

use App\Http\Controllers\Controller;

class EmployerController extends Controller
{
    public function login()
    {
        return view('client.employer.login');
    }

    public function register()
    {
        return view('client.employer.register');
    }
}
