<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

class RegistrationController extends Controller {
    protected $registrar;
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
        $validator = $this->validator($request->rules());
        $this->validate($request, $request->rules());
        return redirect()->guest('auth/home');
    }
}