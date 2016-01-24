<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller {
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(LoginRequest $request) {
        // Getting all data after success validation.
        //print_r($request->all());die;
        // do your stuff here.
        $this->validate($request, $request->rules());
        return redirect()->guest('auth/home');
    }
}