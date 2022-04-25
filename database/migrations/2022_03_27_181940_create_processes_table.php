<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->string('process')->nullable();
            $table->string('filling_number')->nullable();
            $table->date('register_date')->nullable();
            $table->date('update_date')->nullable();
            $table->date('last_update_date')->nullable();
            $table->integer('count_process')->nullable();
            $table->boolean('active')->default(1);
            $table->string('defendant')->nullable();
            $table->string('demanding')->nullable();
            
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities'); 
            $table->unsignedBigInteger('specialty_id');
            $table->foreign('specialty_id')->references('id')->on('specialties'); 
            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id')->references('id')->on('offices'); 
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
        Schema::dropIfExists('processes');
    }
}
