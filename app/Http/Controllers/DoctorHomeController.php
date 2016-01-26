<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DoctorHomeController extends Controller {
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

            return View('doctor_home');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(RegisterRequest $request) {
        // Getting all data after success validation.

    }
}