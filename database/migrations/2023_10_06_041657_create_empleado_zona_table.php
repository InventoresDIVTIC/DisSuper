<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('empleado_zona', function (Blueprint $table) {
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('zona_id');
            $table->timestamps();
    
            $table->primary(['empleado_id', 'zona_id']);
    
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('zona_id')->references('id')->on('zonas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_zona');
    }
};
