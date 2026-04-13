<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestResultadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Esto creará 10 resultados de prueba aleatorios
        for ($i = 0; $i < 10; $i++) {
            \Illuminate\Support\Facades\DB::table('resultados')->insert([
                'id_estudiante' => 1, // Asumiendo que tienes al menos un alumno cargado
                'id_especialidad' => rand(1, 3), // Reparte puntos entre las 3 carreras
                'puntaje' => rand(60, 100),
                'fecha_aplicacion' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
