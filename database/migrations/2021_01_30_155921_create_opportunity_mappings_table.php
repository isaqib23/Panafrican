<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunityMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunity_mappings', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['contact','opportunity','lead','activity']);
            $table->integer('type_id');
            $table->unsignedInteger('opportunity_id');
            $table->unsignedInteger('created_by');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('opportunity_id')->references('id')->on('opportunities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opportunity_mappings');
    }
}
