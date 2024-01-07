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
        Schema::create('actividades_indicadores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actividades_id');
            $table->unsignedBigInteger('indicadores_id');
            $table->timestamps();
        
            $table->foreign('actividades_id')->references('id')->on('actividades')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades_indicadores');
    }
};
