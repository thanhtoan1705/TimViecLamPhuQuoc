<?php

namespace App\Http\Controllers\Client\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Contact\ContactRequest;
use App\Mail\Client\Contact\ContactNotification;
use App\Mail\ContactFormNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about()
    {
        return view("client.about.index");
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
}
