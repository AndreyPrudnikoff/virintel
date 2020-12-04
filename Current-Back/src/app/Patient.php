<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $fillable = [
        'virntel_id',
        'patient_name',
        'sex',
        'dob',
        'doctor_name',
    ];

}
