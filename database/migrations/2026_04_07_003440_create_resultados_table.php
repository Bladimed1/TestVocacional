<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_estudiante'); 
            $table->foreign('id_estudiante')->references('id')->on('estudiantes')->onDelete('cascade');

            // Especialidad recomendada (resultado del test)
            $table->unsignedBigInteger('id_especialidad'); 
            $table->foreign('id_especialidad')->references('id')->on('especialidades')->onDelete('cascade');

            // Puntaje obtenido en el test (opcional pero muy útil)
            $table->integer('puntajeSoftware')->nullable();
            $table->integer('puntajeEntornos')->nullable();
            $table->integer('puntajeRedes')->nullable();

            // Fecha en que se hizo el test (Laravel ya guarda created_at, pero esto es más claro)
            $table->timestamp('fecha_aplicacion')->useCurrent();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados');
    }
};
