<?php

namespace App\Http\Controllers;

use App\Device;
use App\Sensor;
use App\SensorType;
use Illuminate\Http\Request;

class ElectricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::where('type_id', 20)->get();
        $data = [
            'devices' => $devices
        ];
        return view('pages.electric.index')->with($data);
    }

    public function detail($id)
    {
        $data = [
            'device' => Device::find($id),
            'volt' => Sensor::where('device_id', $id)->where('sensor_type_id', 6)->first(),
            'current' => Sensor::where('device_id', $id)->where('sensor_type_id', 7)->first(),
            'power' => Sensor::where('device_id', $id)->where('sensor_type_id', 8)->first(),
            'sensors' => Sensor::where('device_id', $id)->orderBy('sensor_type_id')->get()
        ];
        return view('pages.electric.detail')->with($data);
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
}
