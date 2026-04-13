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
    
    public function estadisticas()
    {
        $datosBD = DB::table('resultados')
            ->join('especialidades', 'resultados.id_especialidad', '=', 'especialidades.id')
            ->select('especialidades.nombre as especialidad', DB::raw('count(resultados.id_estudiante) as total'))
            ->groupBy('especialidades.nombre')
            ->pluck('total', 'especialidad')
            ->toArray();

        if (empty($datosBD)) {
            $resultados = [
                'Desarrollo de Software Multiplataforma' => 0,
                'Infraestructura de Redes Digitales' => 0,
                'Entornos Virtuales y Negocios Digitales' => 0
            ];
            $maxDemanda = 0;
            $especialidadTop = 'Sin datos aún';
        } else {
            $resultados = $datosBD;
            $maxDemanda = max($resultados);
            $especialidadTop = array_search($maxDemanda, $resultados);
        }

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