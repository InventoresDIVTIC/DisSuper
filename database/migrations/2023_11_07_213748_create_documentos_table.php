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
            $table->string('Id_Usuario_Revisar2')->nullable();
            $table->integer("Id_Usuario_Revisar");   //a quien se manda a revisar
            $table->integer("Id_Usuario_Cancelacion")->nullable();   //a quien se manda a revisar
            $table->string('nombre_indicador')->nullable();
            $table->string('valor_indicador')->nullable();
            $table->text("N_Llamada")->nullable();
            $table->string("Actividad")->nullable();
            $table->date("Fecha_Actividad")->nullable();    //Fecha de la actividad a evaluar
            $table->date("Fecha_Supervision")->nullable();  //Fecha del documento
            $table->text("Introduccion")->nullable();
            $table->string('nombre_archivo')->nullable(); 
            $table->text('contenido')->nullable();
            $table->string('imagen')->nullable();
            $table->integer("subido_hecho")->nullable();
            $table->text('comentario_rechazado')->nullable();
            $table->text('comentario_cancelado')->nullable();
            $table->text('comentario_terminado')->nullable();

           
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
