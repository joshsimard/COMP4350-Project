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
        //
    }

    /*
     * Display the list of clients
     */
    public function index()
    {
        $dataAccess = new DataAccess();
        $clients = $dataAccess->getClientsFromUsers();

        if (\Request::has('search')) {
            $query = \Request::get('search');

            $results = users::where('firstName', 'LIKE', '%'.$query.'%')
                ->orWhere('lastName', 'LIKE', '%'.$query.'%')
                ->orWhere('email', 'LIKE', '%'.$query.'%')
                ->get();

            if(count($results) < 1) {
                $results = users::whereRaw("concat(firstName, ' ', lastName) like '%$query%'")
                ->get();
            }

            return \View::make('clientlist')->with('clients', $results);
        }

        return \View::make('clientlist')->with('clients',$clients);
    }

    /*
     * Create new client record
     */
    public function create()
    {

    }
}
