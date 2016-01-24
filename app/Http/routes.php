<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::get('auth/calendar', function()
{
    return View::make('auth/calendar');
});

Route::get('auth/clientlist', function()
{
    return View::make('auth/clientlist');
});

Route::get('auth/notes', function()
{
    return View::make('auth/notes');
});

Route::get('auth/orders', function()
{
    return View::make('auth/orders');
});

Route::get('auth/settings', function()
{
    return View::make('auth/settings');
});

Route::get('auth/home', 'DoctorHomeController@create');
Route::post('auth/home', 'DoctorHomeController@store');

Route::group(['middleware' => ['web']], function () {
    //register
    Route::get('register', 'RegistrationController@create');
    Route::post('register', 'RegistrationController@store');

    //login
    Route::get('login', 'LoginController@create');
    Route::post('login', 'LoginController@store');
});

Route::get('home', function() {
    return View::make('home');
});