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
            $table->unsignedSmallInteger("Tipo_Documento");
            $table->unsignedSmallInteger("Status_Documento");

            $table->integer("Id_Usuario_Autor");     //quien creo el documento
            $table->integer("Id_Usuario_Revisar");   //a quien se manda a revisar

            $table->text("N_Llamada");
            $table->integer("Actividad");
            $table->date("Fecha_Actividad");
            $table->text("Introduccion");

            $table->binary("Documento");   // Aqui se almacena el documento PDF

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
