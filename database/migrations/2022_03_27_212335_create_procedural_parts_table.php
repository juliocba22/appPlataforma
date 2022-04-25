<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProceduralPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedural_parts', function (Blueprint $table) {
            $table->id();
            $table->integer('documento');
            $table->string('name','50');
            $table->unsignedBigInteger('typepart_id');
            $table->foreign('typepart_id')->references('id')->on('type_parts'); 
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
        Schema::dropIfExists('procedural_parts');
    }
}
