<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $fillable = [
    'id_estudiante',
    'id_especialidad',
    'puntaje'
    ];
}
