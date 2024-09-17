<?php

namespace App\Http\Controllers\Client\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Employer\LoginRequest;
use App\Http\Requests\Client\Employer\RegisterRequest;
use App\Repositories\Candidate\CandidateInterface;
use App\Repositories\User\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    protected UserInterface $userRepository;
    protected CandidateInterface $candidateRepository;
    public function __construct(
        UserInterface $userRepository,
        CandidateInterface $candidateRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->candidateRepository = $candidateRepository;
    }

    public function register()
    {
        return view('client.candidate.register');
    }


    public function handleRegister(RegisterRequest $request)
    {
        $user = $this->userRepository->create([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('passwords')),
            'avatar_url' => 'https://topcode.vn/assets/images/avanta2.png',
            'email_verified_at' => now(),
        ]);

        //Thêm mới candidate
        $this->candidateRepository->create([
            'user_id' => $user->id,
        ]);

        flash()->success('Tài khoản của bạn đã được đăng ký thành công.');

        return redirect()->route('client.candidate.login')
            ->with('msg-success', 'Đăng ký thành công, bây giờ bạn có thể đăng  nhập');
    }

    public function login()
    {
        return view('client.candidate.login');
    }

    public function handleLogin(LoginRequest $request)
    {
        $credentials = [
            'email' =>  $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            if (!empty(Auth::user()->email_verified_at)) {
                $request->session()->regenerate();
                flash()->success('Đăng nhập thành công.');
                return redirect()->route('client.client.index');
            }
        }

        flash()->error('Email hoặc mật khẩu không chính xác');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        flash()->success('Đăng xuất thành công.');

        return redirect()->route('client.candidate.login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = $this->userRepository->createOrUpdateGoogleUser([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'avatar_url' => $googleUser->avatar,
                'password' => encrypt('password')
            ]);

            Auth::login($user);

            return redirect()->route('client.client.index');
        } catch (\Exception $e) {
            return redirect()->route('client.candidate.login')->withErrors(['msg' => 'Đăng nhập thất bại']);
        }
    }

}
