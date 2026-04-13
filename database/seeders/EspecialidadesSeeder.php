<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especialidades = [
            ['nombre' => 'Desarrollo de Software Multiplataforma'],
            ['nombre' => 'Infraestructura de Redes Digitales'],
            ['nombre' => 'Entornos Virtuales y Negocios Digitales'],
        ];

        foreach ($especialidades as $especialidad) {
            \App\Models\Especialidad::updateOrInsert(['nombre' => $especialidad['nombre']], $especialidad);
        }
    }
}
