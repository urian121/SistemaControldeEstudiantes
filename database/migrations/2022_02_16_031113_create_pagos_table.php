<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{

    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('alumno_id');
            $table->foreign('alumno_id')
            ->references('id')->on('alumnos');

            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')
            ->references('id')->on('cursos');

            $table->integer('valor_curso')->nullable();
            $table->integer('aporte')->nullable();
            $table->string('photo_pago')->nullable();

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
