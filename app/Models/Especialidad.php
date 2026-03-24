<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Especialidad extends Model
{
    protected $table = 'especialidades';

    public static function totales() {
        return DB::table('resultados')
        ->select('id_especialidad', DB::raw('COUNT(*) as total'))
        ->groupBy('id_especialidad')
        ->pluck('total', 'id_especialidad');
    }
}
