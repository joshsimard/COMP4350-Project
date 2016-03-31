<?php

namespace App\Http\Controllers\api;

use Response;
use Illuminate\Http\Request;
use App\Business\MedMng;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class apiRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAccess = new MedMng();
        $result = $dataAccess->getRequests(null);

        return Response::json(array(
            'error' => false,
            'data' => $result),
            200
        );
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
        $dataAccess = new MedMng();
        $dataAccess->requestSave($request["data"]);


        return Response::json(array(
            'error' => false,
            'data' => array("Data Saved")),
            200
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataAccess = new MedMng();
        $requests = $dataAccess->getRequests($dataAccess->userEmailbyID($id));

        return Response::json(array(
            'error' => false,
            'data' => $requests),
            200
        );
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
        $dataAccess = new MedMng();
        $dataAccess->requestUpdate($request["data"], $id);

        return Response::json(array(
            'error' => false,
            'data' => array("Data Saved")),
            200
        );

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
