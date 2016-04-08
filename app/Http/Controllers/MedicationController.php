<?php

namespace App\Http\Controllers;

use App\Business\MedMng;
use App\models\Medication;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Route;
use Symfony\Component\Console\Input\Input;

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
        $dataAccess = new MedMng();

        $request = Request::create('/api/medication', 'GET');
        $response = Route::dispatch($request);
        $obj = json_decode($response->content(), true);
        $medications = $obj["data"];
        //$medications = $dataAccess->getMedications();

        if (\Request::has('search')) {
            $query = \Request::get('search');

            $results = $dataAccess->search($query);

            return \View::make('medications')->with('medications', $results);
        }

        return \View::make('medications')->with('medications',$medications);
    }

    /*
     * Create new client record
     */
    public function create()
    {
        $dataAccess = new MedMng();
        //$medications = $dataAccess->getMedications();
        $request = Request::create('/api/medication', 'GET');
        $response = Route::dispatch($request);
        $obj = json_decode($response->content(), true);
        $medications = $obj["data"];

        return \View::make('order_medication')->with('medications',$medications);
    }

    public function store(Request $request)
    {
        $dataAccess = new MedMng();

        $dataAccess->saveMedications($request->name,$request->quantity);

        return redirect('/medications');
    }

//    public function autocomplete()
//    {
//        $dataAccess = new MedMng();
//        $term = Input::get('term');
//
//        $results = array();
//
//        $queries = $dataAccess->autoComplete($term);
//
////        DB::table('medication')
////            ->where('name', 'LIKE', '%'.$term.'%')
////            ->take(5)->get();
//
//        foreach ($queries as $query)
//        {
//            $results[] = [ 'id' => $query->id, 'value' => $query->name ];
//        }
//        return Response::json($results);
//    }

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
