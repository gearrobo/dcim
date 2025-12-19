<?php

namespace App;
use App\Sensor;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['id','name','type_id','ip_address','description'];
    public function sensortype(){
        return $this->belongsTo('App\SensorType','type_id');
    }
    public function sensor()
    {
        return $this->hasMany(Sensor::class);
    }
   
}
