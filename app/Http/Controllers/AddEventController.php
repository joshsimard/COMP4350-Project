<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

class AddEventController extends Controller {
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View('add/add_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function post() {
        // Getting all data after success validation.
        //print_r($request->all());die;
        // do your stuff here.
    }
}