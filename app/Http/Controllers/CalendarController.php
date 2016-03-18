<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Business\DataAccess;
use App\Business\EventMng;
use Route;

class CalendarController extends Controller
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
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $dataAccess = new DataAccess();
//
//        $events = $dataAccess->getEvents();

        $request = Request::create('/api/events', 'GET');

        $response = Route::dispatch($request);
        $obj = json_decode($response->content(), true);
        $events = $obj["data"];

        $eventArray = array();
        foreach($events as $event)
        {
            //array_push($eventArray, array($event['event_id'],$event['admin'], $event['title'], $event['start_time'], $event['end_time'], $event['client_id']));
            array_push($eventArray, array($event['event_id'], 0, $event['title'], $event['start_time'], $event['end_time'], $event['client_id']));
        }

        //echo print_r($eventArray);


        return \View::make('/calendar')->with('events',$eventArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataAccess = new EventMng();

        $data = $request->input('data');
        list($id, $title, $start, $end) = explode("&", $data);
        $name = Auth::user()->firstName.' '.Auth::user()->lastName;

        $dataAccess->eventSave($id, $title, $start, $end, Auth::user()->email, $name);

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
