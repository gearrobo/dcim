<?php

namespace App\Http\Controllers;

use App\Exports\SensorLogExport;
use App\Sensor;
use App\Sensor_log;
use App\SensorType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempid = 1;
        $humid = 2;
        $smokeid = 3;
        $dustid = 4;
        $doorid = 5;

        $data['temp'] = Sensor::where('sensor_type_id', $tempid)->where('device_id', null)->avg('avg_sensor');
        $data['hum'] = Sensor::where('sensor_type_id', $humid)->where('device_id', null)->avg('avg_sensor');
        $data['smoke'] = Sensor::where('sensor_type_id', $smokeid)->where('device_id', null)->avg('avg_sensor');
        $data['dust'] = Sensor::where('sensor_type_id', $dustid)->where('device_id', null)->avg('avg_sensor');
        $data['doors'] = Sensor::where('sensor_type_id', $doorid)->where('device_id', null)->get();
        return view('pages.room.index')->with($data);
    }

    public function sensor($link)
    {
        $tempid = 1;
        $humid = 2;
        $smokeid = 3;
        $dustid = 4;


        if ($link == 'Temperature') {
            $sensors = Sensor::where('sensor_type_id', $tempid)->where('device_id', null)->get();
            $data = [
                'title' => 'Suhu',
                'sensors' => $sensors
            ];
            return view('pages.room.sensor', $data);

        } elseif ($link == 'Humidity') {
            $sensors = Sensor::where('sensor_type_id', $humid)->where('device_id', null)->get();
            $data = [
                'title' => 'Kelembaban',
                'sensors' => $sensors
            ];
            return view('pages.room.sensor', $data);
        } elseif ($link == 'Smoke') {
            $sensors = Sensor::where('sensor_type_id', $smokeid)->where('device_id', null)->get();
            $data = [
                'title' => 'Asap',
                'sensors' => $sensors
            ];
            return view('pages.room.sensor', $data);
        } elseif ($link == 'Dust') {
            $sensors = Sensor::where('sensor_type_id', $dustid)->where('device_id', null)->get();
            $data = [
                'title' => 'Debu',
                'sensors' => $sensors
            ];
            return view('pages.room.sensor', $data);
        } else {
            echo "tidak ada";
        }
    }

    public function detail($link, $id)
    {
        if ($link == 'Suhu') {
            $data['title'] = "Suhu";
            $data['sensor'] = Sensor::find($id);
            $data['sensor_logs'] = Sensor_log::where('sensor_id', $id)->get();
            $logs = Sensor_log::select("created_at as time")->where('sensor_id', $id)->orderBy('id', 'ASC')->pluck('time');
            $avg = Sensor_log::select("avg_sensor as avg")->where('sensor_id', $id)->orderBy('id', 'ASC')->pluck('avg');
            $data['logs'] = json_encode($logs);
            $data['avg_sensor'] = json_encode($avg);
            return view('pages.room.detail', $data);

        } elseif ($link == 'Kelembaban') {
            $data['title'] = "Kelembaban";
            $data['sensor'] = Sensor::find($id);
            return view('pages.room.detail', $data);
        } elseif ($link == 'Asap') {
            $data['title'] = "Asap";
            $data['sensor'] = Sensor::find($id);
            return view('pages.room.detail', $data);
        } elseif ($link == 'Debu') {
            $data['title'] = "Debu";
            $data['sensor'] = Sensor::find($id);
            return view('pages.room.detail', $data);
        } else {
            echo "page tidak ada";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function export_excel(Request $request)
    {
        $tglawal = $request->tglawal;
        $tglakhir = $request->tglakhir;
        $id = $request->id;

        return Excel::download(new SensorLogExport($tglawal, $tglakhir, $id), 'Sensor '.$tglawal.'||'.$tglakhir.'.xlsx');
    }
}
