<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Resultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $intentos = $this->intentosTest();   

        return view('estudiante.index', compact('intentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
        //
    }

    public function preguntasTest() {
        $response = Http::get('https://franciscoagm-trabajos.com/consumibles_test/preguntas.json');

        if ($response->successful()) {
            $data = $response->json();
            $test = $data['cuestionario']['categorias'];

            $categoriaEscala = array_filter($test, fn($c) => $c['id'] !== 5);
            $categoriaFinal = collect($test)->firstWhere('id', 5);

            return view('estudiante.test', compact('categoriaEscala', 'categoriaFinal'));
        }

        return back()->withError('Error al obtener datos');

    }

    public function resultados (Request $request) {

        $email = session('email');

        $respuestas = $request->input('respuestas');


        foreach ($respuestas as $especialidad => $preguntas) {
            $resultados[$especialidad] = array_sum($preguntas);
        }

        $especialidades = [
            'software' => 1,
            'redes'    => 2,
            'entornos' => 3,
        ];
        $cont = 0;
        $valorMax = max($resultados);
        $especialidadGanadora = array_search($valorMax, $resultados);

        if (array_key_exists($especialidadGanadora, $especialidades)) {
            $id_especialidad = $especialidades[$especialidadGanadora];

            $estudiante = Estudiante::where('email', $email)->first();


            // Actualiza estudiante
            $estudiante->update([
                'id_especialidad' => $id_especialidad,
                'intentos'        => $estudiante->intentos+1
            ]);

            $id_estudiante = $estudiante->id;

            // Guarda resultado con la especialidad ya actualizada
            Resultado::updateOrCreate(
                ['id_estudiante' => $id_estudiante],
                [   
                    'id_estudiante'  => $id_estudiante,
                    'id_especialidad' => $id_especialidad,
                    'puntaje'         => $valorMax
                ]
            );

            // Refresca el modelo para obtener intentos actualizado
            $estudiante->refresh();
        }

        $intentos = $estudiante->intentos;

        return view('estudiante.resultados', compact('resultados', 'intentos'));
    }

    private function getSecciones()
    {
        return Cache::remember('modulos_informativos', 3600, function () {
            $response = Http::get('https://franciscoagm-trabajos.com/consumibles_test/modulos_informativos.json');
            return $response->successful() ? $response->json('modulo_informativo.secciones') : [];
        });
    }

    public function verResultados()
    {
        $email = session('email');
        $estudiante = Estudiante::where('email', $email)->first();

        if (!$estudiante || $estudiante->intentos < 2) {
            return redirect()->route('estudiante.index')
                ->with('error', 'Aún tienes intentos disponibles. ¡Termina tus evaluaciones!');
        }

        $resultados = [
            'Desarrollo de Software' => 0,
            'Redes y Ciberseguridad' => 0,
            'Entornos Virtuales'     => 0
        ];

        if ($estudiante->id_especialidad == 1) {
            $resultados['Desarrollo de Software'] = 100;
        } elseif ($estudiante->id_especialidad == 2) {
            $resultados['Redes y Ciberseguridad'] = 100;
        } elseif ($estudiante->id_especialidad == 3) {
            $resultados['Entornos Virtuales'] = 100;
        }

        $intentos = $estudiante->intentos;

        return view('estudiante.resultados', compact('resultados', 'intentos'));
    }

    public function infoDesarrollo()
    {   

        $intentos = $this->intentosTest();

        $seccion = collect($this->getSecciones())->firstWhere('id', 1);
        return view('estudiante.infoDesarrollo', compact('seccion', 'intentos'));
    }

    public function infoRedes()
    {   
        $intentos = $this->intentosTest();

        $seccion = collect($this->getSecciones())->firstWhere('id', 2);
        return view('estudiante.infoRedes', compact('seccion', 'intentos'));
    }

    public function infoEntornos()
    {
        $intentos = $this->intentosTest();

        $seccion = collect($this->getSecciones())->firstWhere('id', 3);
        return view('estudiante.infoEntornos', compact('seccion', 'intentos'));
    }

    public function intentosTest() {
        $email = session ('email');

        return $intentos = Estudiante::where('email', $email)->value('intentos');
    }
}
