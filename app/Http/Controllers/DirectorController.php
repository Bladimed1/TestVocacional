<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index(){
        return view('director.index');
    }

    //Función provisional para presentar como se verían los datos dentro de la gráfica
    public function estadisticas()
    {
        // 1. Simulamos los resultados de los test (después esto vendrá de Adminer/MySQL)
        $resultados = [
            'Desarrollo de Software' => 145,
            'Redes y Ciberseguridad' => 98,
            'Entornos Virtuales' => 112
        ];

        // 2. Calculamos cuál es la especialidad con más demanda usando PHP
        $maxDemanda = max($resultados); // Saca el número más alto (145)
        $especialidadTop = array_search($maxDemanda, $resultados); // Saca el nombre ('Software')

        // 3. Enviamos todos estos datos a la nueva vista
        return view('director.estadisticas', compact('resultados', 'especialidadTop', 'maxDemanda'));
    }

    public function grupo($grupo)
    {
        return view('director.grupo', compact('grupo'));
    }

    public function alumnos()
    {
        return view('director.alumnos');
    }
}
