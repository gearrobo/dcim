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

        DB::table('ipaddresses')->insert([
            'ipv4' => '192.168.100.12',
            'netmask' => '255.255.255.0',
            'gateway' => '192.168.100.1',
            'dns' => '192.168.100.1',
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
            24 => 'Rack'
        ];
        for ($i = 20; $i < 25; $i++) {
            DB::table('sensor_types')->insert([
                'name' => $data[$i],
                'type' => 'alat',
                'type_id' => $i
            ]);
        }
    }
}
