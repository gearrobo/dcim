<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'sensor_type_id',
        'device_id',
        'status',
        'floor_id',
        'min_sensor',
        'max_sensor',
        'treshold_min_sensor',
        'min_hijau',
        'max_hijau',
        'treshold_max_sensor',
        'min_merah',
        'max_merah',
        'avg_sensor',
        'L1',
        'L2',
        'L3'
    ];
    public function sensortype(){
        return $this->belongsTo('App\SensorType','sensor_type_id');
    }
    public function device(){
        return $this->belongsTo('App\Device','device_id');
    }
}
