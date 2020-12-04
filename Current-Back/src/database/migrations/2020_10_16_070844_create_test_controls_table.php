<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_controls', function (Blueprint $table) {
            $table->id();
            $table->decimal('rbd_threshold');
            $table->decimal('rbd_negative_control');
            $table->decimal('n_threshold');
            $table->decimal('n_negative_control');
            $table->decimal('rbd_pos');
            $table->decimal('n_pos');
            $table->integer('file_id');
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
        Schema::dropIfExists('test_controls');
    }
}
