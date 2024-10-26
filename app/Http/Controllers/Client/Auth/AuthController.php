<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\Client\Candidate\ForgotPasswordRequest;
use App\Http\Requests\Client\Candidate\ResetPasswordRequest;
use App\Jobs\Client\ForgotPWNotification;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{
    public function reset()
    {
        return view("client.auth.reset-password");
    }
    public function newPass($token)
    {
        $user = User::where('remember_token', '=', $token)->first();

        if(!empty($user)) {
            $data['user'] = $user;

            return view("client.auth.create-new-password", $data);
        } else {
            abort(404);
        }
    }
    public function otp()
    {
        return view("client.auth.otp");
    }

    public function sendResetLink(ForgotPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!empty($user)) {
            $checkTime = 15;
            $cacheKey = 'password_reset_' . $user->email;

            if (Cache::has($cacheKey)) {
                flash()->error("Bạn vừa yêu cầu đặt lại mật khẩu. Vui lòng đợi $checkTime phút trước khi yêu cầu lại.", [], 'Thất bại!');
                return redirect()->back();
            }

            $user->remember_token = Str::random(40);
            $user->save();

            Cache::put($cacheKey, now(), $checkTime * 60);

            dispatch(new ForgotPWNotification($user));

            flash()->success('Một email đã được gửi đến hộp thư của bạn, vui lòng thực hiện theo hướng dẫn trong mail để tạo mật khẩu mới', [], 'Thành công!');
            return redirect()->back();
        } else {
            flash()->error('Email không tồn tại, vui lòng kiểm tra lại', [], 'Thất bại!');
            return redirect()->back();
        }
    }

    public function resetPassword($token, ResetPasswordRequest $request)
    {
        $user = User::where('remember_token', '=', $token)->first();

        if(!empty($user)) {
            $user->password = Hash::make($request->password);

            if(empty($user->email_verified_at)) {
                $user->email_verified_at = date('Y-m-d H:i:s');
            }

            $user->remember_token = Str::random(40);
            $user->save();

            flash()->success('Thay đổi mật khẩu thành công', [],'Thành công!');

            return redirect()->route('client.candidate.login');
        } else {
            abort(404);
        }
    }
}
