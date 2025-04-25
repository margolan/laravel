<?php

namespace App\Http\Controllers;

use App\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function form()
    {
        return view('send_email');
    }

    public function send(Request $request)
    {

        $request->validate([
            'mailAddress' => 'required|email',
            'mailSubject' => 'required|string',
            'mailText' => 'required|string',
        ]);

        Mail::to($request->mailAddress)->send(new Mailer($request->mailSubject, $request->mailText));

        return redirect()->back()->with('status', 'Письмо отправлено');
    }
}
