<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->bigIncrements ('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('email');
            $table->string('llaveProceso');
            $table->string('idProceso');
            $table->string('idConexion');
            $table->date('fechaProceso');
            $table->date('fechaUltimaActuacion');
            $table->string('despacho');
            $table->string('depaprtamento');
            $table->string('sujetosProcesales');
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
        Schema::dropIfExists('procesos');
    }
}
