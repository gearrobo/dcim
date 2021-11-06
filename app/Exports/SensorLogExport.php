<?php

namespace App\Exports;

use App\Sensor_log;
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
        return Sensor_log::where('id', $this->id)->whereBetween('created_at', [$this->tglawal, $this->tglakhir])->get();
    }
}
