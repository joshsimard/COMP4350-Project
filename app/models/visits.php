<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class visits extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'visits';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'symptoms', 'allergies', 'height', 'weight', 'date', 'time', 'end_time'
    ];
}
