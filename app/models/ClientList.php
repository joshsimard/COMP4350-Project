<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ClientList extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'dob', 'email', 'gender', 'height', 'weight', 'mobileNum', 'homeNum',
        'address', 'city', 'postalCode', 'state', 'country', 'occupation', 'maritalStatus', 'nextOfKin',
    ];
}
