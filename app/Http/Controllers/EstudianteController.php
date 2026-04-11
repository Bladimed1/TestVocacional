<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('estudiante.index');
    }

    public function test()
    {
        return view('estudiante.test');
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

    public function testJson() {
        // GET request básico
        $response = Http::get('https://franciscoagm-trabajos.com/consumibles_test/preguntas.json');

        if ($response->successful()) {
            $data = $response->json();
            $data = $data["cuestionario"];

            return view ('estudiante.test', compact('data'));
        }

        return back()->withError('Error al obtener datos');
    }
}
