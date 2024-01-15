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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger("Id_Empleado");
            $table->text("Tipo_Documento");
            $table->text("Status_Documento");

            $table->integer("Id_Usuario_Autor");     //quien creo el documento
            $table->integer("Id_Usuario_Revisar");   //a quien se manda a revisar

            $table->text("N_Llamada")->nullable(true);
            $table->integer("Actividad")->nullable(true);
            $table->date("Fecha_Actividad")->nullable(true);
            $table->text("Introduccion")->nullable(true);
            $table->string('nombre_archivo')->nullable(); 
            $table->text('contenido')->nullable(true);
            $table->string('imagen')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
