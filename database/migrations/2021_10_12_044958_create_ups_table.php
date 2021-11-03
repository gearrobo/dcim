<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('device_id');
            $table->tinyInteger('status')->default('0');
            $table->foreign('device_id')->references('id')->on('devices');
            $table->double('input_volt_l1', 11, 2)->default('220');
            $table->double('input_volt_l2', 11, 2)->default('220');
            $table->double('input_volt_l3', 11, 2)->default('220');
            $table->double('output_volt_l1', 11, 2)->default('230');
            $table->double('output_volt_l2', 11, 2)->default('230');
            $table->double('output_volt_l3', 11, 2)->default('230');
            $table->double('input_frequency', 11, 2)->default('50');
            $table->double('output_frequency', 11, 2)->default('50');
            $table->double('l1', 11, 2)->default('20');
            $table->double('l2', 11, 2)->default('19');
            $table->double('l3', 11, 2)->default('18');
            $table->double('battery_voltage', 11, 2)->default('234');
            $table->double('battery_capacity', 11, 2)->default('98');
            $table->integer('backup_time')->default('90');
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
        Schema::dropIfExists('ups');
    }
}
