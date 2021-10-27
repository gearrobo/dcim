<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ipaddress extends Model
{
    protected $fillables = [
        'ipv4',
        'netmask',
        'gateway',
        'dns'
    ];
}
