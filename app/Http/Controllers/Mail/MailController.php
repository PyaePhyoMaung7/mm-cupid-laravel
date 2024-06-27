<?php

namespace App\Http\Controllers\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirmMail;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'site_title' => Session::get('site_title'),
            'body' => 'Please click the following button to activate your MMCupid account.'
        ];

        Mail::to('pyaephyomg1004@gmail.com')->send(new RegistrationConfirmMail($mailData));

        dd("Email is sent successfully.");
    }
}
