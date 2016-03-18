<?php

namespace App\Http\Controllers;

use Route;
use App\Business\ClientMng;
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
        $dataAccess = new ClientMng();
        //$clients = $dataAccess->getClientsFromUsers();

        $request = Request::create('/api/clients', 'GET');

        $response = Route::dispatch($request);
        $obj = json_decode($response->content(), true);
        $clients = $obj["data"];


        if (\Request::has('search')) {
            $query = \Request::get('search');

            $results = $dataAccess->search($query);

            if(count($results) < 1) {
                $results = $dataAccess->searchRaw($query);
            }

            return \View::make('clientlist')->with('clients', $results);
        }



        //$obj2 = $obj["data"];
//        foreach($obj as $i)
//        {
//            //echo $i[1]["firstName"];
//            //echo print_r($i);
//            array_push($obj2, $i);
//        }
        //echo $response;
        //echo print_r($obj2);
        //echo $clients[0]["id"];
        //echo $response->content();

        //echo print_r($obj2);
        return \View::make('clientlist')->with('clients',$clients);
    }

    /*
     * Create new client record
     */
    public function create()
    {

    }
}
