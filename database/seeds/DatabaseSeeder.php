<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gensets')->insert([
            'name' => 'Genset Utama'
        ]);

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
        ];
        for ($i = 1; $i < count($data) + 1; $i++) {
            DB::table('sensor_types')->insert([
                'name' => $data[$i],
                'type' => 'sensor',
                'type_id' => $i
            ]);
        }

        $data = [
            12 => 'Panel',
            13 => 'Pac',
            14 => 'Ups',
            15 => 'Pdu',
            16 => 'Rack'
        ];
        for ($i = 12; $i < 17; $i++) {
            DB::table('sensor_types')->insert([
                'name' => $data[$i],
                'type' => 'alat',
                'type_id' => $i
            ]);
        }
    }
}
