<?php

namespace App\Http\Controllers;

use App\Device;
use App\Ipaddress;
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
        $data = [
            'ips' => Ipaddress::all()
        ];
        return view('pages.setting.index', $data);
    }

    public function sensortypes()
    {
        $sensortypes = SensorType::all();
        return view('pages.setting.sensortype', compact('sensortypes'));
    }
    public function sensor()
    {
        $sensors = Sensor::with('device')->get();
        $sensortypes = SensorType::whereType('sensor')->get();
        $devices = Device::all();
        return view('pages.setting.sensor', compact('sensors', 'sensortypes', 'devices'));
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
            'ip_address' => $request->ip_address,
            'description' => $request->description
        ]);

        return back()->with('success', 'Device ' . $request->name . ' Berhasil di Tambah!');
    }
    public function storesensor(Request $request)
    {
        $avg = $request->avg_sensor ?? 20;
        if ($request->sensor_type_id == 5) {
            $avg = 1;
        }

        $data = [
            'name' => $request->name,
            'sensor_type_id' => $request->sensor_type_id,
            'device_id' => $request->device_id,
            'detail_sensor' => $request->detail_sensor ?? null,
            'description' => $request->description,
            'min_sensor' => $request->min_sensor ?? 0,
            'max_sensor' => $request->max_sensor ?? 0,
            'treshold_min_sensor' => $request->treshold_min_sensor ?? 0,
            'min_hijau' => $request->min_hijau ?? 0,
            'max_hijau' => $request->max_hijau ?? 0,
            'treshold_max_sensor' => $request->treshold_max_sensor ?? 0,
            'min_merah' => $request->min_merah ?? 0,
            'max_merah' => $request->max_merah ?? 0,

            'avg_sensor' => $avg,
            'protocol_type' => $request->protocol_type,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'status_sensor' => $request->has('is_active') ? 'online' : 'inactive'
        ];

        // Add protocol-specific fields based on protocol type
        if ($request->protocol_type === 'snmp') {
            // SNMP fields
            $data['versi_snmp'] = $request->versi_snmp;
            $data['community'] = $request->community;
            $data['snmp_ip_address'] = $request->snmp_ip_address;
            $data['oid_name'] = $request->oid_name;
        } else {
            // Modbus fields (tcp, rtu, enc, http)
            $data['ip_address'] = $request->ip_address;
            $data['port'] = $request->port;
            $data['slave_id'] = $request->slave_id;
            $data['address'] = $request->address;
            $data['quantity'] = $request->quantity;
            $data['data_type'] = $request->data_type;
        }

        Sensor::create($data);
        
        return back()->with('success', 'Sensor ' . $request->name . ' Berhasil di Tambah!');
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
            'detail_sensor' => $request->detail_sensor ?? null,
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
            'sensortypes' => SensorType::whereType('sensor')->get(),
            'devices' => Device::all()
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
        Ipaddress::where('id', $id)->update([
            'ipv4' => $request->ipv4,
            'netmask' => $request->netmask,
            'gateway' => $request->gateway,
            'dns' => $request->dns
        ]);
        return back();
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
            'ip_address' => $request->ip_address,
            'description' => $request->description
        ]);
        return back()->with('info', 'Device ' . $request->name . ' Berhasil di Ubah!');
    }

    public function updatesensor(Request $request)
    {
        $data = [
            'name' => $request->name,
            'sensor_type_id' => $request->sensor_type_id,
            'device_id' => $request->device_id,
            'detail_sensor' => $request->detail_sensor ?? null,
            'description' => $request->description,
            'min_sensor' => $request->min_sensor ?? 0,
            'max_sensor' => $request->max_sensor ?? 0,
            'treshold_min_sensor' => $request->treshold_min_sensor ?? 0,
            'min_hijau' => $request->min_hijau ?? 0,
            'max_hijau' => $request->max_hijau ?? 0,
            'treshold_max_sensor' => $request->treshold_max_sensor ?? 0,
            'min_merah' => $request->min_merah ?? 0,
            'max_merah' => $request->max_merah ?? 0,

            'avg_sensor' => $request->avg_sensor ?? 20,
            'protocol_type' => $request->protocol_type,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'status_sensor' => $request->has('is_active') ? 'online' : 'inactive'
        ];

        // Add protocol-specific fields based on protocol type
        if ($request->protocol_type === 'snmp') {
            // SNMP fields
            $data['versi_snmp'] = $request->versi_snmp;
            $data['community'] = $request->community;
            $data['snmp_ip_address'] = $request->snmp_ip_address;
            $data['oid_name'] = $request->oid_name;
            // Clear Modbus fields
            $data['ip_address'] = null;
            $data['port'] = null;
            $data['slave_id'] = null;
            $data['address'] = null;
            $data['quantity'] = null;
            $data['data_type'] = null;
        } else {
            // Modbus fields (tcp, rtu, enc, http)
            $data['ip_address'] = $request->ip_address;
            $data['port'] = $request->port;
            $data['slave_id'] = $request->slave_id;
            $data['address'] = $request->address;
            $data['quantity'] = $request->quantity;
            $data['data_type'] = $request->data_type;
            // Clear SNMP fields
            $data['versi_snmp'] = null;
            $data['community'] = null;
            $data['snmp_ip_address'] = null;
            $data['oid_name'] = null;
        }

        Sensor::where('id', $request->id)->update($data);
        
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
