<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    protected $fillable = [
        'device_id','description','temp_on','temp_middle','temp_under','hum_on','hum_middle','hum_under','dust','current','power','voltage'
    ];
    public function device()
    {
        return $this->belongsTo('App\Device','device_id');
    }
}
