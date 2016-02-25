<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\models\users;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Business\DataAccess;
use App\models\Note;
use App\models\Note_Tags;

class AddNoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //get client list
//        $users = users::all();
//        $clients = [];
//
//        foreach($users as $patient)
//        {
//            //check if the user is apatient
//            if(!$patient["admin"])
//                $clients[] = $patient;
//        }

        $dataAccess = new DataAccess();
        $clients = $dataAccess->getClientsFromUsers();

        return \View::make('add/add_note')->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return View('add/add_note');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = users::where('id','=', Auth::user()->id)->firstOrFail();

        $list = [
            'doctor_id' => $doctor["id"],
            'subject' => $request->subject,
            'body' => $request->body
        ];

        $note = Note::firstOrCreate($list);

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
