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
        Schema::create('rendicion_cuentas', function (Blueprint $table) {
            $table->id("id_RC");
            $table->string('status');
            $table->date('Fecha_Actividad');
            $table->timestamps();//Fecha de Rendicion

            $table->string('RPE_Empleado');
            $table->foreign('RPE_Empleado')->references('RPE_Empleado')->on('empleados')->onDelete('cascade');

            $table->unsignedBigInteger('id_actividad');
            $table->foreign('id_actividad')->references('id_actividad')->on('actividades')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendicion_cuentas');
    }
};
