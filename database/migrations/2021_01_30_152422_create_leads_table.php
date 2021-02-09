<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value')->nullable();
            $table->longText('description')->nullable();
            $table->enum('pipeline',['sales','after sale'])->nullable();
            $table->enum('pipeline_stage',['demo', 'tender', 'negotiation', 'won', 'lost', 'initial', 'quote'])->nullable();
            $table->enum('sales_type',['parts', 'service', 'equipment', 'get', 'uc']);
            $table->dateTime('target_date')->nullable();
            $table->string('primary_contact')->nullable();
            $table->unsignedInteger('owner_id')->nullable();
            $table->string('source')->nullable();
            $table->unsignedInteger('account_id');
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
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
