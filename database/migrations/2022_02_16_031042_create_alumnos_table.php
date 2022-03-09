<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{

    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nameFullAlumno',150)->nullable();
            $table->string('cedula_alumno',50)->nullable();
            $table->string('lugar_exp_document',250)->nullable();
            $table->string('ref_family',250)->nullable();
            $table->string('phone_ref_family',50)->nullable();
            $table->string('talla_uniforme',250)->nullable();
            $table->string('email_alumno')->nullable();
            $table->string('ciudad', 150)->nullable();
            $table->string('phone_alumno')->nullable();
            $table->string('edad_alumno')->nullable();
            $table->text('addres')->nullable();
            $table->string('foto_estudiante',50)->nullable();
            $table->text('observ')->nullable();

            
            $table->foreignId('curso_id')
                ->nullable()
                ->constrained('cursos')
                ->onDelete('set null');

            $table->foreignId('profesor_id')
                ->nullable()
                ->constrained('profesores')
                ->onDelete('set null');     

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
