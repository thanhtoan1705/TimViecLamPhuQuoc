<?php

namespace App\Http\Controllers\Client\Page;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
}
