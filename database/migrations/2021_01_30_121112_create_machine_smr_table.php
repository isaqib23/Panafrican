<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineSmrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_smr', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('machine_id');
            $table->string('smr');
            $table->dateTime('date');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('machine_id')->references('id')->on('machines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_smr');
    }
}
