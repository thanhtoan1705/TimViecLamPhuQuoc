<?php

namespace App\Http\Controllers\Employer\History;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        return view('employer.history.index');
    }
}
