<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GensetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gensets')->insert([
            'name' => 'Genset Utama'
        ]);
    }
}
