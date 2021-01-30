<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('account_id');
            $table->string('type')->nullable();
            $table->unsignedInteger('location_id');
            $table->string('website')->nullable();
            $table->integer('par')->nullable();
            $table->unsignedInteger('region_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('area_id')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('locations');
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
        Schema::dropIfExists('branches');
    }
}
