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
        Schema::create('roles', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('name')->comment('Nombre del rol del usuario');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedBigInteger('role_id')->default(\App\Models\Role::USER);
            $table->foreign('role_id')->references('id')->on('roles'); 
            $table->string('name');
             
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('imagen')->nullable();
            $table->string('telefono')->nullable();
            $table->string('mobile')->nullable();
            $table->string('direccion')->nullable();
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
}
