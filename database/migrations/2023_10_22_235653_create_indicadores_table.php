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
            $table->id();
            $table->timestamps();

            $table->string('Clave_Indicador')->unique()->required();
            $table->string('Nombre_Indicador')->required();
            $table->smallInteger('Valor_Aceptable')->required();

            //Llave Foránea para conectar con tabla Funciones_Puestos
            $table->unsignedInteger('id_funcion')->required();
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
