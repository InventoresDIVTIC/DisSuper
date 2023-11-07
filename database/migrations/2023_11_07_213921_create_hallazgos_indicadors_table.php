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
        Schema::create('hallazgos_indicadors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger("Id_Indicador_Documento");
            $table->text("Hallazgo");
            $table->binary("Imagen_Referencia");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hallazgos_indicadors');
    }
};
