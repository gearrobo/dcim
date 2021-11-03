<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IpaddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ipaddresses')->insert([
            'ipv4' => '192.168.100.12',
            'netmask' => '255.255.255.0',
            'gateway' => '192.168.100.1',
            'dns' => '192.168.100.1'
        ]);
    }
}
