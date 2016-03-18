<?php
/**
 * Created by PhpStorm.
 * User: johnlarmie
 * Date: 2016-03-18
 * Time: 9:43 AM
 */

namespace app\Business;

use Hash;
use Auth;
use App\models\ClientList;
use App\models\users;
use App\models\calendar;
use App\models\visits;
use App\models\requests;
use App\models\Note;
use App\models\Term;
use App\models\Medication;
use App\User;
use DB;


class ClientMng
{
    function getClientsFromUsers()
    {
        //get client list
        $users = users::all();
        $clients = [];

        foreach($users as $patient)
        {
            //check if the user is apatient
            if(!$patient["admin"])
                $clients[] = $patient;
        }

        return $clients;
    }

    function getPatient($id)
    {
        $data = null;
        $firstEdit = users::where('id', '=', $id)->select('firstEdit')->firstOrFail();
        if($firstEdit->firstEdit)
        {
            $data = ClientList::where('userid', '=', $id)->firstOrFail();
        }
        else
        {
            $data = users::where('id','=', $id)->firstOrFail();
        }
        return $data;
    }

    function clientInfoSave($list, $userEmail)
    {
        try {
            $clientCheck = ClientList::where('email', '=', $userEmail)->firstOrFail();
            ClientList::where('email', $userEmail)
                ->update($list);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            $client = ClientList::firstOrCreate($list);

            //change auth::firstedit to true !!!

            $user = users::where('email', '=', $userEmail)->firstOrFail();
            $user->firstEdit = 1;
            $user->save();
        }
    }

    function getClientsApi()
    {

        $users = DB::table('users')
            ->select('id', 'firstName', 'lastName', 'email')
            ->where('admin', '0')
            ->get();

        return $users;
    }

    function getDetailedClientsApi($id)
    {

        try {

            $userDet = ClientList::where('userid', '=', $id)->firstOrFail();

        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $extraInfo = [
                'dob' => "",
                'gender' => "",
                'height' => "",
                'weight' => "",
                'mobileNum' => "",
                'homeNum' => "",
                'address' => "",
                'city' => "",
                'postalCode' => "",
                'state' => "",
                'country' => "",
                'occupation' => "",
                'maritalStatus' => "",
                'nextOfKin' => ""
            ];
            $userDet = users::where('id', '=', $id)->select('id', 'firstName', 'lastName', 'email')->firstOrFail();
            $userDet = array_merge((array) $userDet["attributes"], $extraInfo);
        }

        return $userDet;
    }

    function search($query)
    {
        return users::where('firstName', 'LIKE', '%'.$query.'%')
            ->orWhere('lastName', 'LIKE', '%'.$query.'%')
            ->orWhere('email', 'LIKE', '%'.$query.'%')
            ->get();
    }

    function searchRaw($query)
    {
        return users::whereRaw("concat(firstName, ' ', lastName) like '%$query%'")
            ->get();
    }
}