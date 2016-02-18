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

//Handle Authentication
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/clientlist', 'ClientListController@index');
    Route::get('/client_form', 'ClientFormEditController@index');
    Route::get('/doctor_client_form', 'DoctorClientFormEditController@index');
    Route::resource('client_info', 'ClientFormEditController');
    Route::get('calendar', 'CalendarController@create');
    Route::get('add/event','AddEventController@create');
    Route::get('/appointments_list', 'ViewAppointmentsController@create');
    Route::get('/add/appointment', 'ScheduleAppointmentController@create');
    Route::get('/orders', 'OrdersController@create');
    Route::get('/notes', 'NotesController@create');
    Route::get('/add/note', 'AddNoteController@index');
    Route::get('/settings', 'SettingsController@create');
});
