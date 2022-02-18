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


}
