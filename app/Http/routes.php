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
    //return view('welcome');
    return Redirect::to('login');
});


Route::get('/db', function () {
    //return db test
    return DB::table('users')->get();
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

Route::get('/calendar', function()
{
    return View::make('/calendar');
});

Route::get('/clientlist', 'ClientListController@index');

Route::get('/notes', function()
{
    return View::make('/notes');
});

Route::get('/orders', function()
{
    return View::make('/orders');
});

Route::get('/settings', function()
{
    return View::make('/settings');
});

Route::get('/c_home', function()
{
    return View::make('/client_home');
});

Route::get('/viewAppoinments', function()
{
    return View::make('/client_appointments');
});

Route::get('/scheduleAppointment', function()
{
    return View::make('/client_make_appimt');
});

Route::get('/editInfo', function()
{
    return View::make('/edit_info');
});

//Route::get('home', 'DoctorHomeController@create');
//Route::post('home', 'DoctorHomeController@store');

//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');
//
//Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('forgot', function(){
    echo 'Did you forget your password? No big deal. Click here to change your password to "password"!';
});

//Route::group(['middleware' => ['web']], function () {
//
//    //login
//    //Route::get('login', 'LoginController@create');
//    //Route::post('login', 'LoginController@post');
//    //Route::get('logout', 'LoginController@logout');
//});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@d_Home');

});
