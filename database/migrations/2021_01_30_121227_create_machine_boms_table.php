<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineBomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_boms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('machine_id');
            $table->unsignedInteger('bom_id');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('machine_id')->references('id')->on('machines');
            $table->foreign('bom_id')->references('id')->on('boms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_boms');
    }
}
