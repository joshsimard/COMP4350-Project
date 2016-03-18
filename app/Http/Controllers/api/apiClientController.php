<?php

namespace App\Http\Controllers\api;

use Response;
use Illuminate\Http\Request;
use App\Business\ClientMng;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class apiClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAccess = new ClientMng();
        $clients = $dataAccess->getClientsApi();

        return Response::json(array(
            'error' => false,
            'data' => $clients),
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
        //$request->merge(json_decode($request->getContent(),true));
        $dataAccess = new ClientMng();
        $dataAccess->clientInfoSave($request["data"], $request->data['email']);
        $content = $request->getContent();
        //$pieces = explode("&", $content);

        return Response::json(array(
            'error' => false,
            'data' => []),
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
        $dataAccess = new ClientMng();
        $clients = $dataAccess->getDetailedClientsApi($id);

        return Response::json(array(
            'error' => false,
            'data' => $clients),
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
