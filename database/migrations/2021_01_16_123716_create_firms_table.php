<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firms', function (Blueprint $table) {

            $table->increments('id');
            $table->string('business_number',15)->unique();
            $table->string('company_name');
            $table->string('slug')->default('')->unique();
            $table->string('company_address')->nullable();
            $table->string('director_first_name')->nullable();
            $table->string('director_last_name')->nullable();
            $table->string('director_phone',16)->nullable();
            $table->string('director_email',100)->nullable();
            $table->string('contact_first_name')->nullable();
            $table->string('contact_last_name')->nullable();
            $table->string('contact_phone',16)->nullable();
            $table->string('contact_email',100)->nullable();
            $table->string('main_business_activity')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('tariff_id')->unsigned();;
            $table->json('tariff_json');;
            $table->float('sum')->unsigned()->default(0);
            $table->tinyInteger('verified')->default(0);;
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('firms');
    }
}
