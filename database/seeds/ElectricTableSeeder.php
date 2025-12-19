<?php

use App\Device;
use App\Sensor;
use App\Sensor_log;
use Illuminate\Database\Seeder;

class ElectricTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Device::create([
            'name' => 'Panel UPS',
            'type_id' => 20,
            'description' => 'Panel Input UPS'
        ]);
        Device::create([
            'name' => 'NTI ENVIROMENT 5D',
            'type_id' => 25,
            'description' => 'Hardware Sensor Temp, Hum, Relay Contact dan Input Sensor'
        ]);
    }
}
