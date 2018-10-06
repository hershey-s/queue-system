<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('queueID');
            $table->integer('patientID');
            $table->string('patientName');
            $table->string('queueStatus')->nullable();
            $table->time('timeFinished')->nullable();
            $table->string('doctorInCharge')->nullable();
            $table->string('checkupTypeID');
            $table->string('checkupDescription')->nullable();
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
        Schema::dropIfExists('queues');
    }
}
