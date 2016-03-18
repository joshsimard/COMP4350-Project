<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\models\users;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Business\DataAccess;
use App\Business\NotesMng;
use App\models\Note;
use App\models\Note_Tags;
use Route;

class AddNoteController extends Controller
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
//        $clients = $dataAccess->getClientsFromUsers();

        //get clients
        $request = Request::create('/api/clients', 'GET');

        $response = Route::dispatch($request);
        $obj = json_decode($response->content(), true);
        $clients = $obj["data"];

        return \View::make('add/add_note')->with('clients',$clients);
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
        $dataAccess = new NotesMng();

        //$doctor = users::where('id','=', Auth::user()->id)->firstOrFail();

        $list = [
            'doctor_id' => Auth::user()->id,
            'subject' => $request->subject,
            'body' => $request->body
        ];

        $dataAccess->saveNotes($list);



        return redirect('/notes');
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
