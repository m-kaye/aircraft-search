<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('airplane_id')->nullable()->unsigned();
            $table->string('date');
            $table->string('owner');
            $table->string('stationaryPlant');
            $table->string('note');
            $table->string('export');
            $table->string('ex_registrationSymbol');
            $table->string('ex_owner');
            $table->timestamps();


            $table->foreign('airplane_id')
            ->references('id')->on('airplanes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
