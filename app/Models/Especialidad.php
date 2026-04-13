<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{

    protected $table = "especialidades";
    public function resultados()
    {
        return $this->hasMany(Resultado::class, 'id_especialidad');
    }
}
