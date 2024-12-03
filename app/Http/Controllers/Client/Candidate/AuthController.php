<?php

namespace App\Http\Controllers\Client\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Employer\LoginRequest;
use App\Http\Requests\Client\Employer\RegisterRequest;
use App\Jobs\Client\VerificationEmailRegister;
use App\Livewire\Client\Candidate\Candidate;
use App\Models\User;
use App\Repositories\Candidate\CandidateInterface;
use App\Repositories\User\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
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
            'role' => 'candidate',
            'remember_token' => Str::random(40),
        ]);

        //Thêm mới candidate
        $candidate = $this->candidateRepository->create([
            'user_id' => $user->id,
        ]);

        // Tạo slug cho candidate
        $slug = Str::slug($user->name) . '-' . $candidate->id;

        // Cập nhật slug vào record candidate
        $this->candidateRepository->update($candidate->id, [
            'slug' => $slug,
        ]);


        flash()->success('Tài khoản của bạn đã được đăng ký thành công. Vui lòng kiểm tra email xác thực', [],'Thành công!');
        VerificationEmailRegister::dispatch($user);

        return redirect()->route('client.candidate.login')
            ->with('msg-success', 'Đăng ký thành công, bây giờ bạn có thể đăng  nhập');
    }

    public function verify($token)
    {
        // Kiểm tra xem token có tồn tại không và email_verified_at có NULL không
        $account = User::where('remember_token', $token)->whereNull('email_verified_at')->first();

        if (!$account) {
            flash()->success('Tài khoản xác thực thành công. Bây giờ bạn có thể đăng nhập ngay', [], 'Thành công!');
            return redirect()->route('client.candidate.login');
        }

        // Cập nhật email_verified_at
        $account->email_verified_at = now();
        $account->save();

        flash()->success('Tài khoản xác thực thành công. Bây giờ bạn có thể đăng nhập ngay.', [], 'Thành công!');
        return redirect()->route('client.candidate.login');
    }

    public function login()
    {
        return view('client.candidate.login');
    }

    public function handleLogin(LoginRequest $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if (is_null($user)) {
            flash()->error('Tài khoản không tồn tại.', [], 'Thất bại!');
            return redirect()->back();
        }

        if($user->candidate->status == 0) {
            flash()->error('Tài khoản đã bị tạm dùng hoạt động. Liên hệ quản trị viên để biết thêm chi tiết.', [], 'Thất bại!');
            return redirect()->back();
        }

        if(is_null($user->email_verified_at)) {
            VerificationEmailRegister::dispatch($user);

            flash()->error('Tài khoản chưa được xác thực vui lòng kiểm tra email.', [],'Thất bại!');

            return redirect()->back();
        }

        $credentials = [
            'email' =>  $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Kiểm tra và chuyển hướng về trang trước đó
            $previousUrl = $request->input('previous_url');
            if ($previousUrl) {
                flash()->success('Đăng nhập thành công.', [],'Thành công!');
                return redirect()->to($previousUrl);
            }

            // Nếu không có previous_url thì chuyển về trang mặc định
            flash()->success('Đăng nhập thành công.', [],'Thành công!');
            return redirect()->route('client.client.index');

        }

        flash()->error('Email hoặc mật khẩu không chính xác.', [],'Thất bại!');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // Xóa tất cả dữ liệu session
        $request->session()->invalidate();

        // Tạo session mới để tránh sử dụng lại session cũ
        $request->session()->regenerate();

        flash()->success('Đăng xuất thành công.', [],'Thành công!');

        return redirect()->route('client.candidate.login');
    }

    public function redirectToGoogle(Request $request)
    {
        // Lưu URL trước đó vào session
        session(['previous_url' => $request->get('previous_url')]);
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

    public function generateSlug($model, string $name): string
    {
        // Lấy bản ghi Candidate có ID lớn nhất
        $candidate = $model::latest('id')->first();

        // Lấy ID của Candidate hoặc gán mặc định là 1 nếu chưa có bản ghi nào
        $idCandidate = $candidate ? $candidate->id + 1 : 1;

        // Chuyển tên thành slug và kết hợp với ID của Candidate
        $slug = Str::slug($name, '-') . '-' . $idCandidate;

        return $slug;
    }

    private function isAccountActive(string $email): bool
    {
        $user = User::where('email', $email)->first();
        $candidate = $user->candidate;
        return $candidate && $candidate->status === 1;
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
                'email_verified_at' => now(),
            ]);

            $candidate = $this->candidateRepository->findByUserId($user->id);

            if (!$candidate) {
                // Tạo candidate mới nếu chưa tồn tại
                $candidate = $this->candidateRepository->create([
                    'user_id' => $user->id,
                    'slug' => $this->generateSlug('App\Models\Candidate', $user->name)
                ]);
                Log::info('New candidate created with slug', ['candidate_id' => $candidate->id, 'slug' => $candidate->slug]);
            } else if (empty($candidate->slug)) {
                // Nếu candidate đã tồn tại nhưng không có slug, thêm slug
                $candidate->slug = $this->generateUniqueSlug($user->name);
                $candidate->save();
                Log::info('Existing candidate updated with new slug', ['candidate_id' => $candidate->id, 'slug' => $candidate->slug]);
            }

            //Kiểm tra tài khoản còn hoạt động
            if (!$this->isAccountActive($googleUser->email)) {
                flash()->warning(
                    'Tài khoản đã bị tạm dùng hoạt động. Liên hệ quản trị viên để biết thêm chi tiết.',
                    [],
                    'Thông báo!'
                );
                return redirect()->route('client.candidate.login');
            }
            //end Kiểm tra tài khoản còn hoạt động

            Auth::login($user);

            flash()->success('Đăng nhập thành công.', [],'Thành công!');

            // Lấy URL trước đó từ session và xóa nó
            $previousUrl = session('previous_url');
            session()->forget('previous_url');

            if ($previousUrl) {
                return redirect()->to($previousUrl);
            }

            return redirect()->route('client.client.index');

        } catch (\Exception $e) {
            Log::error('Google login error: ' . $e->getMessage());
            return redirect()->route('client.candidate.login')->withErrors(['msg' => 'Đăng nhập thất bại']);
        }
    }

}
