<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;

class TestMailController extends Controller
{
    /**
     * Send Test Mail Example
     *
     * @return void
     */
    public function TestMail()
    {
        $to_email = env('MAIL_TO');
        $mytestmail = new MyTestMail();
        $mytestmail->subject("Hello! This is a test mail.");
        Mail::to($to_email)->send($mytestmail);

        // dd("Mail Send Successfully");
        return "E-mail has been sent Successfully";  
    }
}
