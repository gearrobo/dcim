<?php

namespace App\Exports;

use App\Sensor_log;
use Maatwebsite\Excel\Concerns\FromCollection;

class SensorLogExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sensor_log::all();
    }
}
