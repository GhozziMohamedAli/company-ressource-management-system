<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string("plate_number");
            $table->string("type");
            $table->string("car_meter");
            $table->string("fuel_type");
            $table->bigInteger("fuel_amount");
            $table->bigInteger("fuel_cost");;
            $table->bigInteger("sum_fuel");
            $table->bigInteger("oil_amount");
            $table->bigInteger("oil_cost");
            $table->bigInteger("sum_oil");
            $table->date("atonements");
            $table->date("battery");
            $table->string("path_license")->nullable();
            $table->string("path_inspection")->nullable();
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
        Schema::dropIfExists('cars');
    }
};
