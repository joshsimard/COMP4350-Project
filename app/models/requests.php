<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class requests extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'quantity', 'status', 'client', 'notes'
    ];
}
