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


    /**Relacion un profe puede tener mas de 1 curso */
    public function profesores(){
        return $this->hasMany(Profesores::class);
    }

}
