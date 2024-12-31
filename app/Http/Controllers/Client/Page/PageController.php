<?php

namespace App\Http\Controllers\Client\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Contact\ContactRequest;
use App\Jobs\Client\NewsletterVerification;
use App\Mail\Client\Contact\ContactNotification;
use App\Mail\ContactFormNotification;
use App\Models\Founder;
use App\Models\User;
use App\Models\NewsletterSubscription;
use App\Mail\NewsletterVerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Repositories\Page\PageInterface;

class PageController extends Controller
{
    protected $pageRepository;

    public function __construct(PageInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function about()
    {
        $founders = Founder::where('status', 1)->get();

        $data = [
            'founders' => $founders,
        ];


        return view("client.about.index", $data);
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Gửi email
        Mail::to('admin@example.com')->send(
            new ContactFormNotification(
                $request->input('name'),
                $request->input('email'),
                $request->input('message')
            )
        );

        flash()->success('Email đã được gửi thành công.', [], 'Thành công!');
        return back();
    }

    public function contact(): View
    {

        return view("client.contact.index");
    }

    public function sendMailContact(ContactRequest $request)
    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'phone' => 'required',
//            'email' => 'required|email|max:255',
//            'message' => 'required|string',
//        ]);

        // Gửi email
        Mail::to('admin@example.com')->send(
            new ContactNotification(
                $request->input('name'),
                $request->input('phone'),
                $request->input('email'),
                $request->input('message')
            )
        );

        flash()->success('Email đã được gửi thành công.', [], 'Thành công!');
        return back();
    }

    public function subscribe(Request $request)
    {
        $email = $request->input('email');
        if (empty($email)) {
            flash()->error('Vui lòng nhập email để đăng ký!', [], 'Lỗi');
            return back();
        }
        $checkMail = NewsletterSubscription::where('email', $email)->exists();
        $verificationToken = Str::random(40);

        if ($checkMail){
            flash()->warning('Bạn đã đăng ký email này rồi!', [], 'Thông báo');
            return back();
        }else{
            $userExists = User::where('email', $email)->exists();
            $status = $userExists ? 1 : 0;

            NewsletterSubscription::create([
                'email' => $email,
                'status' => $status,
                'verification_token' => $verificationToken,
            ]);
            if ($userExists) {
                flash()->success('Bạn đã đăng ký thành công! Những tin tức sẽ được cập nhật mới nhất!', [], 'Thành công!');
            } else {
                flash()->success('Vui lòng xác thực mail để nhận tin sớm nhất!', [], 'Thành công!');
                dispatch(new NewsletterVerification($verificationToken, $email));
            }
            return back();
        }
    }

    public function verifyEmail($token)
    {
        $subscription = NewsletterSubscription::where('verification_token', $token)->first();

        if ($subscription) {
            $subscription->status = 1;
            $subscription->verification_token = null;
            $subscription->save();

            flash()->success('Email của bạn đã được xác thực thành công!', [], 'Thành công!');
        } else {
            flash()->error('Mã xác thực không hợp lệ hoặc đã hết hạn.', [], 'Lỗi!');
        }

        return back();
    }

    public function show($slug)
    {
        $page = $this->pageRepository->findBySlug($slug);

        return view('client.page', compact('page'));
    }

    public function markNotificationAsRead($id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();

        if ($notification) {
            // Phương thức markAsRead() sẽ tự động cập nhật cột read_at với thời gian hiện tại
            $notification->markAsRead();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}
