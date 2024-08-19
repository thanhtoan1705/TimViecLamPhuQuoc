<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Employer\EmployerInterface;

class HomeController extends Controller{

    protected $employer;

    public function __construct(EmployerInterface $employer)
    {
        $this->employer = $employer;
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(){
        $employers = $this->employer->getAllEmployers();
        return view("client.home", compact('employers'));
    }

    public function about()
    {
        return view("client.about.index");
    }
}
