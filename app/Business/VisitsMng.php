<?php
/**
 * Created by PhpStorm.
 * User: johnlarmie
 * Date: 2016-03-18
 * Time: 9:44 AM
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

class VisitsMng
{
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
}