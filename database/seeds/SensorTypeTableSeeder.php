<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensorTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            1 => 'Temperature (celcius)',
            2 => 'Humidity (%)',
            3 => 'Smoke (ppm)',
            4 => 'Dust (ug/m)',
            5 => 'Door (unit)',
            6 => 'Voltage (volt)',
            7 => 'Current (amp)',
            8 => 'Active Power (W)',
            9 => 'Frequency (hz)',
            10 => 'Energy (Kwh)',
            11 => 'Lvmdp (%)',
            12 => 'Relay (unit)'
        ];
        for ($i = 1; $i < 13; $i++) { //count($data) + 1
            DB::table('sensor_types')->insert([
                'name' => $data[$i],
                'type' => 'sensor',
                'type_id' => $i
            ]);
        }

        $data = [
            20 => 'Panel',
            21 => 'Pac',
            22 => 'Ups',
            23 => 'Pdu',
            24 => 'Rack',
            25 => 'Sensor'
        ];
        for ($i = 20; $i < 26; $i++) {
            DB::table('sensor_types')->insert([
                'name' => $data[$i],
                'type' => 'alat',
                'type_id' => $i
            ]);
        }
    }
}
