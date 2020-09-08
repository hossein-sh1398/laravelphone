<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Otp;

class OtpController extends Controller
{
    public function send()
    {
    	$code = Otp::make('09114030262');
    	$bool = Otp::send('09114030262', $code);
    	
    	if ($bool) {

    		return true;
    	} else {

    		return false;
    	}
    }

    public function checkCode()
    {
    	$code = 123456;
    	$bool = Otp::hasCode($code);
    	if ($bool) {
    		//auth()->loginUsingId(1, true);
    		return redirect('/')
    	} else {
    		return back();
    	}
    }
}
