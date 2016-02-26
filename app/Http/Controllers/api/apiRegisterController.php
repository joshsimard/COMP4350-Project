<?php

namespace App\Http\Controllers\api;

use Response;
use Illuminate\Http\Request;
use App\Business\DataAccess;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class apiRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //expected request
        $list =  [
            'firstName' => $request->data['firstName'],
            'lastName' => $request->data['lastName'],
            'email' => $request->data['email'],
            'password' => bcrypt($request->data['password']),
        ];

        $dataAccess = new DataAccess();
        $dataAccess->register($list);


        return Response::json(array(
            'error' => false,
            'data' => array('User Created')),
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
//        $dataAccess = new DataAccess();
//        $userid = $dataAccess->userIdByEmail($request->email);
//
//        return Response::json(array(
//            'error' => false,
//            'data' => array($notes)),
//            200
//        );
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
