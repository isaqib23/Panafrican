<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('rank')->nullable();
            $table->unsignedInteger('region_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('area_id')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('area_id')->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
