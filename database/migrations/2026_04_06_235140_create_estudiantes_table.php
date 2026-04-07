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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->String('nombre');
            $table->String('apellidoPaterno');
            $table->String('apellidoMaterno');
            $table->String('correo');
            $table->String('matricula');
            $table->tinyInteger('cuatrimestre');
            $table->String('grupo');
            $table->boolean('estatus')->default(true);
            $table->unsignedBigInteger('id_especialidad'); 
            $table->foreign('id_especialidad')->references('id')->on('especialidades')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
