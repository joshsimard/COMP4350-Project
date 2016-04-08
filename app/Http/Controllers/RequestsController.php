<?php

namespace App\Http\Controllers;

use App\Business\MedMng;
use Auth;
use App\Http\Requests;
use App\Business\DataAccess;
use Illuminate\Http\Request;
use Route;

class RequestsController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAccess = new MedMng();
        if (Auth::user()->admin == true) {
            $request = Request::create('/api/requests', 'GET');
            $response = Route::dispatch($request);
            $obj = json_decode($response->content(), true);
            $requests = $obj["data"];
           // $requests = $dataAccess->getRequests(null);
            $data = array('requests'=>$requests);
            return View('doctor_requests')->with($data);
        }
        else {
            $request = Request::create('/api/requests/'.Auth::user()->id, 'GET');
            $response = Route::dispatch($request);
            $obj = json_decode($response->content(), true);
            $requests = $obj["data"];
            //$requests = $dataAccess->getRequests(Auth::user()->email);
            $data = array('requests'=>$requests);
            return View('client_requests')->with($data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $dataAccess = new MedMng();
        $client = Auth::user()->firstName." ".Auth::user()->lastName;
        $list = [
            'name' => $request->name,
            'client' => $client,
            'email' => Auth::user()->email,
            'quantity' => $request->quantity,
            'status' => 'pending',
            'notes' => 'none'
        ];
        $dataAccess->requestSave($list);
        return back();
    }

    /**
     * update a request to approved/declined.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request)
    {
        $dataAccess = new MedMng();
        $status = 'pending';
        if($request->action == 'approved') {
            $status = 'approved';
        } else if($request->action == 'declined') {
            $status = 'declined';
        }
        $list = [
            'quantity' => $request->quantity,
            'status' => $status,
            'notes' => $request->notes
        ];
        $dataAccess->requestUpdate($list, $request->id);
        return back();
    }

}
