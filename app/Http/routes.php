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





//Links in doctors home
Route::get('/calendar', function()
{
    return View::make('/calendar');
});

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



//links in client home
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


//Handle Authentication
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/clientlist', 'ClientListController@index');


});
