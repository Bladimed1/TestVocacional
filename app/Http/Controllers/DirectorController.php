<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DirectorController extends Controller
{
    public function index()
    {
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
        $listaAlumnos = DB::table('estudiantes')->get();
        return view('director.alumnos', compact('listaAlumnos'));
    }

    public function insertarAlumnos()
    {
        $response = Http::get('https://franciscoagm-trabajos.com/consumibles_test/alumnos.json');

        if ($response->successful()) {
            $estudiantes = $response->json();

            foreach ($estudiantes['estudiantes'] as $estudiante) {
                DB::table('estudiantes')->updateOrInsert(
                    ['matricula' => $estudiante['matricula']],
                    $estudiante
                );
            }
            return redirect()->route('director.alumnos');

        } else {
            echo 'Error al obtener el JSON: ' . $response->status();
        }
    }

    public function cambiarEstatus($matricula)
    {
        // 1. Buscamos al alumno específico usando su matrícula
        $alumno = DB::table('estudiantes')->where('matricula', $matricula)->first();

        if ($alumno) {
            // 2. Aquí hacemos la magia del interruptor (si es 1 se vuelve 0, si es 0 se vuelve 1)
            $nuevoEstatus = !$alumno->estatus;

            // 3. Actualizamos la base de datos
            DB::table('estudiantes')
                ->where('matricula', $matricula)
                ->update(['estatus' => $nuevoEstatus]);
        }

        // 4. Redirigimos de vuelta a la vista de alumnos
        return redirect()->route('director.alumnos');
    }
}