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
        Schema::create('actividades_puestos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actividades_id');
            $table->unsignedBigInteger('puestos_id');
            // Otras columnas si es necesario
            $table->timestamps();
    
            $table->foreign('actividades_id')->references('id')->on('actividades');
            $table->foreign('puestos_id')->references('id')->on('puestos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades_puestos');
    }
};
