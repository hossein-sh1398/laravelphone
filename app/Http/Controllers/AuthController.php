<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Otp;
use App\User;
use App\Mail\VerificationEmail;

class AuthController extends Controller
{

    public function showFormEmail()
    {

    	return view('otp.email_form');

    }


    public function showFormInfo(Request $request)
    {

        if ( ! $request->session()->has('auth')) {

            return redirect()->route('auth.email.form');
        }

        $request->session()->reflash();

        return view('otp.info');

    }


    public function info(Request $request)
    {

        $this->validate($request, [

            'name' => 'required|max:191'
        ]);

        if ( ! $request->session()->has('auth')) {

            return redirect()->route('auth.email.form');
        }

        auth()->user()->update( [ 'name' => $request->name ] );

        return redirect('/user');
        
    }


    public function user()
    {

    	dd(auth()->user());

    }
}