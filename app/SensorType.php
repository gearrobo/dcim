<?php

namespace App;

use App\Sensor;

use Illuminate\Database\Eloquent\Model;

class SensorType extends Model
{
    protected $fillable = ['type_id', 'name', 'description', 'type'];
}
