<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_records', function (Blueprint $table) {
            $table->increments('masterID');
            $table->integer('patientID');
            $table->string('patientName');
            $table->string('queueStatus')->nullable();
            $table->time('timeFinished')->nullable();
            $table->string('doctorInCharge')->nullable();
            $table->string('checkupTypeID');
            $table->string('checkupDescription')->nullable();
            $table->string('checkupDate');
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
        Schema::dropIfExists('master_records');
    }
}
