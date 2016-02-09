<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Note_Tags extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'note_tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'note_id', 'client_id'
    ];
}
