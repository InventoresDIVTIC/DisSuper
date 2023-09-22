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
        Schema::create('indicadores', function (Blueprint $table) {
            $table->id('id_indicador');
            $table->string('Nombre_Indicador');
            $table->string('Actividad');
            $table->string('Hallazgo');
            $table->float('PorcentajeAlcanzado')->unsigned()->max(100)->min(0);
            //Insertar Campo para Imagen
            $table->string('Sistema_Refencia');
            $table->string('Normas_Incumplidas');

            $table->unsignedBigInteger('id_RC');
            $table->foreign('id_RC')->references('id_RC')->on('rendicion_cuentas')->onDelete('cascade');

            //$table->unsignedBigInteger('id_actividad');
            //$table->foreign('id_actividad')->references('id_actividad')->on('actividades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicadores');
    }
};
