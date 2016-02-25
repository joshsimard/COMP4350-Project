<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctor_id', 'subject', 'body'
    ];
}
