<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('racks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('device_id');
            $table->foreign('device_id')->references('id')->on('devices');
            $table->text('description')->nullable();
            $table->string('temp_on')->default('22.46');
            $table->string('temp_middle')->default('20.55');
            $table->string('temp_under')->default('20.68');
            $table->string('hum_on')->default('45.34');
            $table->string('hum_middle')->default('45.35');
            $table->string('hum_under')->default('45.67');
            $table->string('dust')->default('20');
            $table->string('current')->default('8.98');
            $table->string('power')->default('49.76');
            $table->string('voltage')->default('220');
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
        Schema::dropIfExists('racks');
    }
}
