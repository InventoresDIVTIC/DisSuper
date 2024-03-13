<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Zona;
use App\Models\User;
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
        DB::table('zonas')->insert([
     
            'nombre_zona' => 'Guadalajara',
            'Encargado' => 1,
        ]);

        // Agregar la restricción de clave foránea
        Schema::table('zonas', function (Blueprint $table) {
            $table->foreign('Encargado')->references('id')->on('users')->onDelete('cascade'); 
        });

      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     

        Schema::dropIfExists('zonas');
    }
};