<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('estudiante.index');
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

        $valorMax = max($resultados);
        $especialidadGanadora = array_search($valorMax, $resultados);

        if (array_key_exists($especialidadGanadora, $especialidades)) {
            $id_especialidad = $especialidades[$especialidadGanadora];

            $estudiante = Estudiante::where('email', $email)->first();
            $id_estudiante = $estudiante->id;

            // Actualiza estudiante
            $estudiante->update([
                'id_especialidad' => $id_especialidad,
                'intentos'        => DB::raw('intentos + 1'),
            ]);

            // Guarda resultado con la especialidad ya actualizada
            Resultado::updateOrCreate(
                ['id_estudiante' => $id_estudiante],
                [   
                    'id_estudiante'  => $id_estudiante,
                    'id_especialidad' => $id_especialidad,
                    'puntaje'         => $valorMax,
                ]
            );

            // Refresca el modelo para obtener intentos actualizado
            $estudiante->refresh();
        }

        $intentos = $estudiante->intentos;

        return view('estudiante.resultados', compact('resultados', 'intentos'));
    }

    public function infoDesarrollo () {

    }

    public function infoRedes () {

    }

    public function infoEntornos () {

    }
}
