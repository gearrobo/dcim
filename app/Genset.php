<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genset extends Model
{
    protected $fillable = ['name','description','status','solar_capacity','solar'];
}
