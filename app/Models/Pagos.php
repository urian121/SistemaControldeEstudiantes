<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pagos extends Model
{
    use HasFactory;

    protected $fillable = [
        'alumno_id', 'curso_id', 'valor_curso', 'aporte', 'photo_pago'
    ];

    /* de 1 a muchos */
    public function curso(){
        return $this->belongsTo(Cursos::class);
    }

    /* de 1 a muchos */
    public function alumno(){
        return $this->belongsTo(Alumnos::class);
    }

}

