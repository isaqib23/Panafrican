<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('oem')->nullable();
            $table->string('model')->nullable();
            $table->string('serial')->nullable();
            $table->string('unit_no')->nullable();
            $table->enum('type',['dozer', 'excavator', 'dump Truck']);
            $table->enum('application',['mining', 'construction']);
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('region_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('area_id')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
