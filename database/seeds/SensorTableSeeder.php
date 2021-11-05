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
            'status' => null,
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
            'status' => null,
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
    }
}
