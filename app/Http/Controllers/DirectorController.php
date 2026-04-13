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
    
    public function estadisticas(){
    $datosBD = DB::table('resultados')
        ->join('especialidades', 'resultados.id_especialidad', '=', 'especialidades.id')
        ->select('especialidades.nombre as especialidad', DB::raw('count(resultados.id_estudiante) as total'))
        ->groupBy('especialidades.nombre')
        ->pluck('total', 'especialidad')
        ->toArray();

    // Siempre inicializar con 0 para evitar Undefined array key
    $resultados = [
        'software' => 0,
        'redes'    => 0,
        'entornos' => 0,
    ];

    foreach ($datosBD as $nombre => $total) {
        if (str_contains($nombre, 'Software')) {
            $resultados['software'] = (int) $total;
        } elseif (str_contains($nombre, 'Redes')) {
            $resultados['redes'] = (int) $total;
        } elseif (str_contains($nombre, 'Virtuales')) {
            $resultados['entornos'] = (int) $total;
        }
    }

    if (empty($datosBD)) {
        $maxDemanda     = 0;
        $especialidadTop = 'Sin datos aún';
    } else {
        $maxDemanda      = max($resultados);
        $especialidadTop = array_search($maxDemanda, $resultados);

        // Convertir clave corta a nombre legible
        $nombres = [
            'software' => 'Desarrollo de Software',
            'redes'    => 'Redes y Ciberseguridad',
            'entornos' => 'Entornos Virtuales',
        ];
        $especialidadTop = $nombres[$especialidadTop] ?? $especialidadTop;
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