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

           $table->unsignedBigInteger('alumno_id')->nullable();
            $table->foreign('alumno_id')
            ->references('id')->on('alumnos')->onDelete('set null');

            $table->unsignedBigInteger('curso_id')->nullable();
            $table->foreign('curso_id')
            ->references('id')->on('cursos')->onDelete('set null');

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
