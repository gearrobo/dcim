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
        'location_monitoring',
        'protocol_type',
        'ip_address',
        'port',
        'versi_snmp',
        'community',
        'snmp_ip_address',
        'oid_name',
        'slave_id',
        'address',
        'quantity',
        'data_type',
        'is_active',
        'last_seen',
        'status_sensor'
    ];
    public function sensortype(){
        return $this->belongsTo('App\SensorType','sensor_type_id');
    }
    public function device(){
        return $this->belongsTo('App\Device','device_id');
    }
}
