<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type',['equipment','parts','service','training','get','hose','fuel','lubricants','others']);
            $table->unsignedInteger('region_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('area_id')->nullable();
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('created_by');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
