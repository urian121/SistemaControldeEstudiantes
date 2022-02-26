<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Profesores extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameFull', 'cedula', 'phone', 'profesion', 'foto_profesor', 'curso_id'
    ];

    protected $table = "profesores";
    protected $primaryKey = "id";


    /**RELACION DE 1 A MUCHOS, un profe puede tener mas de una materia (curso)*/
    public function curso(){
        return $this->belongsTo(Cursos::class);
    }

}
