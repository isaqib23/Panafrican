<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->unsignedInteger('user_type_id');
            $table->string('entity')->nullable();
            $table->unsignedInteger('region_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('area_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('device_type',['web','android','ios'])->default('web');
            $table->string('device_uuid')->nullable();
            $table->timestamp('last_login_date');
            $table->rememberToken();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_type_id')->references('id')->on('user_types');
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
        Schema::dropIfExists('users');
    }
}
