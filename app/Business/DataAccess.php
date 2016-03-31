<?php
/**
 * Created by PhpStorm.
 * User: johnlarmie
 * Date: 2016-02-20
 * Time: 1:34 PM
 */

namespace App\Business;

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

class DataAccess{

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

    function eventSave($id, $title, $start, $end, $userEmail, $name)
    {
        $list = [
            'event_id' => $id,
            'title' => $title,
            'start_time' => $start,
            'end_time' => $end,
            'client_id' => $userEmail,
            'client_name' => $name
        ];

        try {

            $eventCheck = calendar::where('event_id', '=', $id)->firstOrFail();
            //update saved event if no fail
            calendar::where('event_id', $id)
                ->update($list);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){

            //create new event
            $event = calendar::firstOrCreate($list);

        }
    }

    function apiEventSave($list)
    {
        try {

            $eventCheck = calendar::where('event_id', '=', $list['event_id'])->firstOrFail();
            //update saved event if no fail
            calendar::where('event_id', $list['event_id'])
                ->update($list);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){

            //create new event
            $event = calendar::firstOrCreate($list);

        }
    }

    function visitSave($list)
    {
        visits::create($list);
    }

    function getVisits($id)
    {
//        $email = users::where('id', '=', $id)->select('email')->firstOrFail();
//        $email = $email->email;
        return visits::where('userid', '=', $id)->get();
    }

    function requestSave($list)
    {
        requests::create($list);
    }

    function requestUpdate($list, $id)
    {
        try {

            $requestCheck = requests::where('id', '=', $id)->firstOrFail();
            requests::where('id', $id)
                ->update($list);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            //create new request
            $request = requests::firstOrCreate($list);
        }
    }

    function getRequests($email)
    {
        $data = null;
        if ($email) {
            $data = requests::where('email', '=', $email)->orderBy('created_at', 'desc')->get();
        }
        else{
            $data = requests::where('status', '=', "pending")->orderBy('created_at', 'desc')->get();
        }
        return $data;
    }

    function getEvents()
    {
        return calendar::all();
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

    function currentUserID()
    {
        $user = users::where('email', '=', Auth::user()->email)->firstOrFail();
        return $user->id;
    }

    function userIdByEmail($userEmail)
    {
        $user = users::where('email', '=', $userEmail)->firstOrFail();
        return $user->id;
    }

    function userEmailbyID($id)
    {
        $user = users::where('id', '=', $id)->firstOrFail();
        return $user->email;
    }

    function saveNotes($list)
    {
        $note = Note::firstOrCreate($list);
    }

    function getNotes($id)
    {
        $notes = Note::where('doctor_id', '=', $id)->get();
        return $notes;
    }

    function getTerms()
    {
        $terms = Term::all()->sortBy('name');
        return $terms;
    }

    function getMedications()
    {
        return Medication::all()->sortBy('name');
    }

    function saveMedications($name,$quantity)
    {
        $list = [
            'name' => $name,
            'quantity' => $quantity
        ];
        try{
            $medication = Medication::where('name','=',$name)->firstOrFail();
            $medication->quantity += $quantity;
            $medication->save();
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            $medication = Medication::firstOrCreate($list);
        }

    }

    function register($list)
    {
        User::create($list);
    }

    function checkLogin($email, $password)
    {
        try{
            $user = User::where('email', $email)->firstOrFail();

            if(Hash::check($password, $user->password)) {
                if ($user->admin)
                    return $user;
                else
                    return $user;
            }
            else
                return "Invalid";
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return "Invalid";
        }
    }

}
