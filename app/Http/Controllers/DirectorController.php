<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;

class DirectorController extends Controller
{
    public function index() {
        return view('index_director');
    }
    
    public function mostrarGraficas() {

        $totales = Especialidad::totales();

        $total_desarrollo = $totales[1] ?? 0;
        $total_entornos   = $totales[2] ?? 0;
        $total_redes      = $totales[3] ?? 0;

        $total_evaluados = $total_desarrollo + $total_entornos + $total_redes;

        // determinar el mayor
        $max = max($total_desarrollo, $total_entornos, $total_redes);

        if ($max == $total_desarrollo) {
            $especialidad_top = 'Desarrollo de Software';
        } elseif ($max == $total_entornos) {
            $especialidad_top = 'Entornos Virtuales';
        } else {
            $especialidad_top = 'Redes';
        }

        return view('graficas_director', compact(
            'total_desarrollo',
            'total_entornos',
            'total_redes',
            'total_evaluados',
            'especialidad_top'
        ));
    }
}
