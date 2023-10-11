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
        Schema::create('puestos', function (Blueprint $table) {
            $table->id();
            $table->string('RPE');
            $table->string('Nombre_Puesto');
            $table->string('Empresa-Proceso');
            $table->string('Area de Responsabilidad');
            $table->string('Rama de Actividad');
            $table->string('Especialidad');

            $table->unsignedBigInteger('id_zona');
            //$table->foreign('id_zona')->references('id_zona')->on('zonas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puestos');
    }
};
