<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     * ^bbbb^kkkk^hhhh^kkkk^mmmm^
     *min_max_sensor ^ treshold_min_sensor ^ min_hijau ^ max_hijau ^ treshold_max_sensor ^ min_max_merah
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('sensor_type_id');
            $table->foreign('sensor_type_id')->references('type_id')->on('sensor_types');
            $table->unsignedBigInteger('device_id')->nullable();
            $table->foreign('device_id')->references('id')->on('devices');
            $table->tinyInteger('status')->nullable();
            $table->integer('floor_id')->nullable();
            $table->integer('min_sensor');
            $table->integer('max_sensor');
            $table->integer('treshold_min_sensor');
            $table->integer('min_hijau');
            $table->integer('max_hijau');
            $table->integer('treshold_max_sensor');
            $table->integer('min_merah');
            $table->integer('max_merah');
            $table->string('avg_sensor')->default('20');
            $table->string('L1')->nullable();
            $table->string('L2')->nullable();
            $table->string('L3')->nullable();
            $table->integer('id_modbus')->nullable();
            $table->string('address_modbus')->nullable();
            $table->string('register_modbus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors');
    }
}
