<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Mail\TokenEmail;

class Otp extends Model
{

    protected $fillable = ['code', 'email', 'expire'];

    public static function make($email)
    {

        do {

    	    $code = rand( 100000, 999999 );

        } while ( self::isUnique( $code ) );
            
        self::create([

            'code' => $code,

            'email' => $email,

            'expire' => Carbon::now()->addMinutes(5)->toDateTimeString()

        ]);
        
        return $code;
    }


    public static function isUnique($code)
    {

		return self::where('code', $code)->exists();

    }


    public static function send($email, $code)
    {

        \Mail::to($email)->send(new TokenEmail($code));
    }


    public static function checkCode($data)
    {
        return self::where( [
            [ 'code', $data[ 'code' ] ],
            [ 'email', $data[ 'email' ] ],
            [ 'expire', '>', Carbon::now()->toDateTimeString() ]
        ] )
        ->exists();
    }
}
