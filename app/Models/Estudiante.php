<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    //
    public function especialidad () {
        return $this->belongsTo(Especialidad::class, 'id_especialidad');
    }

    protected $fillable = [
    'email',
    'id_especialidad',
    'intentos'
    ];
}
