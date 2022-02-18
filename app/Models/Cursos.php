<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Profesores;


class Cursos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_curso', 'precio_curso'
    ];


    /**Relacion de 1 a 1, 1 profe solo puede pertenecer a un curso */
    public function Profesores(){
        return $this->hasOne(Profesores::class);

    }

}
