<?php

namespace App\Http\Controllers\VideoCall;

use App\Http\Controllers\Controller;
use App\Services\VideoCAll\AgoraService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoCallController extends Controller
{
    public function index()
    {
        return view('client.videocall.index');
    }

    public function room(Request $request)
    {
        $isEmployer = false;

        if (Auth::check()) {
            $user = Auth::user();
            $name = $user->name;

            $isEmployer = $user->hasRole('employer');
//            dd($isEmployer);
        } else {
            flash()->error('Bạn phải đăng nhập để tham gia cuộc gọi', [],'Thất bại!');
            return redirect()->back();
        }

        $room = $request->input('room');
        if (empty($room)) {
            $room = (string)mt_rand(0, 9999);
        }

        $request->session()->put('display_name', $name);
        $request->session()->put('room_id', $room);

        return view('client.videocall.room', [
            'displayName' => $name,
            'inviteCode' => $room,
            'isEmployer' => $isEmployer,
        ]);
    }
}
