<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('ip',15);
            $table->string('country',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('request')->nullable();
            $table->string('page',100);
            $table->string('browser',50)->nullable();
            $table->string('platform',50)->nullable();
            $table->string('device_type',50)->nullable();
            $table->tinyInteger('ismobiledevice')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
