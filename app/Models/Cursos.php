<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cursos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_curso', 'precio_curso','dateCurso'
    ];

    protected $table = "cursos";
    protected $primaryKey = "id";

    /**Relacion un profe puede tener mas de 1 curso */
    public function profesores(){
        return $this->hasMany(Profesores::class);
        //return $this->belongsTo(Profesores::class);
    }

}
