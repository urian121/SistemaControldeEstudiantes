<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nameFullAlumno',150)->nullable();
            $table->integer('cedula_alumno',20)->nullable();
            $table->string('email')->unique();
            $table->string('ciudad',150)->nullable();
            $table->integer('phone_alumno',10)->nullable();
            $table->integer('edad_alumno',2)->nullable();
            $table->text('addres')->nullable();
            $table->string('foto_estudiante',50)->nullable();

            //$table->unsignedInteger('libro_id');

            $table->integer('curso_id')->unsigned();            
            $table->foreign('curso_id')->references('id')->on('cursos');

            $table->integer('profesor_id');
            $table->foreign('profesor_id')
            ->references('id')->on('profesores');

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
        Schema::dropIfExists('alumnos');
    }
}
