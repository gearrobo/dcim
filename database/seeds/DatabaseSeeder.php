<?php

use App\Genset;
use App\Ipaddress;
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
        $this->call(SensorTypeTableSeeder::class);
        $this->call(GensetTableSeeder::class);
        $this->call(IpaddressTableSeeder::class);
        $this->call(SensorTableSeeder::class);
        $this->call(SensorLogsTableSeeder::class);
        $this->call(ElectricTableSeeder::class);
    }
}
