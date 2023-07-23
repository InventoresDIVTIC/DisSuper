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
        Schema::create('acciones', function (Blueprint $table) {
            $table->id('id_accion')->primary();
            $table->unsignedBigInteger('user_id');
            $table->string('nombre_accion');
            $table->timestamp('fecha_accion')->required();
            $table->string('SQL')->required();
            $table->string('status')->required();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('zonas', function (Blueprint $table) {
            $table->id('id_zona')->primary();
            $table->string('nombre_zona');
            $table->unsignedBigInteger('user_id');
        });

        

        Schema::table('empleados', function (Blueprint $table) {
            $table->unsignedBigInteger('id_zona');

            $table->foreign('id_zona')->references('id_zona')->on('zonas')->onDelete('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('contraseña_seguridad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acciones');

        Schema::dropIfExists('zonas');

        Schema::table('empleados', function (Blueprint $table){
            $table->dropColumn('id_zona');
        });

        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('contraseña_seguridad');
        });
    }
};
