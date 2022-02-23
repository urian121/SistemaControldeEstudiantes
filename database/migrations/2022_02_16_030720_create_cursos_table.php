<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{

    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_curso', 250)->nullable();
            $table->unsignedInteger('precio_curso');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
