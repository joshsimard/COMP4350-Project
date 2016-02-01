<?php

namespace App\Http\Controllers;

use Auth;
use App\models\ClientList;
use App\models\users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClientFormEditController extends Controller
{
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->firstEdit)
        {
            $patient = ClientList::where('email','=', Auth::user()->email)->firstOrFail();
        }
        else
        {
            $patient = users::where('email','=', Auth::user()->email)->firstOrFail();
        }
        //get client list
        //$clients = ClientList::all();

        return \View::make('client_form')->with('patient',$patient);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $list = [
            'firstName' => $request->first_name,
            'lastName' => $request->last_name,
            'dob' => $request->dob,
            'email' => $request->email,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
            'mobileNum' => $request->phone,
            'homeNum' => $request->home_phone,
            'address' => $request->address,
            'city' => $request->city,
            'postalCode' => $request->postal_code,
            'state' => $request->state,
            'country' => $request->country,
            'occupation' => $request->occupation,
            'maritalStatus' => $request->status,
            'nextOfKin' => $request->next_kin
        ];

        try {
            $clientCheck = ClientList::where('email', '=', Auth::user()->email)->firstOrFail();
            ClientList::where('email', Auth::user()->email)
                ->update($list);
        }catch(\Illuminate\Database\QueryException $e){
            $client = ClientList::firstOrCreate($list);

            //change auth::firstedit to true !!!

            $user = users::where('email', '=', Auth::user()->email)->firstOrFail();
            $user->firstEdit = 1;
            $user->save();
        }




        return redirect('home');
        //return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
