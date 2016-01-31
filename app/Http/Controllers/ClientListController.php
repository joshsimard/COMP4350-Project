<?php

namespace App\Http\Controllers;

use App\models\ClientList;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClientListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
     * Display the list of clients
     */
    public function index()
    {
        //get client list
        $clients = ClientList::all();

        return \View::make('clientlist')->with('clients',$clients);
    }

    /*
     * Create new client record
     */
    public function create()
    {

    }
}
