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

            $table->unsignedBigInteger("Id_Documento")->nullable(true);
            $table->unsignedBigInteger("Id_Indicador")->nullable(true);
            $table->text("Sistemas_Referencia")->nullable(true);
            $table->float("Valor_Alcanzado")->max(100)->min(0)->nullable(true);
            $table->text("Afectaciones")->nullable(true);
            $table->text("Normas_Incumplidas")->nullable(true);
            $table->string('imagen')->nullable(true);

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
