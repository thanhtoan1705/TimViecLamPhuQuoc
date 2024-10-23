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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


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
            'role' => 'candidate',
            'email_verified_at' => now(),
        ]);

        //Thêm mới candidate
        $this->candidateRepository->create([
            'user_id' => $user->id,
        ]);

        flash()->success('Tài khoản của bạn đã được đăng ký thành công.', [],'Thành công!');

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
                flash()->success('Đăng nhập thành công.', [],'Thành công!');
                return redirect()->route('client.client.index');
            }
        }

        flash()->error('Email hoặc mật khẩu không chính xác.', [],'Thất bại!');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        flash()->success('Đăng xuất thành công.', [],'Thành công!');

        return redirect()->route('client.candidate.login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    private function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $count = 2;

        while ($this->candidateRepository->findBySlug($slug)) {
            $slug = Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
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
                'password' => encrypt('password'),
                'role' => 'candidate',
            ]);

            $candidate = $this->candidateRepository->findByUserId($user->id);

            if (!$candidate) {
                // Tạo candidate mới nếu chưa tồn tại
                $candidate = $this->candidateRepository->create([
                    'user_id' => $user->id,
                    'slug' => $this->generateUniqueSlug($user->name)
                ]);
                Log::info('New candidate created with slug', ['candidate_id' => $candidate->id, 'slug' => $candidate->slug]);
            } else if (empty($candidate->slug)) {
                // Nếu candidate đã tồn tại nhưng không có slug, thêm slug
                $candidate->slug = $this->generateUniqueSlug($user->name);
                $candidate->save();
                Log::info('Existing candidate updated with new slug', ['candidate_id' => $candidate->id, 'slug' => $candidate->slug]);
            }

            Auth::login($user);

            flash()->success('Đăng nhập thành công.', [],'Thành công!');
            return redirect()->route('client.client.index');
        } catch (\Exception $e) {
            Log::error('Google login error: ' . $e->getMessage());
            return redirect()->route('client.candidate.login')->withErrors(['msg' => 'Đăng nhập thất bại']);
        }
    }

}
