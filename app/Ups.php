<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ups extends Model
{
    protected $fillable = [
        'device_id',
        'input_volt_l1',
        'input_volt_l2',
        'input_volt_l3',
        'output_volt_l1',
        'output_volt_l2',
        'output_volt_l3',
        'input_frequency',
        'output_frequency',
        'l1','l2','l3',
        'battery_voltage',
        'battery_capacity',
        'backup_time'
    ];
    public function device()
    {
        return $this->belongsTo('App\Device','device_id');
    }
}
