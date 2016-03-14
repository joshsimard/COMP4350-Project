<?php

namespace App\Http\Controllers;

use App\Business\DataAccess;
use App\models\Medication;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MedicationController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /*
     * Display the list of clients
     */
    public function index()
    {
        $dataAccess = new DataAccess();
        $medications = $dataAccess->getMedications();

        if (\Request::has('search')) {
            $query = \Request::get('search');

            $results = Term::where('name', 'LIKE', '%'.$query.'%')
                ->get();

            return \View::make('termslist')->with('terms', $results);
        }

        return \View::make('medicationlist')->with('medications',$medications);
    }

    /*
     * Create new client record
     */
    public function create()
    {

    }

    public function store(Request $request)
    {
        $dataAccess = new DataAccess();

        $list = [
            'quantity' => $request->quantity,
            'name' => $request->name,
        ];

        $dataAccess->saveMedications($list);



        return redirect('/medications');
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
