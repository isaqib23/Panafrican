<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->enum('type',['email', 'phone', 'visit', 'meetings', 'event', 'others'])->nullable();
            $table->string('topic')->nullable();
            $table->dateTime('target_date')->nullable();
            $table->dateTime('closing_date')->nullable();
            $table->enum('status',['in-progress','finished','cancelled','on-hold'])->nullable();
            $table->integer('completed')->nullable();
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('region_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('area_id')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('branch_id')->references('id')->on('branches');
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
        Schema::dropIfExists('activities');
    }
}
