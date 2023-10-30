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
            $table->timestamps();
            $table->string('clave_puesto')->nullable(false)->unique();;
            $table->string('nombre')->nullable(false);
            $table->string('empresa_proceso')->nullable(false);
            $table->string('area_responsabilidad')->nullable(false);
            $table->string('rama_actividad')->nullable(false);
            $table->string('especialidad')->nullable(false);

             // Agregar un campo para la relación con la zona
            $table->unsignedBigInteger('zona_id')->nullable();
            //Clave foránea para la relación con la zona
            $table->foreign('zona_id')->references('id')->on('zonas');
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
