<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();

            /*Creando Relaciones*/
             // $table->integer('alumno_id')->unsigned();            
            //$table->foreign('alumno_id')->references('id')->on('alumnos');

            $table->unsignedBigInteger('alumno_id');
            $table->foreign('alumno_id')
            ->references('id')->on('alumnos');

            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')
            ->references('id')->on('cursos');

            $table->integer('valor_curso')->nullable();
            $table->integer('aporte')->nullable();
            //$table->integer('aporte')->unsigned();
            $table->string('photo_pago');

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
        Schema::dropIfExists('pagos');
    }
}
