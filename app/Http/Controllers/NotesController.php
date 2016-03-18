<?php

namespace App\Http\Controllers;

use Auth;
use App\models\ClientList;
use App\models\Note;
use App\models\users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Route;

class NotesController extends Controller
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
        //get note list
        //$notes = Note::where('doctor_id', '=', Auth::user()->id)->get();

        $request = Request::create('/api/notes/'. Auth::user()->id, 'GET');

        $response = Route::dispatch($request);
        $obj = json_decode($response->content(), true);
        $notes = $obj["data"];

        if (\Request::has('search')) {
            $query = \Request::get('search');

            $results = Note::where('subject', 'LIKE', '%'.$query.'%')
                ->get();

            return \View::make('notes')->with('notes', $results);
        }
        return \View::make('notes')->with('notes',$notes);

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
        //
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
