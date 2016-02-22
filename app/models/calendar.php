<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class calendar extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'calendar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id', 'title', 'start_time', 'end_time', 'client_id', 'client_name'
    ];
}
