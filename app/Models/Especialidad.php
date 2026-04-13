<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    public function resultados()
    {
        return $this->hasMany(Resultado::class, 'id_especialidad');
    }
}
