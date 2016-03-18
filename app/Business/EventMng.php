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

class EventMng
{
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

    function getEvents()
    {
        return calendar::all();
    }
}