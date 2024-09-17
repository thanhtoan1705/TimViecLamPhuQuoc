<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                flash()->success('Đăng nhập thành công!');
                return redirect()->intended('/');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email ?? null,
                    'facebook_id'=> $user->id,
                    'password' => Hash::make('123456'),
                    'avatar_url' => $user->avatar,
                    'role' => 'candidate'
                ]);

                Auth::login($newUser);
                flash()->success('Đăng nhập thành công!');
                return redirect()->intended('/');
            }
        } catch (\Exception $e) {
//            dd($e->getMessage());
            Log::error($e->getMessage());
            return redirect()->route(route: 'login')->withErrors(provider: ['error' => 'Có lỗi xảy ra, vui lòng thử lại.']);
        }
    }
}
