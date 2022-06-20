<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Mail\AuthSendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Show contact page
     *
     * @return void
     */
    public function index()
    {
        return view('pages.contact');
    }

    /**
     * Send email to admin
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'subject' => ['required', 'string'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $details = [
            'title' => 'New contact Email',
            'name' => $request->name,
            'subject' => $request->subject,
            'email' => $request->email,
            'message' => $request->message,
            'link' => url(route('home')),
            'view' => 'emails.contact'
        ];

        try {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new AuthSendMail($details));
            return redirect()->back()->with(
                'status',
                __('Email has been sent')
            );
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' =>
            __('A Network Error occurred, Please try again')]);
        }
    }
}
