<?php namespace App\Http\Controllers;

use Auth;
use App\Models\ClientList;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DoctorHomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
            $user = Auth::user()->firstName;
            return View('doctor_home')->withUser($user);

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