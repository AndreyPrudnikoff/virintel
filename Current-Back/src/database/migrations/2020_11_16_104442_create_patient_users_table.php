<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_users', function (Blueprint $table) {
            $table->bigInteger('patient_id');
            $table->bigInteger('doctor_id');
            $table->bigInteger('virintel_id');
            $table->text('medical_conditions');
            $table->string('insurance');
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
        Schema::dropIfExists('patient_users');
    }
}
