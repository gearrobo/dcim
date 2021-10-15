<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['name','type_id','description'];
    public function sensortype(){
        return $this->belongsTo('App\SensorType','type_id');
    }
    public function sensor(){
        return $this->hasMany('App\Sensor');
    }
   
}
