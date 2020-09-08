<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Otp;
use App\User;
use App\Jobs\VerificationEmailJob;

class TokenController extends Controller
{

    public function sendToken()
    {

    	$data = $this->validate(request(), [

    		'email' => 'required|email',
    	]);
    	
    	session()->flash( 'auth', $data );

    	$code = Otp::make( $data[ 'email' ] );

    	Otp::send( $data[ 'email' ], $code );


    	return redirect()->route( 'auth.token.form' );

    }


    public function showTokenForm(Request $request)
    {
    	
    	if ( ! $request->session()->has('auth')) {

    		return redirect()->route('auth.send.token');
    	}

    	$request->session()->reflash();

    	return view('otp.token_form');
    }


    public function verifyToken(Request $request)
    {

    	$data = $this->validate(request(), [

    		'code' => 'required'
    	]);

    	if ( ! $auth = session()->get('auth') ) {

    		return redirect(route('auth.email.form'));
    	}

    	$auth = $request->session()->get( 'auth' );

    	$array = [ 

    		'code' => $data['code'], 

    		'email' => $auth['email'] 

    	];

    	if ( Otp::checkCode( $array ) ) {
    		
	    	$user = User::whereEmail( $auth['email'] )->first();

	    	if ($user) {

	    		// if ($user->status == 'unactive') {

	    		// 	return redirect('/');
	    		// }

	    		auth()->login($user);

	    		return redirect('user');

	    	} else {

	    		$user = user::create( [

	    			'name' => 'بی نام',

	    			'email' => $auth['email']

	    		] );

	    		auth()->login($user);

                /*
                *Send Email For User Verification Email With Job
                */
                VerificationEmailJob::dispatch($user)
                    ->onQueue('VerificationEmail');

	    		$request->session()->reflash();

	    		return redirect(route('auth.info'));
	    	}

    	} else {

    		return redirect(route('auth.token.form'));
    		
    	}
    }
}