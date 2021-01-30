<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedInteger('part_id');
            $table->integer('quantity')->nullable();
            $table->string('machine_model')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('part_id')->references('id')->on('bom_parts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boms');
    }
}
