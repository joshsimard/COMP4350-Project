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

class NotesMng
{
    function saveNotes($list)
    {
        $note = Note::firstOrCreate($list);
    }

    function getNotes($id)
    {
        $notes = Note::where('doctor_id', '=', $id)->get();
        return $notes;
    }

    function search($query)
    {
        return Note::where('subject', 'LIKE', '%'.$query.'%')
            ->get();
    }
}