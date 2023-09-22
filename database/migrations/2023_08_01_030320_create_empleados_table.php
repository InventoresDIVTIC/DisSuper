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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->char("RPE_Empleado", 8)->unique()->nullable(false);
            $table->string('nombre_Empleado')->nullable(false);
            $table->date('fecha_ingreso')->nullable(false);


            $table->unsignedBigInteger('contrato_id')->nullable(); // Agrega la columna contrato_id
            $table->foreign('contrato_id')->references('id')->on('contratos'); // Agrega la relación

            
            $table->timestamps();
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }

    
};