<?php

namespace App\Http\Controllers;

use App\Business\DataAccess;
use App\models\ClientList;
use App\models\users;
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
        //$this->middleware('auth');
    }

    /*
     * Display the list of clients
     */
    public function index()
    {
//        //get client list
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

        return \View::make('clientlist')->with('clients',$clients);
    }

    /*
     * Create new client record
     */
    public function create()
    {

    }
}
