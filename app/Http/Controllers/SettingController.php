<?php

namespace App\Http\Controllers;

use App\Device;
use App\Rack;
use App\SensorType;
use App\Sensor;
use App\Ups;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.setting.index');
    }

    public function sensortypes()
    {
        $sensortypes = SensorType::all();
        return view('pages.setting.sensortype', compact('sensortypes'));
    }
    public function sensor()
    {
        $sensors = Sensor::all();
        $sensortypes = SensorType::whereType('sensor')->get();
        return view('pages.setting.sensor', compact('sensors', 'sensortypes'));
    }

    public function devices()
    {
        $data = [
            'devices' => Device::all(),
            'sensortypes' => SensorType::whereType('alat')->get()
        ];
        return view('pages.setting.device')->with($data);
    }

    public function racks()
    {
        $data = [
            'racks' => Rack::all()
        ];
        return view('pages.setting.rack')->with($data);
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
    public function storedevices(Request $request)
    {
        Device::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'description' => $request->description
        ]);
        $devid = Device::where('name', $request->name)->first();
        //  dd($devid->id,$request->type_id);
        if ($request->type_id == 20) {
            Sensor::create([
                'name' => 'Voltage',
                'device_id' => $devid->id,
                'sensor_type_id' => 6,
                'min_sensor' => 0,
                'max_sensor' => 200,
                'treshold_min_sensor' => 200,
                'min_hijau' => 250,
                'max_hijau' => 400,
                'treshold_max_sensor' => 450,
                'min_merah' => 450,
                'max_merah' => 600,
                'avg_sensor' => 350
            ]);
            Sensor::create([
                'name' => 'Current',
                'device_id' => $devid->id,
                'sensor_type_id' => 7,
                'min_sensor' => 0,
                'max_sensor' => 0,
                'treshold_min_sensor' => 0,
                'min_hijau' => 15,
                'max_hijau' => 25,
                'treshold_max_sensor' => 30,
                'min_merah' => 30,
                'max_merah' => 50,
                'avg_sensor' => 35
            ]);
            Sensor::create([
                'name' => 'Power',
                'device_id' => $devid->id,
                'sensor_type_id' => 8,
                'min_sensor' => 0,
                'max_sensor' => 0,
                'treshold_min_sensor' => 0,
                'min_hijau' => 15,
                'max_hijau' => 25,
                'treshold_max_sensor' => 30,
                'min_merah' => 30,
                'max_merah' => 50,
                'avg_sensor' => 35
            ]);
        }
        if ($request->type_id == 21) {
            Sensor::create([
                'name' => 'Temperature',
                'device_id' => $devid->id,
                'sensor_type_id' => 1,
                'min_sensor' => 0,
                'max_sensor' => 17,
                'treshold_min_sensor' => 17,
                'min_hijau' => 20,
                'max_hijau' => 25,
                'treshold_max_sensor' => 28,
                'min_merah' => 28,
                'max_merah' => 35,
                'avg_sensor' => 23
            ]);
            Sensor::create([
                'name' => 'Humidity',
                'device_id' => $devid->id,
                'sensor_type_id' => 2,
                'min_sensor' => 0,
                'max_sensor' => 40,
                'treshold_min_sensor' => 40,
                'min_hijau' => 45,
                'max_hijau' => 60,
                'treshold_max_sensor' => 65,
                'min_merah' => 65,
                'max_merah' => 100,
                'avg_sensor' => 55
            ]);
        }
        if ($request->type_id == 22) {
            Ups::create([
                'device_id' => $devid->id
            ]);
        }
        if ($request->type_id == 24) {
            Rack::create([
                'device_id' => $devid->id
            ]);
        }

        return back()->with('success', 'Device ' . $request->name . ' Berhasil di Tambah!');
    }
    public function storesensor(Request $request)
    {
        $avg = $request->avg_sensor;
        if ($request->sensor_type_id == 5) {
            $avg = 1;
        }
        Sensor::create([
            'name' => $request->name,
            'sensor_type_id' => $request->sensor_type_id,
            'description' => $request->description,
            'min_sensor' => $request->min_sensor,
            'max_sensor' => $request->max_sensor,
            'treshold_min_sensor' => $request->treshold_min_sensor,
            'min_hijau' => $request->min_hijau,
            'max_hijau' => $request->max_hijau,
            'treshold_max_sensor' => $request->treshold_max_sensor,
            'min_merah' => $request->min_merah,
            'max_merah' => $request->max_merah,
            'avg_sensor' => $avg
        ]);
        return back()->with('success', 'Sensor Type ' . $request->name . ' Berhasil di Tambah!');
    }

    public function storerack(Request $request)
    {
        Rack::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return back()->with('success', 'Sensor Type ' . $request->name . ' Berhasil di Tambah!');
    }

    public function sensordevices(Request $request)
    {
        Sensor::create([
            'name' => $request->name,
            'sensor_type_id' => $request->sensor_type_id,
            'device_id' => $request->device_id,
            'description' => $request->description,
            'min_sensor' => $request->min_sensor,
            'max_sensor' => $request->max_sensor,
            'treshold_min_sensor' => $request->treshold_min_sensor,
            'min_hijau' => $request->min_hijau,
            'max_hijau' => $request->max_hijau,
            'treshold_max_sensor' => $request->treshold_max_sensor,
            'min_merah' => $request->min_merah,
            'max_merah' => $request->max_merah,
            'L1' => '20',
            'L2' => '20',
            'L3' => '20'
        ]);
        return back()->with('success', 'Sensor ' . $request->name . ' Device ' . $request->device_name . ' Berhasil di Tambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function devicesdetail($id)
    {
        $data = [
            'device' => Device::find($id),
            'sensors' => Sensor::where('device_id', $id)->get(),
            'sensortypes' => SensorType::whereType('sensor')->get()
        ];
        return view('pages.setting.detail')->with($data);
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

    public function updatesensortypes(Request $request)
    {
        SensorType::where('id', $request->id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description
        ]);
        return back()->with('info', 'Sensor Type ' . $request->name . ' Berhasil di Ubah!');
    }

    public function updatedevices(Request $request)
    {
        Device::where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return back()->with('info', 'Device ' . $request->name . ' Berhasil di Ubah!');
    }

    public function updatesensor(Request $request)
    {
        Sensor::where('id', $request->id)->update([
            'name' => $request->name,
            'sensor_type_id' => $request->sensor_type_id,
            'description' => $request->description,
            'min_sensor' => $request->min_sensor,
            'max_sensor' => $request->max_sensor,
            'treshold_min_sensor' => $request->treshold_min_sensor,
            'min_hijau' => $request->min_hijau,
            'max_hijau' => $request->max_hijau,
            'treshold_max_sensor' => $request->treshold_max_sensor,
            'min_merah' => $request->min_merah,
            'max_merah' => $request->max_merah,
        ]);
        return back()->with('info', 'Sensor ' . $request->name . ' Berhasil di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroydevices($id, $type_id)
    {
        if ($type_id == 24) {
            $rack = Rack::where('device_id', $id)->first();
            Rack::destroy($rack->id);
        }
        if ($type_id == 22) {
            $ups = Ups::where('device_id', $id)->first();
            Ups::destroy($ups->id);
        }
        if ($type_id == 21) {
            $sensors = Sensor::where('device_id', $id)->get();
            foreach ($sensors as $sensor) {
                Sensor::destroy($sensor->id);
            }
        }
        if ($type_id == 20) {
            $sensors = Sensor::where('device_id', $id)->get();
            foreach ($sensors as $sensor) {
                Sensor::destroy($sensor->id);
            }
        }
        Device::destroy($id);
        return back()->with('error', 'Device Berhasil di Hapus!');
    }
    public function destroysensortypes($id)
    {
        SensorType::destroy($id);
        return back()->with('error', 'Sensor Type Berhasil di Hapus!');
    }
    public function destroysensor($id)
    {
        Sensor::destroy($id);
        return back()->with('error', 'Sensor Berhasil di Hapus!');
    }
    public function destroyrack($id)
    {
        Rack::destroy($id);
        return back()->with('error', 'Rack Berhasil di Hapus!');
    }
}
