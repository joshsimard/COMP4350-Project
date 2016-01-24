<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegistrationController extends Controller {
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View('registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(RegisterRequest $request) {
        // Getting all data after success validation.
        //print_r($request->all());die;
        // do your stuff here.
        $this->validate($request, $request->rules());
        return redirect()->guest('home');
    }
}