<?php

namespace App\Http\Controllers\VideoCall;

use App\Http\Controllers\Controller;
use App\Services\VideoCAll\AgoraService;
use Illuminate\Http\Request;

class VideoCallController extends Controller
{
    public function index()
    {
        return view('client.videocall.index');
    }

    public function room()
    {
        return view('client.videocall.room');
    }
}
