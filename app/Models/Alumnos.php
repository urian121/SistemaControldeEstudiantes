<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameFullAlumno', 'cedula_alumno','ciudad','phone_alumno','edad_alumno','addres','foto_estudiante','curso_id','profesor_id'
    ];

}
