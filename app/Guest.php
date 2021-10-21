<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'name',
        'address',
        'handphone',
        'gender',
        'destination',
        'reason',
        'picture',
        'time',
        'status'
    ];
}
