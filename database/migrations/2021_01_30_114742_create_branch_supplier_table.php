<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_supplier', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('supplier_id');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_supplier');
    }
}
