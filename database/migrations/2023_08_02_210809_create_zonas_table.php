<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('zonas', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nombre_zona');
            $table->unsignedBigInteger('Encargado'); // Clave foránea a la tabla de usuarios
            $table->timestamps();
        });

        // Agregar la restricción de clave foránea
        Schema::table('zonas', function (Blueprint $table) {
            $table->foreign('Encargado')->references('id')->on('users'); // Corrige 'user_id' por 'Empleado'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la restricción de clave foránea primero
        Schema::table('zonas', function (Blueprint $table) {
            $table->dropForeign(['Empleado']); // Corrige 'user_id' por 'Empleado'
        });

        Schema::dropIfExists('zonas');
    }
};