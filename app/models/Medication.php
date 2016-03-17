<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'medication';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity', 'name'
    ];
}
