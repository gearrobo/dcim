<?php

use App\Sensor_log;
use Illuminate\Database\Seeder;

class SensorLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 11; $i++) { 
            Sensor_log::create([
                'sensor_id' => 1,
                'avg_sensor' => 17+$i,
                'L1' => null,
                'L2' => null,
                'L3' => null
            ]);
        }
        for ($i=0; $i < 11; $i++) { 
            Sensor_log::create([
                'sensor_id' => 2,
                'avg_sensor' => 17+$i,
                'L1' => null,
                'L2' => null,
                'L3' => null
            ]);
        }
    }
}
