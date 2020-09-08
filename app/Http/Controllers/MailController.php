<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\VerificationEmail;
use App\Mail\MailMarkDown;

class MailController extends Controller
{
    public function mail1()
    {
        $user = User::first();
        \Mail::to($user)->send(new VerificationEmail('Asgare Shirinegad'));
    }

    public function mail2()
    {
        $user = User::first();
        return new VerificationEmail('Asgare Shirinegad');
    }


    public function mark_down()
    {
        $user = User::first();
        // \Mail::to($user)->send(new MailMarkDown());
        return new MailMarkDown();
    }
}
