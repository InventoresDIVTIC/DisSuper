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
        Schema::create('indicador_documentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger("Id_Documento");
            $table->unsignedBigInteger("Id_Indicador");
            $table->text("Sistemas_Referencia");
            $table->text("Normas_Incumplidas");
            $table->text("Afectaciones");
            $table->float("Valor_Alcanzado")->max(100)->min(0);
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicador_documentos');
    }
};
