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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('employee_id')->unsigned()->nullable();
     
            $table->tinyInteger('status');
            $table->string('serial_number');
            $table->string('description')->nullable();
            $table->string('branche_name')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            
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
        Schema::dropIfExists('computers');
    }
};
