<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//show form input email
Route::get('auth/email', 'AuthController@showFormEmail')->name('auth.email.form');
// send code to user
Route::post('auth/email', 'TokenController@sendToken')->name('auth.send.token');

//show form token
Route::get('auth/token', 'TokenController@showTokenForm')->name('auth.token.form');
// check token
Route::post('auth/token', 'TokenController@verifyToken')->name('auth.verify.token');

Route::get('auth/info', 'AuthController@showFormInfo')->name('auth.info.form');

Route::post('auth/info', 'AuthController@info')->name('auth.info');

Route::get('user', 'AuthController@user');

Route::get('mail1', 'MailController@mail1');
Route::get('mail2', 'MailController@mail2');
Route::get('mark_down', 'MailController@mark_down');

