<?php

namespace App\Exports;

use App\Sensor_log;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class SensorLogExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $tglawal;
    protected $tglakhir;

    function __construct($tglawal, $tglakhir ,$id)
    {
        $this->tglawal = $tglawal;
        $this->tglakhir = $tglakhir;
        $this->id = $id;
    }
    public function collection()
    {
        return Sensor_log::select('sensor_id','avg_sensor','L1','L2','L3','created_at')->where('sensor_id', $this->id)->whereBetween(DB::raw('DATE(`created_at`)'), [$this->tglawal, $this->tglakhir])->get();
    }
}
