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
            $table->string('status_x')->nullable();
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
            $table->string('location_monitoring')->nullable();
            $table->enum('protocol_type', ['tcp', 'rtu', 'snmp', 'http', 'enc'])->nullable();
            $table->string('ip_address')->nullable();
            $table->integer('port')->nullable();
            $table->enum('versi_snmp',['v1','v2c'])->nullable();
            $table->string('community')->nullable();
            $table->string('snmp_ip_address')->nullable();
            $table->string('oid_name')->nullable();
            $table->integer('slave_id')->nullable();
            $table->integer('address')->nullable();
            $table->integer('quantity')->nullable();
            $table->enum('data_type',['3','4'])->nullable();
            $table->tinyInteger('is_active')->nullable();
            $table->timestamp('last_seen')->nullable();
            $table->enum('status_sensor',['online','offline','inactive'])->nullable();
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
