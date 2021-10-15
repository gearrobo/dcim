<?php

namespace App\Http\Controllers;

use App\Device;
use App\Sensor;
use Illuminate\Http\Request;

class HvacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'devices' => Device::where('type_id', 13)->get()
        ];
        return view('pages.hvac.index')->with($data);
    }

    public function detail($id)
    {
        $data = [
            'sensors' => Sensor::where('device_id', $id)->get(),
            'temp' => Sensor::where('device_id', $id)->where('sensor_type_id', 1)->first(),
            'hum' => Sensor::where('device_id', $id)->where('sensor_type_id', 2)->first(),
        ];
        return view('pages.hvac.detail')->with($data);
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
