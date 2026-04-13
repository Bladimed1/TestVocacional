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
        // 1. LA MAGIA DE ELOQUENT: 
        // Trae las especialidades y crea automáticamente una columna 'resultados_count'
        $datosBD = Especialidad::withCount('resultados')
            ->pluck('resultados_count', 'nombre')
            ->toArray();

        // 2. Siempre inicializar con 0 para evitar Undefined array key
        $resultados = [
            'software' => 0,
            'redes' => 0,
            'entornos' => 0,
        ];

        // 3. Llenamos nuestro arreglo buscando palabras clave
        foreach ($datosBD as $nombre => $total) {
            if (str_contains($nombre, 'Software')) {
                $resultados['software'] = (int) $total;
            } elseif (str_contains($nombre, 'Redes')) {
                $resultados['redes'] = (int) $total;
            } elseif (str_contains($nombre, 'Virtuales')) {
                $resultados['entornos'] = (int) $total;
            }
        }

        // 4. Lógica para el Top y maxDemanda
        // OJO: Cambiamos empty($datosBD) por revisar si el total del arreglo es 0
        if (array_sum($resultados) === 0) {
            $maxDemanda = 0;
            $especialidadTop = 'Sin datos aún';
        } else {
            $maxDemanda = max($resultados);
            $especialidadTop = array_search($maxDemanda, $resultados);

            // Convertir clave corta a nombre legible
            $nombres = [
                'software' => 'Desarrollo de Software Multiplataforma',
                'redes' => 'Infraestructura de Redes Digitales',
                'entornos' => 'Entornos Virtuales y Negocios Digitales',
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