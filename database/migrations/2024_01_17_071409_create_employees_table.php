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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('branche_id')->unsigned()->nullable();
            $table->tinyInteger('status');
            $table->string('name');
            $table->date('birth_date');
            $table->string('profession');
            $table->bigInteger('phone_number');
            $table->date('employment_start');
            $table->date('hijri_employment_start')->nullable();
            $table->bigInteger('bank_account_number');
            $table->string('medical_insurance')->nullable();
            $table->string('driving_license')->nullable();
            $table->string('passport_number');
            $table->date('passport_end_date');
            $table->bigInteger('residency_number');
            $table->date('residency_end_date');
            $table->foreign('branche_id')->references('id')->on('branches')->onDelete('cascade');
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
        Schema::dropIfExists('employees');
    }
};
