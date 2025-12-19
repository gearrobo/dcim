<?php

use App\Sensor_log;
use Carbon\Carbon;
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
        $year = 2021;
        $month = 5;

        for ($i = 1; $i < 30; $i++) {
            $date = Carbon::create($year,$month ,$i , 0, 0, 0);
            Sensor_log::create([
                'sensor_id' => 1,
                'avg_sensor' => random_int(16, 28),
                'created_at'  => $date->format('Y-m-d H:i:s')
            ]);
        }
        for ($i = 1; $i < 30; $i++) {
            $date = Carbon::create($year,$month ,$i , 0, 0, 0);
            Sensor_log::create([
                'sensor_id' => 2,
                'avg_sensor' => mt_rand(17, 28),
                'created_at'  => $date->format('Y-m-d H:i:s')
            ]);
        }
    }
}
