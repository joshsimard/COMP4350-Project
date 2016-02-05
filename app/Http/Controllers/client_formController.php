<?php

namespace App\Http\Controllers;

use App\models\ClientList;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class client_formController extends Controller {


public function createClient()
{
// validate the info, create rules for the inputs
$rules = array(
'username'    => 'required|username', // make sure the username field is not empty
'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
);

// run the validation rules on the inputs from the form
$validator = Validator::make(Input::all(), $rules);

// if the validator fails, redirect back to the form
if ($validator->fails()) {
return Redirect::to('/')
->withErrors($validator) // send back all errors to the login form
->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
} else {

// create our user data for the authentication
$userdata = array(
'username'  => Input::get('username'),
'password'  => Input::get('password')
);

// attempt to do the login
if (Auth::attempt($userdata)) {

// validation successful!
// redirect them to the secure section or whatever
// return Redirect::to('secure');
// for now we'll just echo success (even though echoing in a controller is bad)
echo 'SUCCESS!';

} else {

// validation not successful, send back to form
return Redirect::to('/');

}

}
}

}