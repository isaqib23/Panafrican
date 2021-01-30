<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleTargetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_target', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('sale_type',['equipment','parts','service','training','get','hose','fuel','lubricants','others']);
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('branch_id');
            $table->string('budget')->nullable();
            $table->string('actual')->nullable();
            $table->dateTime('month')->nullable();
            $table->unsignedInteger('created_by');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('accounts');
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
        Schema::dropIfExists('sale_target');
    }
}
