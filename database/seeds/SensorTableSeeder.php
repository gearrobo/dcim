<?php

use App\Sensor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sensor::create([
            'name' => 'Sensor 1',
            'description' => 'Sensor Suhu Server',
            'sensor_type_id' => 1,
            'device_id' => null,
            'floor_id' => null,
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
            'name' => 'Sensor 2',
            'description' => 'Sensor Suhu Server',
            'sensor_type_id' => 1,
            'device_id' => null,
            'floor_id' => null,
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
            'name' => 'Voltage',
            'device_id' => null,
            'sensor_type_id' => 6,
            'status_x' => '1_phase',
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
            'device_id' => null,
            'sensor_type_id' => 7,
            'status_x' => '1_phase',
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
            'device_id' => null,
            'sensor_type_id' => 8,
            'status_x' => '1_phase',
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
}
