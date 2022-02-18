<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesoresTable extends Migration
{

    
    public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->string('nameFull',150)->nullable();
            $table->integer('cedula')->unsigned();
            $table->integer('phone')->unsigned();
            $table->string('email')->unique();
            $table->string('profesion',150)->nullable();
            $table->string('foto_profesor',50)->nullable();

            /*Creando relacion */
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')
            ->references('id')->on('cursos');
            
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
        Schema::dropIfExists('profesores');
    }
}
