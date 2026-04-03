<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index(){
        return view('director.index');
    }

    public function estadisticas()
    {
        // 1. Simulamos los resultados de los test (después esto vendrá de Adminer/MySQL)
        $resultados = [
            'Software' => 145,
            'Redes y Ciberseguridad' => 98,
            'Entornos Virtuales' => 112
        ];

        // 2. Calculamos cuál es la especialidad con más demanda usando PHP
        $maxDemanda = max($resultados); // Saca el número más alto (145)
        $especialidadTop = array_search($maxDemanda, $resultados); // Saca el nombre ('Software')

        // 3. Enviamos todos estos datos a la nueva vista
        return view('director.estadisticas', compact('resultados', 'especialidadTop', 'maxDemanda'));
    }
}
