<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Business\DataAccess;
use App\Business\ClientMng;
use App\models\ClientList;
use App\models\users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Route;
use Illuminate\Support\Facades\Input;


class ClientFormEditController extends Controller
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
//        $dataAccess = new DataAccess();
//        $id = $dataAccess->currentUserID();
//        $patient = $dataAccess->getPatient($id);

        $request = Request::create('/api/clients/'. Auth::user()->id, 'GET');

        $response = Route::dispatch($request);
        $obj = json_decode($response->content(), true);
        $patient = $obj["data"];

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
        $dataAccess = new ClientMng();
        $dataAccess1 = new DataAccess();
        $id = $dataAccess1->currentUserID();

        $patient = $dataAccess->getPatient($id);

        $list = [
            'userid' => $id,
            'firstName' => $patient["firstName"],
            'lastName' => $patient["lastName"],
            'dob' => "{$request->year}-{$request->month}-{$request->day}",
            'email' => $patient["email"],
            'gender' => $request->sex,
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

        $dataAccess->clientInfoSave($list, Auth::user()->email);

        $json = json_encode(array("data"=>$list));
//
//        $server = ['Content-Type'=>"application/json"];
//        //"$uri, $method = 'GET', $parameters = array(), $cookies = array(), $files = array(), $server = array(), $content = null"
//
        $postRequest = Request::create('/api/clients', 'POST', [], [], [], [], $json);
        $headers = $postRequest->headers;
        $headers->set('Content-Type', 'application/json');
        $headers->set('Accept', 'application/json');

        //echo print_r($headers);
        $response = Route::dispatch($postRequest);

//        $postRequest->headers = array('CONTENT_TYPE'=> 'application/json');
//        $postRequest->attributes = $json;
//        $response = Route::dispatch($postRequest);

         //echo print_r($postRequest);
        //echo $postRequest;

////
//        $headers = array();
//        $headers[] = 'Content-Type: application/json';
//        $username = "john@doe.com";
//        $password = "password";
//
//        // create a new cURL resource
//        $ch = curl_init();
//
//        // set URL and other appropriate options
//        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/clients");
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
//        curl_setopt ($ch, CURLOPT_PORT , 8089);
//
//        // grab URL and pass it to the browser
//        $response = curl_exec($ch);
//        echo print_r($response);
//        $info = curl_getinfo($ch);
//        echo print_r($info["http_code"]);
//
////        if ($response === false)
////        {
////            // throw new Exception('Curl error: ' . curl_error($crl));
////            print_r('Curl error: ' . curl_error($response));
////        }
//        //echo $response;
//
//        // close cURL resource, and free up system resources
//        curl_close($ch);

        return redirect('home');
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
