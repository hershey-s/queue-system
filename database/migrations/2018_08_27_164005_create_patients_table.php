<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('patientID');
            $table->string('fullname');
            $table->date('birthday')->nullable();
            $table->string('sex')->nullable();
            $table->string('address')->nullable();
            $table->string('civilstatus')->nullable();
            $table->string('userType')->nullable();
            $table->string('username');
            $table->string('password');
            $table->string('mobileNo');
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
        Schema::dropIfExists('patients');
    }
}
