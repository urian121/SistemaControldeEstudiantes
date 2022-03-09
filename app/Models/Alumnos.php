<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cursos;
use App\Models\Profesores;

class Alumnos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameFullAlumno', 'cedula_alumno','lugar_exp_document','ref_family','phone_ref_family','talla_uniforme','ciudad','phone_alumno','edad_alumno','addres','foto_estudiante','observ','curso_id','profesor_id'
    ];

    /** un alumno puede tener mas de 1 curso*/
    public function curso(){
        return $this->belongsTo(Cursos::class);
    }

    public function profesor(){
        return $this->belongsTo(Profesores::class);
    }

}
