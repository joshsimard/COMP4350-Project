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

Route::get('/tests', function () {
    //selenium test
    return view('selenium/test');
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
Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/home', 'HomeController@index');
        Route::get('/requests', 'RequestsController@index');
        Route::post('/requests', 'RequestsController@store');
        Route::post('/request', 'RequestsController@update');
        Route::get('/clientlist', 'ClientListController@index');
        //Route::get('/client_form', 'ClientFormEditController@index');
        Route::get('/visit_form', 'VisitFormEditController@index');
        Route::resource('/visit_form', 'VisitFormEditController');
        Route::resource('/client_info', 'ClientFormEditController');
        Route::get('calendar', 'CalendarController@create');
        Route::post('calendar', 'CalendarController@store');
        //Route::resource('calendar', 'CalendarController');
        //Route::get('add/event', 'AddEventController@create');
       // Route::get('/appointments_list', 'ViewAppointmentsController@create');
       // Route::get('/add/appointment', 'ScheduleAppointmentController@create');
        Route::get('/orders', 'OrdersController@create');
        Route::get('/notes', 'NotesController@index');
        Route::get('/add/note', 'AddNoteController@index');
        Route::resource('add_note', 'AddNoteController');
        //Route::get('/settings', 'SettingsController@create');
        Route::get('/terms','TermsController@index');
        Route::get('/medications','MedicationController@index');
        Route::resource('order_medication','MedicationController');
        Route::get('/order_medication','MedicationController@create');
    });
});


//API

//Route::resource('api/client_save', 'api\apiClientSaveController');

//Route::group(['middleware' => ['auth.basic']], function () {

    Route::group(array('prefix' => 'api'), function(){
        //Route::resource('/register', 'api\apiRegisterController');
        //Route::post('/clients', 'api\apiClientController@store');
        Route::resource('register', 'api\apiRegisterController');
        Route::resource('login', 'api\apiLoginController');
        Route::resource('/clients', 'api\apiClientController');
        Route::resource('/events', 'api\apiEventController');
        Route::resource('/visits', 'api\apiVisitsController');
        Route::resource('/notes', 'api\apiNotesController');
        Route::resource('/terms', 'api\apiTermsController');
        Route::resource('/medication', 'api\apiMedicationController');
        Route::resource('/requests', 'api\apiRequestController');
    });
//});