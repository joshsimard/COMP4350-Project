<?php

namespace App\Http\Controllers;

use Auth;
use App\models\ClientList;
use App\models\users;
use App\Business\DataAccess;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Route;

class VisitFormEditController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if(Auth::user()->firstEdit)
//        {
//            $patient = ClientList::where('email','=', Auth::user()->email)->firstOrFail();
//        }
//        else
//        {
//            $patient = users::where('email','=', Auth::user()->email)->firstOrFail();
//        }

//        $request = Request::create('/api/clients/'. Auth::user()->id, 'GET');
//
//        $response = Route::dispatch($request);
//        $obj = json_decode($response->content(), true);
//        $patient = $obj["data"];
//
//        return \View::make('visit_form')->with('patient',$patient);
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
        $dataAccess = new DataAccess();
        $userid = $dataAccess->userIdByEmail($request->email);

        $list = [
            'userid' => $userid,
            'email' => $request->email,
            'height' => $request->height,
            'weight' => $request->weight,
            'date' => "{$request->year}-{$request->month}-{$request->day}",
            'symptoms' => $request->symptoms,
            'allergies' => $request->allergies,
            'time' => $request->time,
            'end_time' => $request->end_time,
        ];

        $dataAccess->visitSave($list);

        return redirect('/clientlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userid)
    {
//        $dataAccess = new DataAccess();
//        $patient = $dataAccess->getPatient($userid);
//        $visits = $dataAccess->getVisits($userid);

        //patient
        $request1 = Request::create('/api/clients/'. $userid, 'GET');
        $response = Route::dispatch($request1);
        $obj1 = json_decode($response->content(), true);
        $patient = $obj1["data"];

        //visits
        $request2 = Request::create('/api/visits/'. $userid, 'GET');
        $response = Route::dispatch($request2);
        $obj2 = json_decode($response->content(), true);
        $visits = $obj2["data"];

        $data = array('patient'=>$patient, 'visits'=>$visits);
        return \View::make('visit_form')->with($data);
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
